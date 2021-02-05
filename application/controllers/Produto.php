<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller{

    function __construct()
    {
        parent:: __construct();
        $this->data = array();

        $this->dados = $this->session->userdata("dados" . APPNAME);
        $this->data["dados"] = $this->dados;
        
        $this->load->model("Produto_model", "m_produto");

        $local = str_replace("AluguelJogos/", "", $_SERVER["REQUEST_URI"]);
        $this->session->set_userdata(array("local" => $local));
        $this->data["local"] = $local;

        $this->data["categorias"] = $this->m_sistema->get_categorias();

        $this->data["header"] = $this->load->view("template/header", $this->data, true);
        $this->data["navbar"] = $this->load->view("template/navbar", $this->data, true);
        $this->data["footer"] = $this->load->view("template/footer", $this->data, true);
    }

    public function jogo($id = null)
    {
        $this->data["breadcrumb"] = (object)array("titulo" => "Formulario de Cadastro de Jogos", "before" => array((object)array("nome" => "Home", "link" => "Home")), "current" => "Formulario de Cadastrado de Jogos");;

        $this->data["categorias"] = $this->m_produto->get_categorias();
        $this->data["marca"] = $this->m_produto->get_marcas();
        if($id)
            $this->data["jogo"] = $this->m_produto->get_jogo_info($id);
        
        $this->data["javascript"] = [
            base_url("assets/js/produto/form.js")
        ];

        $this->data["content"] = $this->load->view("produto/form", $this->data, true);
        $this->load->view("template/content", $this->data);
    }

    public function cadastra()
    {
        $rst = $this->m_produto->cadastra();
        echo json_encode($rst, JSON_UNESCAPED_UNICODE);
    }

    public function definir_principal($checked, $id)
    {
        $rst = $this->m_produto->definir_principal($checked, $id);
        echo json_encode($rst, JSON_UNESCAPED_UNICODE);
    }

    public function excluir($id)
    {
        $rst = $this->m_produto->excluir($id);
        echo json_encode($rst, JSON_UNESCAPED_UNICODE);
    }

    public function set_files()
    {

        move_uploaded_file($_FILES["file"]["tmp_name"], APPPATH."..\assets\uploads"."\\".$_FILES["file"]["name"]);

        $path = APPPATH."..\assets\uploads"."\\".$_FILES["file"]["name"];

        $arquivo = array(
            "name" => $_FILES["file"]["name"],
            "type" => $_FILES["file"]["type"],
            "path" => $path,
            "tmp_name" => $_FILES["file"]["tmp_name"],
            "size" => $_FILES["file"]["size"],
            "erro" => $_FILES["file"]["error"]
        );

        $files = $this->session->userdata("files". APPNAME);
        
        if(!$files)
            $files = array();

        $files[] = $arquivo;
        $this->session->set_userdata(array("files". APPNAME => $files));
    }

    public function get_img()
    {
        $this->m_produto->get_imga();
    }

}