<?php
class Home extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'home_model' );
		$this->load->helper ( 'url_helper' );
	}
	
	public function index(){
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('home/index');
		$this->load->view('templates/footer');
	}
}