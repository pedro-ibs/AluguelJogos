<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_model extends CI_Model{    
	function __construct(){
		parent::__construct();
		$this->dados = $this->session->userdata("dados" . APPNAME);
	}


	private  function getProduto($idProduto){
		$query = $this->db->get_where('Produto', array('id=' => $idProduto))->result();
		return $query;
	}


	private function getChat($idCliente, $idProduto){
		$data = array(
			'id_usuario=' => $idCliente,
			'id_produto=' => $idProduto	
		);

		$query = $this->db->get_where('Chat', $data)->result();
		return $query;
	}

	/**************************************************************************************************************/
	
	public function getCliente($idCliente){
		$query = $this->db->get_where('Usuario', array('id=' => $idCliente))->result();
		return $query;
	}

	public function getVendedor($idProduto){
		$query = $this->getProduto($idProduto)[0];
		$query = $this->getCliente($query->id_usuario);
		return $query;
	}

	public function getMsg($idCliente, $idProduto){
		$chat		= $this->getChat($idCliente, $idProduto)[0];
		$query = $this->db->get_where('Mensagem', array('id_chat=' => $chat->id))->result();
	}
}