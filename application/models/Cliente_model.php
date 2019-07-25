<?php

class Cliente_model extends CI_Model{
    public function __construct() {
		$this->load->database ();
	}
    public function adicionarCliente($id = 0) {
		$this->load->helper ( 'url' );
		
		$data = array (
				'nome' => $this->input->post ( 'nome' ), 
		);
		
		if ($id == 0) {
			return $this->db->insert ( 'clientes', $data );
		} else {
			$this->db->where ( 'id', $id );
			return $this->db->update ( 'clientes', $data );
		}
	}
        
    public function get_clientes($nome = FALSE) {
		if ($nome === FALSE) {
			$query = $this->db->get ( 'clientes' );
			return $query->result_array ();
		}
		
		$query = $this->db->get_where ( 'clientes', array (
				'nome' => $nome 
		) );
		return $query->row_array ();
	}
         
    public function get_cliente_by_id($id = 0) {
		if ($id === 0) {
			$query = $this->db->get ( 'clientes' );
			return $query->result_array ();
		}
		
		$query = $this->db->get_where ( 'clientes', array (
				'id' => $id 
		) );
		return $query->row_array ();
	}
        
    public function delete_cliente($id) {
		$this->db->where ( 'id', $id );
		return $this->db->delete ( 'clientes' );
	}
        
    public function getCliente($id){
            $clientes = $this->db->query('select * from clientes where cliente="'.$id.'"');
                return $clientes->result_array();
        }
}

