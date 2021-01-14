<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jogo_categoria extends CI_Model{

    function __construct() {
        parent::__construct();       
        $this->db = $this->load->database("default", true);
    }

    public function listarTodos(){
        $query = $this->db->get("Jogo_categoria")->result();
        return $query;
    }

    public function mostrarJogo_categoria1($id){
        $query = $this->db->get_where('Jogo_categoria', array('id=' => $id))->result();
        return $query;
    }

    public function mostrarJogo_categoria2($id_jogo){
        $query = $this->db->get_where('Jogo_categoria', array('id_jogo=' => $id_jogo))->result();
        return $query;
    }

    public function mostrarJogo_categoria3($id_categoria){
        $query = $this->db->get_where('Jogo_categoria', array('id_categoria=' => $id_categoria))->result();
        return $query;
    }

    public function adicionarJogo_categoria ($id_jogo, $id_categoria){
        $data = array(
            'id_jogo'       => $id_jogo,
            'id_categoria'  => $id_categoria,
        );

        $this->db->insert('Jogo_categoria', $data);
    }

    public function deletarJogo_categoria1 ($id_jogo){
        $this->db->delete('Jogo_categoria', array('id_jogo=' => $id_jogo));
    }

    public function deletarJogo_categoria2 ($id_categoria){
        $this->db->delete('Jogo_categoria', array('id_categoria=' => $id_categoria));
    }

} 