<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

    function __construct()
    {
        parent:: __construct();
        $this->data = array();
     
        // $this->m_sistema->inseri_servico();

        $this->dados = $this->session->userdata("dados" . APPNAME);
        $this->data["dados"] = $this->dados;
        
        $this->load->model("Home_model", "m_home");

        $local = str_replace("AluguelJogos/", "", $_SERVER["REQUEST_URI"]);
        $this->session->set_userdata(array("local" => $local));
        $this->data["local"] = $local;

        $this->data["categorias"] = $this->m_sistema->get_categorias();
        // echo '<pre>';
        // print_r($this->data["categorias"]);
        // echo '</pre>';
        // exit;

        $this->data["header"] = $this->load->view("template/header", $this->data, true);
        $this->data["navbar"] = $this->load->view("template/navbar", $this->data, true);
        $this->data["footer"] = $this->load->view("template/footer", $this->data, true);
    }

    public function index()
    {
        $this->data["content"] = $this->load->view("home/home", $this->data, true);
        $this->load->view("template/content", $this->data);
    }

    public function lista($categoria = null, $id = null)
    {
        $this->data["cards"] = $this->m_home->get_cards($id);
        //Faz a parte das categorias.
        $this->data["breadcrumb"] = (object)array("titulo" => "Lista de jogos", "before" => array((object) array("nome" => "Nome da Pagina Anterior", "link" => "Home")), "current" => "Nome da pagina atual");

        $this->data["content"] = $this->load->view("home/lista", $this->data, true);
        $this->load->view("template/content", $this->data);
    }

    public function detalhes($id)
    {
        $this->data["info"] = $this->m_home->get_jogo_info($id);

        $this->data["breadcrumb"] = (object)array("titulo" => "Detalhes do jogo", "before" => array((object)array("nome" => "Home", "link" => "Home"), (object)array("nome" => "Categoria dele", "link" => "Home/lista")), "current" => "Nome do produto");;

        $data["javascript"] = [
            base_url("assets/js/home/detalhes.js")
        ];

        $this->data["content"] = $this->load->view("home/detalhes", $this->data, true);
        $this->load->view("template/content", $this->data);
    }

    public function favoritar()
    {
        $rst = $this->m_home->favoritar();
        echo json_encode($rst, JSON_UNESCAPED_UNICODE);
    }

}