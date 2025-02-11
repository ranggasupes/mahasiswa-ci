<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yudisium extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Yudisium_model');
        $this->load->model('Fakultas_model'); // model untuk fakultas
        $this->load->model('Jurusan_model');  // model untuk jurusan
    }

    public function index() {

        $data = [
            'mahasiswa_nonpin' => $this->Yudisium_model->get_mahasiswa_nonpin(),
            'mahasiswa_pin' => $this->Yudisium_model->get_mahasiswa_pin(),
            'fakultas' => $this->Fakultas_model->get_all_fakultas(),
            'jurusan' => $this->Jurusan_model->get_all_jurusan()
        ];

        $this->load->view('templates/header');
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('yudisium/index', $data);
        $this->load->view('templates/footer');
    }

    public function store() {
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $code_fakultas = $this->input->post('code_fakultas');
        $code_jurusan = $this->input->post('code_jurusan');
    
        // Cek apakah jurusan sesuai dengan fakultas yang dipilih
        $jurusan = $this->Jurusan_model->get_jurusan_by_code($code_jurusan);
        
        if (!$jurusan || $jurusan['code_fakultas'] !== $code_fakultas) {
            $this->session->set_flashdata('error', 'Jurusan tidak sesuai dengan fakultas yang dipilih.');
            redirect('yudisium');
            return;
        }
    
        $data = [
            'nim' => $nim,
            'nama' => $nama,
            'code_fakultas' => $code_fakultas,
            'code_jurusan' => $code_jurusan,
            'status_regis' => 'yudisium',
            'pin' => 0 // set default PIN to 0 (non-pin)
        ];
        
        $this->Yudisium_model->insert_yudisium($data);
        redirect('yudisium');
    }
    
    public function update_pin() {
        $id = $this->input->post('id');
        $pin = $this->input->post('pin'); // PIN bisa berupa string atau angka
    
        log_message('debug', "Update PIN Mahasiswa ID: $id, PIN: $pin");
    
        // Update PIN mahasiswa di database
        $this->Yudisium_model->update_pin($id, $pin);
    
        // Feedback setelah update PIN
        $this->session->set_flashdata('success', 'PIN mahasiswa berhasil diperbarui.');
        redirect('yudisium');
    }
    
    

    public function getJurusan()
    {
        $code_fakultas = $this->input->post('code_fakultas');
        $jurusan = $this->Mahasiswa_model->getJurusanByFakultas($code_fakultas);
        
        echo json_encode($jurusan); // Mengirim data jurusan dalam format JSON
    }
    
    
    
}
