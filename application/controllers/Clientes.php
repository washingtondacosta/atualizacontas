<?php

class Clientes extends CI_Controller{
    public function __construct() {
		parent::__construct ();
		$this->load->model ( 'cliente_model' );
		$this->load->helper ( 'url_helper' );
	}
        
    public function adicionar() {
                $data ['clientes'] = $this->cliente_model->get_clientes ();
                
		$this->load->helper ( 'form' );
		$this->load->library ( 'form_validation' );
		
		$this->form_validation->set_rules ( 'nome', 'Nome', 'required' );
		
		if ($this->form_validation->run () === FALSE) {
			$this->load->view ( 'templates/header' );
			$this->load->view ( 'templates/menu' );
			$this->load->view ( 'clientes/adicionar', $data );
			$this->load->view ( 'templates/footer' );
		} else {
			$this->cliente_model->adicionarCliente ();
			echo "<script>alert('Cliente adicionado com sucesso');</script>";
			echo '<meta http-equiv="refresh" content=0;url="'.site_url('clientes/adicionar').'">';
		}
	}
        
    public function delete() {
		$id = $this->uri->segment ( 3 );
		
		if (empty ( $id )) {
			show_404 ();
		}
		
		$cliente_item = $this->cliente_model->get_cliente_by_id ( $id );
		
		$this->cliente_model->delete_cliente ( $id );
		redirect ( '../' );
	}
}

