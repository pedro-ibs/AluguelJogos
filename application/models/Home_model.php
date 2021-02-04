<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();
        $this->dados = $this->session->userdata("dados" . APPNAME);
    }

    /**
     * Pega todos os dados necessários para montar o card da lista.
     * @access public
     * @param  int   $id   identificador da Categoria
     * @return object;
    */
    public function get_cards($id)
    {
        $query = $this->db->get_where("Jogo_categoria", "id_categoria = $id")->result();

        $produto = array();
        foreach($query as $item)
        {
            $query2 = $this->db->get_where("Produto", "id = '$item->id_produto' AND status = 1")->result();
            if($query2)
                $produto = array_merge($produto, $query2);
        }

        shuffle($produto);

        foreach($produto as $item)
        {
            if($this->dados)
                $item->favorito = $this->db->get_where("Favorito", "id_produto = '$item->id' AND id_usuario = '".$this->dados->usuario_id."'")->result();
            else
                $item->favorito = (object)array();
            
            $item->imagem = $this->db->get_where("Imagem", "id_produto = $item->id AND principal = 1")->row();
        }

        return $produto;
    }

    /**
     * Pega todos os dados necessários para montar os card, porem de forma aleatorio.
     * @access public
     * @return object;
    */
    public function get_jogos_aleatorio()
    {
        $jogos = $this->db->get_where("Produto", "status = 1")->result();

        shuffle($jogos);

        $cards = array();
        for($i=0;$i<6;$i++)
        {
            if($this->dados)
                $jogos[$i]->favorito = $this->db->get_where("Favorito", "id_produto = '".$jogos[$i]->id."' AND id_usuario = '".$this->dados->usuario_id."'")->row();
            else
                $jogos[$i]->favorito = (object)array();

            $jogos[$i]->imagem = $this->db->get_where("Imagem", "id_produto = ".$jogos[$i]->id." AND principal = 1")->row();

            
            $this->db->select("id_categoria");
            $jogos[$i]->id_categoria = $this->db->get_where("Jogo_categoria", "id_produto = ".$jogos[$i]->id)->row()->id_categoria;

            $jogos[$i]->categoria = $this->db->get_where("Categoria", "id = ".$jogos[$i]->id_categoria."")->row();

            $card[] = $jogos[$i];
        }

        return $card;
    }

    /**
     * Consulta as informações da categoria pelo nome
     * @access public
     * @param  string   $categoria   nome da categoria
     * @return object;
    */
    public function categoria_by_nome($categoria)
    {
        $query = $this->db->get_where("Categoria", "nome = '$categoria'")->row();

        return $query;
    }

    /**
     * Pega todas as informações de um jogo,
     * @access public
     * @param  int   $id   identificador do Jogo
     * @return object;
    */
    public function get_jogo_info($id)
    {
        $query = $this->db->get_where("Produto", "id = '$id'")->row();

        $this->db->select("cat.*");
        $this->db->join("Categoria cat", "cat.id = jocat.id_categoria");
        $query->categoria = $this->db->get_where("Jogo_categoria jocat", "jocat.id_produto = '$id'")->result();

        $query->marca = $this->db->get_where("Marca", "id = '$query->id_marca'")->row();

        $query->tipo = $this->db->get_where("Tipo_produto", "id = ".$query->tipo)->row();

        $this->db->order_by("principal", "desc");
        $query->imagem = $this->db->get_where("Imagem", "id_produto = ".$query->id)->result();

        if($this->dados)
            $query->favorito = $this->db->get_where("Favorito", "id_produto = '$query->id' AND id_usuario = '".$this->dados->usuario_id."'")->row();
        else
            $query->favorito = array();
        $query->perguntas = $this->db->get_where("Pergunta", "id_produto = '$query->id'")->result();

        return $query;
    }

    /**
     * Realiza o favotito de um jogo
     * @access public
     * @param  int   $id   identificador do Jogo
     * @return object;
    */
    public function favoritar()
    {
        $data = (object)$this->input->post();
        $rst = (object)array("rst" => 0);
        
        if($data->tipo == "preenchido")
        {
            $this->db->set("ativo", 0);

            $this->db->where("id_produto = '$data->id_produto' AND '".$this->dados->usuario_id."'");
            if($this->db->update("Favorito"))
                $rst->rst = 2;
            else
                $rst->rst = 0;
        }
        else if($data->tipo == "vazio")
        {
            $query = $this->db->get_where("Favorito", "id_produto = '$data->id_produto' AND id_usuario = '".$this->dados->usuario_id."'")->row();

            if($query)
            {
                $this->db->set("ativo", 1);

                $this->db->where("id = '$query->id'");
                if($this->db->update("Favorito"))
                    $rst->rst = 1;
                else
                    $rst->rst = 0;
            }
            else
            {
                $this->db->set("ativo", 1);
                $this->db->set("id_produto", $data->id_produto);
                $this->db->set("id_usuario", $this->dados->usuario_id);

                if($this->db->insert("Favorito"))
                    $rst->rst = 1;
                else
                    $rst->rst = 0;
            }
        }

        return $rst;
    }

    /**
     * Realiza o cadastro de um pergunta
     * @access public
     * @return object;
    */
    public function cadastrar_pergunta()
    {
        $data = (object)$this->input->post();
        $rst = (object)array("rst" => false, "msg" => "", "pergunta" => "");

        if($this->verifica_seguranca($data->pergunta))
        {
            $rst->msg = "Palavra utilizada para o acesso é proibida!";

            return $rst;
        }

        $this->db->set("pergunta", $data->pergunta);
        $this->db->set("data_inclusao", "date('now')", false);
        $this->db->set("id_produto", $data->id_jogo);
        $this->db->set("id_usuario", $this->dados->usuario_id);

        if($this->db->insert("Pergunta"))
        {
            $rst->rst = true;
            $rst->msg = "Pergunta registrada com sucesso, quando houver uma resposta, você será notificado!";
        }
        else
        {
            $rst->msg = "Erro ao registrar a pergunta, tente novamente mais tarde.";
        }

        return $rst;
    }

    /**
     * Efetua a compra do jogo
     * @access public
     * @return object;
    */
    public function compra_jogo()
    {
        $data = (object)$this->input->post();
        $rst = (object)array("rst" => false, "msg" => "", "tipo" => "");

        $query = $this->db->get_where("Produto", "id = '$data->id_jogo'")->row();

        $this->db->set("id_usuario", $this->dados->usuario_id);
        $this->db->set("id_jogo", $data->id_jogo);

        if($this->db->insert("Solicitacao_jogo"))
        {
            $this->db->set("status", 0);

            $this->db->where("id", $data->id_jogo);
            if($this->db->update("Produto"))
            {
                $rst->rst = true;
                $rst->tipo = troca_verbo($query->tipo);
            }
        }

        return $rst;
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