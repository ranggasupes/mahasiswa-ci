<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
    }

    public function index() {
        // Fetch only students with status_regis = 1
        $data['mahasiswa_regis'] = $this->Mahasiswa_model->get_mahasiswa_by_status_regis(1);
        $data['fakultas'] = $this->Mahasiswa_model->getFakultas();  // Fetch faculties
        $data['jurusan'] = $this->Mahasiswa_model->getJurusan();    // Fetch majors
        $data['periode'] = $this->Mahasiswa_model->getPeriode();  // Ambil daftar periode
    
        $this->load->view('templates/header');
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
    }
    public function get_jurusan_by_fakultas()
{
    $code_fakultas = $this->input->post('code_fakultas');
    $jurusan = $this->Jurusan_model->getJurusanByFakultas($code_fakultas);
    echo json_encode($jurusan);
}


    public function store() {
        $data = $this->input->post();
        $this->Mahasiswa_model->insert_mahasiswa($data);
        redirect('mahasiswa');
    }

    public function update($id) {
        $data = $this->input->post();
        $this->Mahasiswa_model->update_mahasiswa($id, $data);
        redirect('mahasiswa');
    }

    public function delete($id) {
        $this->load->model('Mahasiswa_model');
        $this->Mahasiswa_model->delete_mahasiswa($id);
        redirect('mahasiswa');
    }
    
    public function getJurusan()
{
    $code_fakultas = $this->input->post('code_fakultas');
    $jurusan = $this->Mahasiswa_model->getJurusanByFakultas($code_fakultas);
    
    echo json_encode($jurusan); // Mengirim data jurusan dalam format JSON
}

}
