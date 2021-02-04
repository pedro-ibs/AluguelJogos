<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

    function __construct()
    {
        parent:: __construct();
        $this->data = array();

        $this->dados = $this->session->userdata("dados" . APPNAME);
        $this->data["dados"] = $this->dados;
        
        $this->load->model("Home_model", "m_home");

        $local = str_replace("AluguelJogos/", "", $_SERVER["REQUEST_URI"]);
        $this->session->set_userdata(array("local" => $local));
        $this->data["local"] = $local;

        $this->data["categorias"] = $this->m_sistema->get_categorias();

        $this->data["header"] = $this->load->view("template/header", $this->data, true);
        $this->data["navbar"] = $this->load->view("template/navbar", $this->data, true);
        $this->data["footer"] = $this->load->view("template/footer", $this->data, true);
        $this->data["chat"]     = "";
    }

    public function index()
    {
        $this->data["cards"] = $this->m_home->get_jogos_aleatorio();

        $this->data["content"] = $this->load->view("home/home", $this->data, true);
        $this->load->view("template/content", $this->data);
    }

    public function lista($categoria = null, $id = null)
    {
        $categoria = urldecode($categoria);
        $this->data["cards"] = $this->m_home->get_cards($id);
        $this->data["categoria"] = $categoria;
        //Faz a parte das categorias.
        $this->data["breadcrumb"] = (object)array("titulo" => "Lista de jogos", "before" => array((object) array("nome" => "Home", "link" => "Home")), "current" => ucfirst($categoria));

        $this->data["javascript"] = [
            base_url("assets/js/home/lista.js")
        ];

        $this->data["content"] = $this->load->view("home/lista", $this->data, true);
        $this->load->view("template/content", $this->data);
    }

    public function detalhes($categoria, $id)
    {   
        $this->load->library("chat");

        $categoria = urldecode($categoria);
        $this->data["info"] = $this->m_home->get_jogo_info($id);
        $id_categoria = $this->m_home->categoria_by_nome($categoria);
        $this->data["breadcrumb"] = (object)array("titulo" => "Detalhes do jogo", "before" => array((object)array("nome" => "Home", "link" => "Home"), (object)array("nome" => ucfirst($categoria), "link" => "Home/lista/$categoria/$id_categoria->id")), "current" => $this->data["info"]->titulo);

        $this->data["chat"] = $this->chat->gerarHtmlChat($this->dados->usuario_id, $id);

        $this->data["javascript"] = [
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

    public function cadastrar_pergunta()
    {
        $rst = $this->m_home->cadastrar_pergunta();
        echo  json_encode($rst, JSON_UNESCAPED_UNICODE);
    }

    public function compra_jogo()
    {
        $rst = $this->m_home->compra_jogo();
        echo json_encode($rst, JSON_UNESCAPED_UNICODE);
    }

}