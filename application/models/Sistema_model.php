<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema_model extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();
            
    }

    public function get_categorias()
    {
        $categoria = $this->db->get("Categoria")->result();

        return $categoria;
    }

    public function inseri_servico()
    {
        // $this->db->set("nome", "Bartenders");
        // $this->db->set("ativo", 1);
        // $this->db->set("descricao", "Uma descrição muito interessante para uma bartenders");
        // $this->db->set("data_inclusao", "date('now')", false);
        // $this->db->set("id_tipo_servico", 1);
        // $this->db->set("id_categoria", 1);
        // $this->db->insert("Servico");

        $this->db->set("id_tipo_pagamento", 1);
        $this->db->set("id_servico", 2);
        $this->db->insert("PagamentoServico");

        $this->db->set("id_tipo_pagamento", 20);
        $this->db->set("id_servico", 2);
        $this->db->insert("PagamentoServico");
        
        $this->db->set("id_tipo_pagamento", 17);
        $this->db->set("id_servico", 2);
        $this->db->insert("PagamentoServico");

        $this->db->set("id_tipo_pagamento", 16);
        $this->db->set("id_servico", 2);
        $this->db->insert("PagamentoServico");

        $this->db->set("id_tipo_pagamento", 8);
        $this->db->set("id_servico", 2);
        $this->db->insert("PagamentoServico");

        $this->db->set("id_tipo_pagamento", 3);
        $this->db->set("id_servico", 2);
        $this->db->insert("PagamentoServico");

        $this->db->set("id_tipo_pagamento", 9);
        $this->db->set("id_servico", 2);
        $this->db->insert("PagamentoServico");

        $this->db->set("id_tipo_pagamento", 13);
        $this->db->set("id_servico", 2);
        $this->db->insert("PagamentoServico");
    }

}