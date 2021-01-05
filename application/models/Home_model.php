<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();
    }

    public function get_cards($id)
    {
        $query = $this->db->get_where("Jogo_categoria", "id_categoria = $id")->result();

        $produto = array();
        foreach($query as $item)
        {
            $query2 = $this->db->get_where("Produto", "id = $item->id_jogo")->result();
            if($query2)
                $produto = array_merge($produto, $query2);
        }

        shuffle($produto);

        foreach($produto as $item)
        {
            $item->jogo = $this->db->get_where("Jogo", "id = '$item->id_jogo'")->row();
            $item->imagem = $this->db->get_where("Imagem", "id_produto = $item->id AND principal = 1")->row();
        }

        return $produto;
    }

    public function get_jogo_info($id)
    {
        $query = $this->db->get_where("Jogo", "id = '$id'")->row();

        $this->db->select("cat.*");
        $this->db->join("Categoria cat", "cat.id = jocat.id_categoria");
        $query->categoria = $this->db->get_where("Jogo_categoria jocat", "jocat.id_jogo = '$id'")->result();

        $query->marca = $this->db->get_where("Marca", "id = '$query->id_marca'")->row();

        $query->produto = $this->db->get_where("Produto", "id_jogo = '$id'")->row();
        $query->tipo = $this->db->get_where("Tipo_produto", "id = ".$query->produto->tipo)->row();

        $this->db->order_by("principal", "desc");
        $query->imagem = $this->db->get_where("Imagem", "id_produto = ".$query->produto->id)->result();

        // $query->perguntas = $this->db->get_where("Perguntas", "id_servico = '$query->id'")->result();

        // echo '<pre>';
        // print_r($query);
        // echo '</pre>';
        // exit;

        return $query;
    }

    public function perguntar($pergunta)
    {
        $rst = (object)array("rst" => false, "msg" => "");

        //Terminar o formulario de perguntar.
    }

}