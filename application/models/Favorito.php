<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Favorito extends CI_Model{

    function __construct() {
        parent::__construct();       
        $this->db = $this->load->database("default", true);
    }

    public function listarTodos(){
        $query = $this->db->get("Favorito")->result();
        return $query;
    }

    public function mostrarFavorito1($id){
        $query = $this->db->get_where('Favorito', array('id=' => $id))->result();
        return $query;
    }

    public function mostrarFavorito2($id_usuario){
        $query = $this->db->get_where('Favorito', array('id_usuario=' => $id_usuario))->result();
        return $query;
    }

    public function mostrarFavorito3($id_produto){
        $query = $this->db->get_where('Favorito', array('id_produto=' => $id_produto))->result();
        return $query;
    }

    public function adicionarFavorito ($id_usuario, $id_produto, $Favorito){
        $data = array(
            'id_usuario'    => $id_usuario,
            'id_produto'    => $id_produto,
        );

        $this->db->insert('Favorito', $data);
    }

    public function deletarFavorito ($id_usuario, $id_produto){
        $this->db->delete('Favorito', array('id_usuario=' => $id_usuario), array('id_produto=' => $id_produto));
    }

}