<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        
    }

    public function index() {
        $data = [
            'total_yudisium' => $this->Mahasiswa_model->get_total_yudisium(),
            'total_yudisium_pin' => $this->Mahasiswa_model->get_total_yudisium_pin(),
            'total_yudisium_nonpin' => $this->Mahasiswa_model->get_total_yudisium_nonpin()
        ];
        $this->load->view('templates/header');
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
    
}
