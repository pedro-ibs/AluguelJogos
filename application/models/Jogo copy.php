<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jogo extends CI_Model{

    function __construct() {
        parent::__construct();       
        $this->db = $this->load->database("default", true);
    }

    public function listarTodos(){
        $query = $this->db->get("Jogo")->result();
        return $query;
    }

    public function mostrarJogo1($id){
        $query = $this->db->get_where('Jogo', array('id=' => $id))->result();
        return $query;
    }

    public function adicionarJogo ($id_marca, $titulo, $descricao){
        $data = array(
            'id_marca'  => $id_marca,
            'titulo'    => $titulo,
            'descricao' => $descricao,
        );

        $this->db->insert('Jogo', $data);
    }

    public function deletarJogo ($id){
        $this->db->delete('Jogo', array('id=' => $id));
    }
}