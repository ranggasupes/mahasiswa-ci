<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Fakultas_model');
        $this->load->library('session');
    }

    public function index()
    {
        $data['fakultas'] = $this->Fakultas_model->get_all_fakultas();
        
        $this->load->view('templates/header');
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('fakultas/index', $data);
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $code = $this->input->post('code_fakultas', TRUE);
        $nama = $this->input->post('nama_fakultas', TRUE);

        if ($this->Fakultas_model->is_code_exists($code)) {
            $this->session->set_flashdata('error', 'Kode Fakultas sudah digunakan! Silakan gunakan kode lain.');
        } else {
            $data = ['code_fakultas' => $code, 'nama_fakultas' => $nama];
            $this->Fakultas_model->insert_fakultas($data);
            $this->session->set_flashdata('success', 'Fakultas berhasil ditambahkan!');
        }

        redirect('fakultas');
    }

    public function update()
    {
        $code = $this->input->post('edit_code_fakultas', TRUE);
        $nama = $this->input->post('edit_nama_fakultas', TRUE);

        if (empty($code) || empty($nama)) {
            $this->session->set_flashdata('error', 'Data tidak boleh kosong!');
            redirect('fakultas');
        }

        $data = ['nama_fakultas' => $nama];

        if ($this->Fakultas_model->update_fakultas($code, $data)) {
            $this->session->set_flashdata('success', 'Fakultas berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui Fakultas!');
        }

        redirect('fakultas');
    }

    public function delete()
    {
        $code = $this->input->post('delete_code_fakultas', TRUE);

        if ($this->Fakultas_model->delete_fakultas($code)) {
            $this->session->set_flashdata('success', 'Fakultas berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus Fakultas!');
        }

        redirect('fakultas');
    }
}
?>
