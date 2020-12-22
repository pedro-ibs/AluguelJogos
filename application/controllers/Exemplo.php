<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exemplo extends CI_Controller {

    function __construct(){
        parent:: __construct();
        $this->data = array();

        $this->load->model("Usuario", "m_exemplo");

        //Carrega todos os dados da construção da pagina automaticamente.
        //Qualquer pagina que você criar dentro desse controller, vai ter essas paginas carregadas automaticamente.
        $this->data["header"]   = $this->load->view("template/header",  $this->data, true);
        $this->data["navbar"]   = $this->load->view("template/navbar",  $this->data, true);
        $this->data["sidebar"]  = $this->load->view("template/sidebar", $this->data, true);
        $this->data["footer"]   = $this->load->view("template/footer",  $this->data, true);
    }

    public function index()
	{
        $this->data["info"] = $this->m_exemplo->mostrarUsuario2('affg@gmail.com', '12345');
        //$this->m_exemplo->deletarUsuario('opa', 'opa');
        
        
        //Utilize sempre esse nome no $this->data["content"].

        $this->data["content"] = $this->load->view("home/home", $this->data, true);
        
        $this->load->view("template/content", $this->data);
	}
}