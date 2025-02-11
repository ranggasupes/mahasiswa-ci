<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Registrasi_model');
        $this->load->model('Mahasiswa_model'); 
        $this->load->model('Periode_model'); // ✅ Load Periode_model untuk mengambil periode aktif
    }

    public function index() {
        // Fetch mahasiswa with PIN
        $data['mahasiswa_pin'] = $this->Registrasi_model->get_mahasiswa_pin();
        $this->load->view('templates/header');
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('registrasi/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id) {
        $data['mahasiswa'] = $this->Registrasi_model->get_mahasiswa_by_id($id);
        $this->load->view('registrasi/edit', $data);
    }

    public function update() {
        $id = $this->input->post('id');

        // ✅ Mengambil periode yang sedang aktif
        $periode_aktif = $this->Periode_model->getPeriodeAktif();
        $id_periode = !empty($periode_aktif) ? $periode_aktif['id'] : null;

        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
            'ipk' => $this->input->post('ipk'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'status_regis' => '1',
            'id_periode' => $id_periode  // ✅ Set periode otomatis
        ];

        $this->Registrasi_model->update_mahasiswa($id, $data);
        redirect('registrasi');
    }
}
