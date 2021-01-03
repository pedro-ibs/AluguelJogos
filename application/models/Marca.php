<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marca extends CI_Model{

    function __construct() {
        parent::__construct();       
        $this->db = $this->load->database("default", true);
    }

    public function listarTodos(){
        $query = $this->db->get("Marca")->result();
        return $query;
    }

    public function mostrarMarca1($id){
        $query = $this->db->get_where('Marca', array('id=' => $id))->result();
        return $query;
    }

    public function mostrarMarca2($nome){
        $query = $this->db->get_where('Marca', array('nome=' => $nome))->result();
        return $query;
    }

    public function adicionarMarca ($nome){
        $data = array(
            'nome'  => $nome,
        );

        $this->db->insert('Marca', $data);
    }

    public function deletarMarca ($nome){
        $this->db->delete('Marca', array('nome=' => $nome));
    }
}