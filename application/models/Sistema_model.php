<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema_model extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();
            
    }

    public function get_categorias()
    {
        $categoria = $this->db->get("Categoria")->result();

        return $categoria;
    }

}