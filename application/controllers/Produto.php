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

    public function jogo()
    {
        $this->data["breadcrumb"] = (object)array("titulo" => "Formulario de Cadastro de Jogos", "before" => array((object)array("nome" => "Home", "link" => "Home")), "current" => "Formulario de Cadastrado de Jogos");;

        // $data["javascript"] = [
        //     base_url("assets/js/home/detalhes.js")
        // ];

        $this->data["content"] = $this->load->view("produto/form", $this->data, true);
        $this->load->view("template/content", $this->data);
    }

}