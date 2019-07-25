<?php

class Faturas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('fatura_model');
        $this->load->helper('url_helper');
    }

    public function adicionar() {
        $data ['faturas'] = $this->fatura_model->get_faturas();

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('dtfatura', 'Dtfatura', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/menu');
            $this->load->view('faturas/adicionar', $data);
            $this->load->view('templates/footer');
        } else {
            $this->fatura_model->adicionarFatura();
            //echo "<script>alert('Fatura adicionada com sucesso');</script>";
            //echo '<meta http-equiv="refresh" content=0;url="'.$_SERVER['REQUEST_URI'].'">';      
                $link = $_SERVER['HTTP_REFERER'];
                $ex = explode('/', $link);
                $ultima = $ex[count($ex) - 1];
                echo '<meta http-equiv="refresh" content=0;url="' . site_url('/faturas/filtroUsuario/').$ultima. '">';
            
        }
    }

    public function delete() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $fatura_item = $this->fatura_model->get_fatura_by_id($id);

        $this->fatura_model->delete_fatura($id);
        //redirect('../');
        echo '<meta http-equiv="refresh" content=0;url="' . site_url('/faturas/filtroUsuario/').$fatura_item['cliente']. '">';
    }

    public function filtroUsuario($id) {
        $data ['faturas'] = $this->fatura_model->filtroUsuario($id);

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('dtfatura', 'Dtfatura', 'required');


        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/menu');
            $this->load->view('faturas/adicionar', $data);
            $this->load->view('templates/footer');
        } else {
            $this->fatura_model->adicionarFatura();
            //echo "<script>alert('Fatura adicionada com sucesso');</script>";
            echo '<meta http-equiv="refresh" content=0;url="' . $_SERVER["REQUEST_URI"] . '">';
        }
    }

    public function view($id) {
        $data ['fatura_item'] = $this->fatura_model->get_fatura_by_id($id);

        if (empty($data ['fatura_item'])) {
            show_404();
            echo var_dump($data);
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('faturas/view', $data);
        $this->load->view('templates/footer');
    }

    public function editar() {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data ['fatura_item'] = $this->fatura_model->get_fatura_by_id($id);

        $this->form_validation->set_rules('dtfatura', 'Dtfatura', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('faturas/editar', $data);
            $this->load->view('templates/footer');
        } else {
            $this->fatura_model->adicionarFatura($id);
            // $this->load->view('news/success');
            echo "<script>alert('A fatura foi editada com sucesso');</script>";
            //$var = "<script>javascript:history.back()</script>";
            //echo $var;
            $vet = $data['fatura_item'];
            echo $vet['cliente'];
            echo '<meta http-equiv="refresh" content=0;url="' . site_url('/faturas/filtroUsuario/').$vet['cliente']. '">';
        }
    }

}
