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

        $rst = array();
        foreach($query as $item)
        {
            $rst[] = $this->db->get_where("Jogo", "id = '$item->id_jogo'")->row();
        }

        return $rst;
    }

    public function get_jogo_info($id)
    {
        $query = $this->db->get_where("Jogo", "id = '$id'")->row();

        $this->db->select("cat.*");
        $this->db->join("Categoria cat", "cat.id = jocat.id_categoria");
        $query->categoria = $this->db->get_where("Jogo_categoria jocat", "jocat.id_jogo = '$id'")->result();

        $query->marca = $this->db->get_where("Marca", "id = '$query->id_marca'")->row();

        $query->produto = $this->db->get_where("Produto", "id_jogo = '$id'")->row();

        // $query->perguntas = $this->db->get_where("Perguntas", "id_servico = '$query->id'")->result();

        return $query;
    }

    public function perguntar($pergunta)
    {
        $rst = (object)array("rst" => false, "msg" => "");

        //Terminar o formulario de perguntar.
    }

}