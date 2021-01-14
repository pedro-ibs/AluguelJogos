<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();
        $this->dados = $this->session->userdata("dados" . APPNAME);
    }

    public function get_cards($id)
    {
        $query = $this->db->get_where("Jogo_categoria", "id_categoria = $id")->result();

        $produto = array();
        foreach($query as $item)
        {
            $query2 = $this->db->get_where("Produto", "id = $item->id_produto")->result();
            if($query2)
                $produto = array_merge($produto, $query2);
        }

        shuffle($produto);

        foreach($produto as $item)
        {
            if($this->dados)
                $item->favorito = $this->db->get_where("Favorito", "id_produto = '$item->id' AND id_usuario = '".$this->dados->usuario_id."'")->result();
            else
                $item->favorito = (object)array();
            
            $item->imagem = $this->db->get_where("Imagem", "id_produto = $item->id AND principal = 1")->row();
        }

        return $produto;
    }

    public function get_jogo_info($id)
    {
        $query = $this->db->get_where("Produto", "id = '$id'")->row();

        $this->db->select("cat.*");
        $this->db->join("Categoria cat", "cat.id = jocat.id_categoria");
        $query->categoria = $this->db->get_where("Jogo_categoria jocat", "jocat.id_produto = '$id'")->result();

        $query->marca = $this->db->get_where("Marca", "id = '$query->id_marca'")->row();

        $query->tipo = $this->db->get_where("Tipo_produto", "id = ".$query->tipo)->row();

        $this->db->order_by("principal", "desc");
        $query->imagem = $this->db->get_where("Imagem", "id_produto = ".$query->id)->result();

        if($this->dados)
            $query->favorito = $this->db->get_where("Favorito", "id_produto = '$query->id' AND id_usuario = '".$this->dados->usuario_id."'")->row();
        else
            $query->favorito = array();
        $query->perguntas = $this->db->get_where("Pergunta", "id_produto = '$query->id'")->result();

        return $query;
    }

    public function favoritar()
    {
        $data = (object)$this->input->post();
        $rst = (object)array("rst" => 0);
        
        if($data->tipo == "preenchido")
        {
            $this->db->set("ativo", 0);

            $this->db->where("id_produto = '$data->id_produto' AND '".$this->dados->usuario_id."'");
            if($this->db->update("Favorito"))
                $rst->rst = 2;
            else
                $rst->rst = 0;
        }
        else if($data->tipo == "vazio")
        {
            $query = $this->db->get_where("Favorito", "id_produto = '$data->id_produto' AND id_usuario = '".$this->dados->usuario_id."'")->row();

            if($query)
            {
                $this->db->set("ativo", 1);

                $this->db->where("id = '$query->id'");
                if($this->db->update("Favorito"))
                    $rst->rst = 1;
                else
                    $rst->rst = 0;
            }
            else
            {
                $this->db->set("ativo", 1);
                $this->db->set("id_produto", $data->id_produto);
                $this->db->set("id_usuario", $this->dados->usuario_id);

                if($this->db->insert("Favorito"))
                    $rst->rst = 1;
                else
                    $rst->rst = 0;
            }
        }

        return $rst;
    }

}