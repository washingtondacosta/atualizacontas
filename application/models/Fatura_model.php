<?php

class Fatura_model extends CI_Model{
    public function __construct() {
		$this->load->database ();
	}
    public function adicionarFatura($id = 0) {
		$this->load->helper ( 'url' );
		
		$data = array (
		    'dtfatura' => $this->input->post ( 'dtfatura' ),
                    'vlfatura' => $this->input->post ( 'vlfatura' ),
                    'princc' => $this->input->post ( 'princc' ),
                    'vlincc' => $this->input->post ( 'vlincc' ),
                    'vlresultado' => $this->input->post ( 'vlresultado' ),
                    'cliente' => $this->input->post ( 'cliente' ),
		);
		
		if ($id == 0) {
			return $this->db->insert ( 'faturas', $data );
		} else {
			$this->db->where ( 'codfatura', $id );
			return $this->db->update ( 'faturas', $data );
		}
	}
        
    public function get_faturas($cliente = false) {
		if ($cliente === FALSE) {
			$query = $this->db->get ( 'faturas' );
			return $query->result_array ();
		}
		
		$query = $this->db->get_where ( 'faturas', array (
				'cliente' => $cliente 
		) );
		return $query->row_array ();
	}
        
        public function get_fatura_by_id($id = 0) {
		if ($id === 0) {
			$query = $this->db->get ( 'faturas' );
			return $query->result_array ();
		}
		
		$query = $this->db->get_where ( 'faturas', array (
				'codfatura' => $id 
		) );
		return $query->row_array ();
	}
        
        public function delete_fatura($id) {
		$this->db->where ( 'codfatura', $id );
		return $this->db->delete ( 'faturas' );
	}
        
        public function filtroUsuario($id){
            $faturas = $this->db->query('select * from faturas where cliente="'.$id.'" order by dtfatura desc');
                return $faturas->result_array();
        }
        
}

