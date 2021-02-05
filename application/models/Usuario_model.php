<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();
        $this->dados = $this->session->userdata("dados" . APPNAME);
    }

    private $loginData = array(
        "logged" => false, 
        "error" => "",     
        "nome" => "",
        "email" => "", 
        "data_criacao" => "",
        "usuario_id" => 0,
    );

    /**
     * Consulta todos os usuarios do sistema
     * @access public
     * @return object;
    */
    public function get_usuario()
    {
        $query = $this->db->get("Usuario")->result();

        return $query;
    }

    /**
     * Consulta as informações do usuario logado.
     * @access public
     * @return object;
    */
    public function get_info_perfil()
    {
        $query = $this->db->get_where("Usuario", "id = ".$this->dados->usuario_id)->row();
        
        return $query;
    }

    /**
     * Reliza a autentificação do usuario
     * @access public
     * @return object;
    */
    public function autentifica()
    {
        $data = (object)$this->input->post();
        $loginData = (object)$this->loginData;

        if($this->verifica_seguranca($data->email))
        {
            $loginData->logged = false;
            $loginData->error = "Palavra utilizada para o acesso é proibida!";

            return $loginData;
        }
        if($this->verifica_seguranca($data->senha))
        {
            $loginData->logged = false;
            $loginData->error = "Palavra utilizada para o acesso é proibida!";

            return $loginData;
        }

        $query = $this->db->get_where("Usuario", "email = '$data->email' AND senha = '".md5($data->senha)."'")->row();

        if(!$query)
        {
            $loginData->error = "Email e/ou Senha está incorreto.";
        }
        else
        {
            $loginData->usuario_id = $query->id;
            $loginData->nome = $query->nome;
            $loginData->email = $query->email;
            $loginData->data_criacao = formatar($query->data_insercao, "bd2dt");
            $loginData->data_autentificacao = date("d-m-Y h:i:s");
            $loginData->logged = true;
        }

        return $loginData;
    }

    /**
     * Realiza o cadastro/edição dos dados dos usuarios
     * @access public
     * @return object;
    */
    public function geren_usuario()
    {
        $data = (object)$this->input->post();
        $rst = (object)array("rst" => 0, "msg" => "");

        if($this->verifica_seguranca($data->email))
        {
            $rst->rst = false;
            $rst->msg = "Palavra utilizada para o acesso é proibida!";

            return $rst;
        }
        if($this->verifica_seguranca($data->senha))
        {
            $rst->rst = false;
            $rst->msg = "Palavra utilizada para o acesso é proibida!";

            return $rst;
        }

        if($this->verifica_email(strtolower($data->email)) && (!isset($data->id_usuario) || isset($data->id_usuario) && empty($data->id_usuario)))
        {
            $this->db->set("nome", $data->nome);
            $this->db->set("email", strtolower($data->email));
            $this->db->set("senha", md5($data->senha));
            $this->db->set("bio", $data->bio);
            $this->db->set("data_insercao", "date('now')", false);

            if(isset($data->id_usuario) && $data->id_usuario)
            {
                $this->db->where("id", $data->id);
                if($this->db->update("Usuario"))
                {
                    $rst->rst = 1;
                    $rst->msg = "Dados da conta atualizados com sucesso";
                }
                else
                {
                    $rst->msg = "Ocorreu um erro ao tentar atualizar os dados, tente novamente mais tarde";
                }
            }
            else
            {
                if($this->db->insert("Usuario"))
                {
                    $rst->rst = 1;
                    $rst->msg = "Cadastro realizado com sucesso, por favor verifique seu email para confirmar a conta.";
                }
                else
                {
                    $rst->msg = "Erro ao realizar o cadastro, tente novamente mais tarde.";
                }
            }
        }
        else
        {
            $rst->rst = 2;
            $rst->msg = "O Email digitado já está cadastrado no sistema.";
        }

        return $rst;
    }

    /**
     * Realiza a verifição se o email está cadastrado no sistema.
     * @access public
     * @param   string  $email  email do usuario
     * @return object;
    */
    public function verifica_email($email)
    {
        $query = $this->db->get_where("Usuario", "email = '$email'")->row();

        if($query)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    /**
     * Realiza a verificação no texto, para maior segurança.
     * @access private
     * @param  string   $dado   Texto a ser verificado.
     * @return boolean;
    */
    private function verifica_seguranca($dado)
    {
        $palavras = palavra_proibidas();
        foreach($palavras as $item)
        {
            $pattern = '/' . $item . '/';

            if(preg_match($pattern, strtolower($dado)) > 0)
                return true;
        }

        return false;
    }

}