<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Model{

    function __construct() {
        parent::__construct();       
        $this->db = $this->load->database("default", true);
    }

    public function listarTodos(){
        $query = $this->db->get("Chat")->result();
        return $query;
    }

    public function mostrarChat1($id){
        $query = $this->db->get_where('Chat', array('id=' => $id))->result();
        return $query;
    }

    public function mostrarChat2($id_usuario, $id_produto){
        $query = $this->db->get_where('Chat', array('id_usuario=' => $id_usuario), array('id_produto=' => $id_produto))->result();
        return $query;
    }

    public function adicionarChat ($id_usuario, $id_produto){
        $data = array(
            'id_usuario'    => $id_usuario,
            'id_produto'    => $id_produto,
        );

        $this->db->insert('Chat', $data);
    }

}