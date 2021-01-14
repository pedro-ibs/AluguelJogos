<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pergunta extends CI_Model{

    function __construct() {
        parent::__construct();       
        $this->db = $this->load->database("default", true);
    }

    public function listarTodos(){
        $query = $this->db->get("Pergunta")->result();
        return $query;
    }

    public function mostrarPergunta1($id){
        $query = $this->db->get_where('Pergunta', array('id=' => $id))->result();
        return $query;
    }

    public function mostrarPergunta2($id_usuario){
        $query = $this->db->get_where('Pergunta', array('id_usuario=' => $id_usuario))->result();
        return $query;
    }

    public function mostrarPergunta3($id_produto){
        $query = $this->db->get_where('Pergunta', array('id_produto=' => $id_produto))->result();
        return $query;
    }

    public function adicionarPergunta ($id_usuario, $id_produto, $pergunta){
        $data = array(
            'id_usuario'    => $id_usuario,
            'id_produto'    => $id_produto,
            'pergunta'      => $pergunta,
            'resposta'      => ''  
        );

        $this->db->insert('Pergunta', $data);
    }

    public function responder ($id, $resposta){
        $data = $this->mostrarPergunta1($id);
        $data->resposta = $resposta;
        $this->db->update('Pergunta', $data, array('id' => $data->id));
    }

}