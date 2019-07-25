<?php
class Tarefas extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'tarefa_model' );
		$this->load->helper ( 'url_helper' );
	}
	public function index() {
		$data ['tarefas'] = $this->tarefa_model->get_tarefas ();
		
		$this->load->view ( 'templates/header' );
		$this->load->view ( 'templates/menu' );
		$this->load->view ( 'tarefas/index', $data );
		$this->load->view ( 'templates/footer' );
	}
	public function adicionar() {
		$this->load->helper ( 'form' );
		$this->load->library ( 'form_validation' );
		
		$this->form_validation->set_rules ( 'titulo', 'Titulo', 'required' );
		
		if ($this->form_validation->run () === FALSE) {
			$this->load->view ( 'templates/header' );
			$this->load->view ( 'templates/menu' );
			$this->load->view ( 'tarefas/adicionar' );
			$this->load->view ( 'templates/footer' );
		} else {
			$this->tarefa_model->adicionarTarefa ();
			echo "<script>alert('A tarefa foi adicionada com sucesso');</script>";
			echo '<meta http-equiv="refresh" content=0;url="'.site_url('tarefas').'">';
		}
	}
	public function delete() {
		$id = $this->uri->segment ( 3 );
		
		if (empty ( $id )) {
			show_404 ();
		}
		
		$tarefa_item = $this->tarefa_model->get_tarefa_by_id ( $id );
		
		$this->tarefa_model->delete_tarefa ( $id );
		redirect ( '../tarefas' );
	}
	public function editar() {
		$id = $this->uri->segment ( 3 );
		
		if (empty ( $id )) {
			show_404 ();
		}
		
		$this->load->helper ( 'form' );
		$this->load->library ( 'form_validation' );
		
		$data ['tarefa_item'] = $this->tarefa_model->get_tarefa_by_id ( $id );
		
		$this->form_validation->set_rules ( 'titulo', 'Titulo', 'required' );
		
		if ($this->form_validation->run () === FALSE) {
			$this->load->view ( 'templates/header', $data );
			$this->load->view ( 'templates/menu' );
			$this->load->view ( 'tarefas/editar', $data );
			$this->load->view ( 'templates/footer' );
		} else {
			$this->tarefa_model->adicionarTarefa ( $id );
			// $this->load->view('news/success');
			echo "<script>alert('A tarefa foi editada com sucesso');</script>";
		echo '<meta http-equiv="refresh" content=0;url="'.site_url('tarefas').'">';
		}
	}
	public function view($id) {
		$data ['tarefa_item'] = $this->tarefa_model->get_tarefa_by_id ( $id );
		
		if (empty ( $data ['tarefa_item'] )) {
			show_404 ();
		}
		
		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'templates/menu' );
		$this->load->view ( 'tarefas/view', $data );
		$this->load->view ( 'templates/footer' );
	}
	public function endTask() {
		$id = $this->uri->segment ( 3 );
		
		if (empty ( $id )) {
			show_404 ();
		}
		
		$tarefa_item = $this->tarefa_model->get_tarefa_by_id ( $id );
		$this->tarefa_model->finaliza_tarefa ( $id );
		echo "<script>alert('A tarefa foi finalizada com sucesso');</script>";
		echo '<meta http-equiv="refresh" content=0;url="'.site_url('tarefas').'">';
	}
}