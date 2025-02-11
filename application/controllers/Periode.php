<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Periode_model');
    }

    public function index()
    {
        $data['periode'] = $this->Periode_model->get_all_periode();
        $this->load->view('templates/header');
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('periode/index', $data);
        $this->load->view('templates/footer');
    }

    public function store()
    {
        if ($this->input->post('status') == 1) {
            $this->Periode_model->deactivate_all(); // Nonaktifkan semua periode
        }
    
        $data = [
            'nama_periode' => $this->input->post('nama_periode'),
            'keterangan'   => $this->input->post('keterangan'),
            'status'       => $this->input->post('status')
        ];
        $this->Periode_model->insert_periode($data);
        $this->session->set_flashdata('success', 'Periode berhasil ditambahkan!');
        redirect('periode');
    }
    
    public function update()
    {
        $id = $this->input->post('id');
    
        if ($this->input->post('status') == 1) {
            $this->Periode_model->deactivate_all(); // Nonaktifkan semua periode
        }
    
        $data = [
            'nama_periode' => $this->input->post('nama_periode'),
            'keterangan'   => $this->input->post('keterangan'),
            'status'       => $this->input->post('status')
        ];
        $this->Periode_model->update_periode($id, $data);
        $this->session->set_flashdata('success', 'Periode berhasil diperbarui!');
        redirect('periode');
    }
    

    public function delete($id)
    {
        $this->Periode_model->delete_periode($id);
        $this->session->set_flashdata('success', 'Periode berhasil dihapus!');
        redirect('periode');
    }
}

