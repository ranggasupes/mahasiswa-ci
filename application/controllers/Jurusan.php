<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jurusan_model');
        $this->load->model('Fakultas_model');
    }

    public function index()
    {
        $data['jurusan'] = $this->Jurusan_model->get_all_jurusan();
        $data['fakultas'] = $this->Fakultas_model->get_all_fakultas();

        $this->load->view('templates/header');
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('jurusan/index', $data);
        $this->load->view('templates/footer');
    }

    public function store()
    {
        if ($this->input->post()) {
            $code_jurusan = $this->input->post('code_jurusan');

            // Cek apakah kode jurusan sudah ada
            if ($this->Jurusan_model->is_code_jurusan_exist($code_jurusan)) {
                $this->session->set_flashdata('error', 'Kode jurusan sudah digunakan!');
                redirect('jurusan');
            }

            $data = [
                'code_jurusan' => $code_jurusan,
                'nama_jurusan' => $this->input->post('nama_jurusan'),
                'code_fakultas' => $this->input->post('code_fakultas'),
            ];
            $this->Jurusan_model->insert_jurusan($data);
            $this->session->set_flashdata('success', 'Jurusan berhasil ditambahkan.');
            redirect('jurusan');
        }
    }

    public function update()
    {
        if ($this->input->post()) {
            $code_jurusan = $this->input->post('code_jurusan');
            $data = [
                'nama_jurusan' => $this->input->post('nama_jurusan'),
                'code_fakultas' => $this->input->post('code_fakultas'),
            ];
            $this->Jurusan_model->update_jurusan($code_jurusan, $data);
            $this->session->set_flashdata('success', 'Jurusan berhasil diperbarui.');
            redirect('jurusan');
        }
    }

    public function delete($id)
    {
        $this->Jurusan_model->delete_jurusan($id);
        $this->session->set_flashdata('success', 'Jurusan berhasil dihapus.');
        redirect('jurusan');
    }
}
