<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Model{

    function __construct() {
        parent::__construct();       
        $this->db = $this->load->database("default", true);
    }

    public function listarTodos(){
        $query = $this->db->get("Categoria")->result();
        return $query;
    }

    public function mostrarCategoria1($id){
        $query = $this->db->get_where('Categoria', array('id=' => $id))->result();
        return $query;
    }

    public function mostrarCategoria2($nome){
        $query = $this->db->get_where('Categoria', array('nome=' => $nome) )->result();
        return $query;
    }

    public function adicionarCategoria ($nome){
        $data = array(
            'nome'  => $nome,
        );

        $this->db->insert('Categoria', $data);
    }

    public function deletarCategoria ($nome){
        $this->db->delete('Categoria', array('nome=' => $nome));
    }
}