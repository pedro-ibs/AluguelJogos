<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
        parent:: __construct();
        $this->data = array();

        $this->load->model("Usuario", "m_usuario");

        $this->data["header"]   = $this->load->view("template/header",  $this->data, true);
        $this->data["navbar"]   = $this->load->view("template/navbar",  $this->data, true);
        $this->data["sidebar"]  = $this->load->view("template/sidebar", $this->data, true);
        $this->data["footer"]   = $this->load->view("template/footer",  $this->data, true);
    }

    public function index()
	{
        $this->data["js"] = $this->load->view("login/js/autentifica", $this->data, true);
        
        $this->data["content"] = $this->load->view("login/autentifica", $this->data, true);
        
        $this->load->view("template/content", $this->data);
	}
}