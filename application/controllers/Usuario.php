<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller{

    function __construct()
    {
        parent:: __construct();
        $this->data = array();

        $this->dados = $this->session->userdata("dados" . APPNAME);
        $this->data["dados"] = $this->dados;

        $this->data["categorias"] = $this->m_sistema->get_categorias();

        $this->load->model("Usuario_model", "m_usuario");

        $this->data["header"] = $this->load->view("template/header", $this->data, true);
        $this->data["navbar"] = $this->load->view("template/navbar", $this->data, true);
        $this->data["footer"] = $this->load->view("template/footer", $this->data, true);
        //Não esquecer de fazer o termo para utilizar o endereço e os dados dos clientes.
    }

    public function index($id = null)
    {
        $titulo = $id != null ? "Atualizando dados de cadastro" : "Formulário de Cadastro";
        $this->data["breadcrumb"] = (object)array("titulo" => $titulo, "before" => array((object)array("nome" => "Home", "link" => "Home")), "current" => $titulo);

        $this->data["estados"] = get_estados();
        $this->data["usuario"] = $this->m_usuario->get_usuario();
        // echo '<pre>';
        // print_r($this->data["usuario"]);
        // echo '</pre>';
        // exit;

        $this->data["javascript"] = [
            base_url("assets/js/usuario/form.js")
        ];

        $this->data["content"] = $this->load->view("usuario/form", $this->data, true);
        $this->load->view("template/content", $this->data);
    }

    public function login()
    {
        $this->data["breadcrumb"] = (object)array("titulo" => "Autentificação", "before" => array((object)array("nome" => "Home", "link" => "Home")), "current" => "Autentificação");

        $this->data["javascript"] = [
            base_url("assets/js/usuario/autentificacao.js")
        ];

        $this->data["content"] = $this->load->view("usuario/autentificacao", $this->data, true);
        $this->load->view("template/content", $this->data);
    }

    public function logout()
    {
        $dados = $this->session->userdata("dados" . APPNAME);
        $local = $this->session->userdata("local");
        $this->session->unset_userdata(array("is_logged", "dados" . APPNAME));
        if ($local) 
        {
            redirect(base_url($local));
        }
        else
        {
            redirect(base_url("Home"));
        }
    }

    public function cadastra()
    {
        $rst = $this->m_usuario->geren_usuario();
        echo json_encode($rst, JSON_UNESCAPED_UNICODE);
    }

    public function autentifica()
    {
        $rst = $this->m_usuario->autentifica();
        if($rst->logged)
        {
            $this->session->set_userdata(array("is_logged" => true, "dados" . APPNAME => $rst));
            $rst->local = $this->session->userdata("local");
        }
        echo json_encode($rst, JSON_UNESCAPED_UNICODE);
    }

}