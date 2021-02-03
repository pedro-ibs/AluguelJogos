<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto_model extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();
        $this->dados = $this->session->userdata("dados" . APPNAME);
    }

    public function get_categorias()
    {
        $query = $this->db->get("Categoria")->result();

        return $query;
    }

    public function get_marcas()
    {
        $query = $this->db->get("Marca")->result();

        return $query;
    }

    public function get_jogo_info($id)
    {
        $query = $this->db->get_where("Produto", "id = $id")->row();

        $this->db->order_by("id_categoria", "asc");
        $query->categorias = $this->db->get_where("Jogo_categoria", "id_produto = $id")->result();
        
        $query->categoria_conc = "";
        foreach($query->categorias as $item)
        {
            $query->categoria_conc .= $item->id_categoria . ",";
        }

        $query->img = $this->db->get_where("Imagem", "id_produto = $id")->result();

        // echo '<pre>';
        // print_r($query);
        // echo '</pre>';
        // exit;

        return $query;
    }


    public function cadastra()
    {
        $rst = (object)array("rst" => false, "msg" => "");
        $data = (object)$this->input->post();

        $this->db->set("titulo", $data->nome);
        $this->db->set("descricao_jogo", $data->descricao_jogo);
        $this->db->set("descricao", $data->descricao_anuncio);
        $this->db->set("id_marca", $data->marca);
        $this->db->set("preco", $data->preco);
        $this->db->set("tipo", $data->tipo);
        if(isset($data->status) && $data->status == "on")
            $this->db->set("status", 1);
        else
            $this->db->set("status", 0);
        $this->db->set("id_usuario", $this->dados->usuario_id);

        if($data->id_produto)
        {
            $this->db->where("id = $data->id_produto");
            if($this->db->update("Produto"))
            {
                $data->categoria_conc = "";
                foreach($data->categoria as $key => $item)
                {
                    if($key != 0)
                        $data->categoria_conc .= ", ";

                    $data->categoria_conc .= ''.$item;
                }
                
                $this->db->where("id_produto = $data->id_produto AND id_categoria NOT IN ($data->categoria_conc)");
                $this->db->delete("Jogo_categoria");

                foreach($data->categoria as $item)
                {
                    $query = $this->db->get_where("Jogo_categoria", "id_produto = $data->id_produto AND id_categoria = $item")->row();

                    if(empty($query))
                    {
                        $this->db->set("id_produto", $data->id_produto);
                        $this->db->set("id_categoria", $item);

                        $this->db->insert("Jogo_categoria");
                    }
                }

                $this->set_img($data->id_produto);

                $rst->rst = true;
                $rst->msg = "Jogo atualizado com sucesso";
                $rst->id_jogo = $data->id_produto;
            }
            else
            {
                $this->session->set_userdata("files".APPNAME, "");
                $rst->msg = "Erro ao atualizar o jogo, tente novamente mais tarde";
            }
        }
        else
        {
            if($this->db->insert("Produto"))
            {
                $id = $this->db->insert_id();
                foreach($data->categoria as $item)
                {
                    $this->db->set("id_produto", $id);
                    $this->db->set("id_categoria", $item);

                    $this->db->insert("Jogo_categoria");
                }

                $this->set_img($id);

                $rst->rst = true;
                $rst->msg = "Jogo cadastrado com sucesso";
                $rst->id_jogo = $id;
            }
            else
            {
                $this->session->set_userdata("files".APPNAME, "");
                $rst->msg = "Erro ao cadastrar o jogo, tente novamente mais tarde";
            }
        }

        return $rst;
    }

    public function set_img ($id)
    {
        $files = $this->session->userdata("files".APPNAME);
      
        if($files)
        {
            $this->session->set_userdata("files".APPNAME, "");
            $query = $this->db->get_where("Imagem", "id_produto = $id AND principal = 1")->row();
            for($count = 0; $count < count($files); $count++)
            {
                if($count == 0 && empty($query))
                    $this->db->set("principal", 1);
                
                $this->db->set("id_produto", $id);
                $this->db->set("ativo", 1);
                $this->db->set("nome", $files[$count]["name"]);
                $this->db->set("tipo", $files[$count]["type"]);
                $this->db->set("tamanho", $files[$count]["size"]);
                $this->db->set("img", base64_encode(file_get_contents($files[$count]["path"])));

                $this->db->insert("Imagem");
            }

            limpa_uploads();
        }
    }

    public function definir_principal($checked, $id)
    {
        $query = $this->db->get_where("Imagem", "id = $id")->row();
        if($checked == true)
        {
            $this->db->set("principal", 0);
            $this->db->where("id_produto = $query->id_produto");
            if($this->db->update("Imagem"))
            {
                $this->db->set("principal", 1);
                $this->db->where("id = $id");
                if($this->db->update("Imagem"))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            $this->db->set("principal", 0);
            $this->db->where("id = $id");
            if($this->db->update("Imagem"))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function excluir($id)
    {
        $img = $this->db->get_where("Imagem", "id = $id")->row();

        $this->db->where("id = $id");
        if($this->db->delete("Imagem"))
        {
            if($img->principal == 1)
            {
                $query = $this->db->get_where("Imagem", "id_produto = $img->id_produto")->row();
                $this->db->set("principal", 1);

                $this->db->where("id = $query->id");
                $this->db->update("Imagem");
            }

            return (object)array("rst" => true, "id" => $img->id_produto);
        }
        else
            return (object)array("rst" => false);
    }
}