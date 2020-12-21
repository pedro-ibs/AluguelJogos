<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exemplo_model extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();       
        $this->db = $this->load->database("default", true);
    }

    public function get_info()
    {
        $query = $this->db->get("Categoria")->result();

        return $query;
    }
    
}