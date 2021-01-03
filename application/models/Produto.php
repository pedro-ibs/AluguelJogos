<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Model{

    function __construct() {
        parent::__construct();       
        $this->db = $this->load->database("default", true);
    }

    public function listarTodos(){
        $query = $this->db->get("Produto")->result();
        return $query;
    }

    public function mostrarProduto1($id){
        $query = $this->db->get_where('Produto', array('id=' => $id))->result();
        return $query;
    }

    public function mostrarProduto2($id_jogo){
        $query = $this->db->get_where('Produto', array('id_jogo=' => $id_jogo))->result();
        return $query;
    }

    public function mostrarProduto3($id_usuario){
        $query = $this->db->get_where('Produto', array('id_usuario=' => $id_usuario))->result();
        return $query;
    }

    public function adicionarProduto ($id_jogo, $id_usuario, $id_categoria, $tipo, $preco, $descricao,){
        $data = array(
            'id_jogo'       => $id_jogo,
            'id_usuario'    => $id_usuario,
            'id_categoria'  => $id_categoria,
            'tipo'          => $tipo,
            'preco'         => $preco,
            'descricao'     => $descricao,
            'status'        => '0'  
        );

        $this->db->insert('Produto', $data);
    }


    public function ativarProduto ($id){
        $data = $this->mostrarProduto1($id);
        $data->status = '1';
        $this->db->update('Produto', $data, array('id' => $id));
    }

    public function pausarProduto ($id){
        $data = $this->mostrarProduto1($id);
        $data->status = '0';
        $this->db->update('Produto', $data, array('id' => $id));
    }

    public function deletarProduto ($id){
        $data = $this->mostrarProduto1($id);
        $data->status = '2';
        $this->db->update('Produto', $data, array('id' => $id));
    }
}