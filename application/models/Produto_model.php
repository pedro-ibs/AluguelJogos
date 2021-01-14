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

}