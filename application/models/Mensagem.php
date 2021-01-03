<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensagem extends CI_Model{

    function __construct() {
        parent::__construct();       
        $this->db = $this->load->database("default", true);
    }

    public function listarTodos(){
        $query = $this->db->get("Mensagem")->result();
        return $query;
    }

    public function mostrarMensagem1($id){
        $query = $this->db->get_where('Mensagem', array('id=' => $id))->result();
        return $query;
    }

    public function mostrarMensagem2($id_chat){
        $query = $this->db->get_where('Mensagem', array('id_chat=' => $id_chat))->result();
        return $query;
    }

    public function adicionarMensagem ($id_chat, $id_usuario, $msg){
        $data = array(
            'id_chat'       => $id_chat,
            'id_usuario'    => $id_usuario,
            'msg'           => $msg
        );

        $this->db->insert('Mensagem', $data);
    }
}