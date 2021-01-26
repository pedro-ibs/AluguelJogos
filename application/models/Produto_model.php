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

    public function cadastra()
    {
        // $this->session->set_userdata("files".APPNAME, "");
        $rst = (object)array("rst" => true, "msg" => "");
        $data = (object)$this->input->post();
        // exit;
        // $this->db->set("titulo", $data->nome);
        // $this->db->set("descricao_jogo", $data->descricao_jogo);
        // $this->db->set("descricao", $data->descricao_anuncio);
        // $this->db->set("id_marca", $data->marca);
        // $this->db->set("preco", $data->preco);
        // $this->db->set("tipo", $data->tipo);
        // $this->db->set("status", 1);
        // $this->db->set("id_usuario", $this->dados->usuario_id);

        // if($this->db->insert("Produto"))
        // {
        //     $id = $this->db->insert_id();
        //     foreach($data->categoria as $item)
        //     {
        //         $this->db->set("id_produto", $id);
        //         $this->db->set("id_categoria", $item);

        //         $this->db->insert("Jogo_categoria");
        //     }

            $this->set_img(11);
        // }

        echo '<pre>';
        print_r("Chegou aqui");
        echo '</pre>';
        exit;
    }

    public function set_img ($id)
    {
        $files = $this->session->userdata("files".APPNAME);
        $this->session->set_userdata("files".APPNAME, "");
        $config["upload_path"] =  APPPATH.'/../anexos';
        $config["allowed_types"] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        for($count = 0; $count < count($files); $count++)
        {
            $_FILES["arquivos"]["name"] = $files[$count]["name"];
            $_FILES["arquivos"]["type"] = $files[$count]["type"];
            $_FILES["arquivos"]["tmp_name"] = $files[$count]["path"];
            $_FILES["arquivos"]["error"] = $files[$count]["erro"];
            $_FILES["arquivos"]["size"] = $files[$count]["size"];
            echo '<pre>';
            print_r($_FILES);
            echo '</pre>';
            if($this->upload->do_upload('arquivos'))
            {
                $data = $this->upload->data();

                if($count == 0)
                    $this->db->set("principal", 1);
                
                $this->db->set("id_produto", $id);
                $this->db->set("ativo", 1);
                $this->db->set("nome", $data["orig_name"]);
                $this->db->set("tipo", $data["file_type"]);
                $this->db->set("tamanho", $data["file_size"]);
                $this->db->set("img", file_get_contents($data["full_path"]));

                $this->db->insert("Imagem");
            }
            else
            {
                echo '<pre>';
                print_r($this->upload->display_errors());
                echo '</pre>';
                exit;
            }
        }
    }

}