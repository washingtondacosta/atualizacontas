<?php
class Sobre extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'sobre_model' );
		$this->load->helper ( 'url_helper' );
	}
	
	public function index(){
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('sobre/index');
		$this->load->view('templates/footer');
	}
}