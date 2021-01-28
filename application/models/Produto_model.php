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

        for($count = 0; $count < count($files); $count++)
        {
            if($count == 0)
                $this->db->set("principal", 1);
            
            $this->db->set("id_produto", $id);
            $this->db->set("ativo", 1);
            $this->db->set("nome", $files[$count]["name"]);
            $this->db->set("tipo", $files[$count]["type"]);
            $this->db->set("tamanho", $files[$count]["size"]);
            $this->db->set("img", base64_encode(file_get_contents($files[$count]["path"])));

            $this->db->insert("Imagem");
        }
    }

    public function get_imga()
    {
        $rst = $this->db->get_where("Imagem", "id = 18")->row();
        // $rst->img = base64_encode($rst->img);
        echo '<pre>';
        print_r($rst->img);
        echo '</pre>';
        echo '<pre>';
        echo "<img src='data:image/png;base64,".$rst->img."'>";
        echo '</pre>';
        exit;
    }
}