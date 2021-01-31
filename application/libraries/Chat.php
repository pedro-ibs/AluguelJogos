<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat {
	function __construct(){
		$this->ci =& get_instance();
		$this->data = array();
	}

	/**
	 * carrega os dados do cliente 
	*/
	private function loadCliente($idCliente){
		$this->data['client'] = (object)array();
	}

	/**
	 * carrega os dados do vendedor que está ofertando o produto
	 */
	private function loadVendedor($idProduto){
		$this->data['vendedor'] = (object)array();
	}

	/**
	 * carrega as mensagem trocadas e monta o html delas
	 */
	private function loadMensagens ($idCliente, $idVendedor){
		$this->data['mensagens'] = '';
	}

	/**
	 * monta o html do chat todo
	 */
	private function loadChat ($mensagens){
		$this->data['chat'] = '';
	}

	/**
	 * carregar html do chat
	 */
	public function gerarHtmlChat($idCliente, $idProduto){
		$this->data['chat'] = $this->ci->load->view("chat/chat", $this->data, true);
		return $this->data['chat'];
	}
}