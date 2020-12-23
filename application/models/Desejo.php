<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desejo extends CI_Model{

    function __construct() {
        parent::__construct();       
        $this->db = $this->load->database("default", true);
    }

    public function listarTodos(){
        $query = $this->db->get("Desejo")->result();
        return $query;
    }

    public function mostrarDesejo1($id){
        $query = $this->db->get_where('Desejo', array('id=' => $id))->result();
        return $query;
    }

    public function mostrarDesejo2($id_jogo){
        $query = $this->db->get_where('Desejo', array('id_jogo=' => $id_jogo))->result();
        return $query;
    }

    public function mostrarDesejo3($id_produto){
        $query = $this->db->get_where('Desejo', array('id_produto=' => $id_produto))->result();
        return $query;
    }

    public function adicionarDesejo ($id_jogo, $id_produto, $Desejo){
        $data = array(
            'id_jogo'    => $id_jogo,
            'id_produto'    => $id_produto,
        );

        $this->db->insert('Desejo', $data);
    }

    public function deletarDesejo ($id_jogo, $id_produto){
        $this->db->delete('Desejo', array('id_jogo=' => $id_jogo), array('id_produto=' => $id_produto));
    }

}