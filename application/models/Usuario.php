<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Model{
    
    function __construct() {
        parent::__construct();       
        $this->db = $this->load->database("default", true);
    }

    public function listarTodos(){
        $query = $this->db->get("Usuario")->result();
        return $query;
    }

    public function mostrarUsuario1($id){
        $query = $this->db->get_where('Usuario', array('id=' => $id))->result();
        return $query;
    }

    public function mostrarUsuario2($email, $senha){
        $query = $this->db->get_where('Usuario', array('email=' => $email), array('senha=' => $senha))->result();
        return $query;
    }

    public function adicionarUsuario ($nome, $email, $senha, $bio){
        $data = array(
            'nome'  => $nome,
            'email' => $email,
            'senha' => $senha,
            'bio'   => $bio
        );

        $this->db->insert('Usuario', $data);
    }

    public function deletarUsuario ($email, $senha){
        $this->db->delete('Usuario', array('email=' => $email), array('senha=' => $senha));
    }
}