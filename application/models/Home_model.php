<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();
        $this->data["dados"] = $this->dados;
    }

    public function get_cards($subcategoria)
    {
        $query = $this->db->get_where("Categoria", "nome = '$subcategoria'")->row();

        $query2 = $this->db->get_where("Servico", "ativo = 1 AND id_categoria = $query->id")->result();

        foreach($query2 as $item)
        {
            $this->db->select("usu.nome, usu.sobrenome");
            $this->db->join("Usuario usu", "usu.id = usuSer.id_usuario");
            $item->usuario = $this->db->get_where("UsuarioServico usuSer", "usuSer.id_servico = '$item->id'")->row();

            $this->db->group_by("id", "desc");
            $item->feedback = $this->db->get_where("Feedback", "id_servico = '$item->id'")->row();
        }

        return $query2;
    }

    public function get_servico_info($servico)
    {
        $query = $this->db->get_where("Servico", "nome = '$servico'")->row();

        $query->favoritos = $this->db->get_where("Favoritos", "id_servico = '$query->id'")->row();

        $query->pagamento = $this->db->get_where("PagamentoServico", "id_servico = '$query->id'")->result();

        $this->db->order_by("ativo", "desc");
        $query->imagens = $this->db->get_where("Imagens", "id_servico = '$query->id'")->result();

        $query->perguntas = $this->db->get_where("Perguntas", "id_servico = '$query->id'")->result();

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