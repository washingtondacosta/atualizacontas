<?php
class Tarefa_model extends CI_Model {
	public function __construct() {
		$this->load->database ();
	}
	public function adicionarTarefa($id = 0) {
		$this->load->helper ( 'url' );
		
		$data = array (
				'titulo' => $this->input->post ( 'titulo' ),
				'descricao' => $this->input->post ( 'descricao' ),
				'prioridade' => $this->input->post ( 'prioridade' ),
				'responsavel' => $this->input->post ( 'responsavel' ),
				'concluida' => $this->input->post ( 'concluida' ) 
		);
		
		if ($id == 0) {
			return $this->db->insert ( 'tarefas', $data );
		} else {
			$this->db->where ( 'id', $id );
			return $this->db->update ( 'tarefas', $data );
		}
	}
	public function get_tarefas($titulo = FALSE) {
		if ($titulo === FALSE) {
			$query = $this->db->get ( 'tarefas' );
			return $query->result_array ();
		}
		
		$query = $this->db->get_where ( 'tarefas', array (
				'titulo' => $titulo 
		) );
		return $query->row_array ();
	}
	public function get_tarefa_by_id($id = 0) {
		if ($id === 0) {
			$query = $this->db->get ( 'tarefas' );
			return $query->result_array ();
		}
		
		$query = $this->db->get_where ( 'tarefas', array (
				'id' => $id 
		) );
		return $query->row_array ();
	}
	public function delete_tarefa($id) {
		$this->db->where ( 'id', $id );
		return $this->db->delete ( 'tarefas' );
	}
	public function finaliza_tarefa($id) {
		$this->db->set ( 'concluida', 1);
		$this->db->where ( 'id', $id );
		$this->db->update ( 'tarefas' );
	}
}