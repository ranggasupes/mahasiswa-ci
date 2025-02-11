<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {
    public function getMahasiswa() {
        $this->db->select('mahasiswa.*, fakultas.nama_fakultas, jurusan.nama_jurusan');
        $this->db->from('mahasiswa');
        $this->db->join('fakultas', 'fakultas.code_fakultas = mahasiswa.code_fakultas', 'left');
        $this->db->join('jurusan', 'jurusan.code_jurusan = mahasiswa.code_jurusan', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }
    // Get Total Yudisium   
    public function get_total_yudisium() {
        return $this->db->count_all('mahasiswa');
    }

    public function get_total_yudisium_pin() {
        $this->db->where('pin !=', 0); // Ambil semua mahasiswa yang bukan NONPIN
        return $this->db->count_all_results('mahasiswa');
    }
    
    public function get_total_yudisium_nonpin() {
        $this->db->where('pin', 0);
        return $this->db->count_all_results('mahasiswa');
    }
    
    
    
    public function get_mahasiswa_pin() {
        $this->db->where("pin IS NOT NULL AND pin != ''");
        return $this->db->get('mahasiswa')->result_array();
    }
    
    // Get Mahasiswa by ID
    public function get_mahasiswa_by_id($id) {
        return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
    }
    public function getFakultas() {
        return $this->db->get('fakultas')->result_array();
    }
    
    public function getJurusan() {
        return $this->db->get('jurusan')->result_array();
    }

    public function getPeriode() {
        return $this->db->get('periode')->result_array();
    }
    
    
    // Update Mahasiswa Data
    public function update_mahasiswa($id, $data) {
        return $this->db->where('id', $id)->update('mahasiswa', $data);
    }
    

    // Get PIN of Mahasiswa
    public function get_pin_mahasiswa($id) {
        return $this->db->select('pin')->get_where('mahasiswa', ['id' => $id])->row_array();
    }

    // Generate unique PIN (Optional)

    public function delete_mahasiswa($id) {
        return $this->db->where('id', $id)->delete('mahasiswa');
    }

    public function get_mahasiswa_by_status_regis($status_regis) {
        $this->db->select('mahasiswa.*, fakultas.nama_fakultas, jurusan.nama_jurusan, periode.nama_periode');
        $this->db->from('mahasiswa');
        $this->db->join('fakultas', 'fakultas.code_fakultas = mahasiswa.code_fakultas', 'left');
        $this->db->join('jurusan', 'jurusan.code_jurusan = mahasiswa.code_jurusan', 'left');
        $this->db->join('periode', 'periode.id = mahasiswa.id_periode', 'left'); // Tambahkan join ke periode
        $this->db->where('status_regis', $status_regis);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function generate_pin($id_mahasiswa) {
        // Update nilai 'pin' menjadi 1 untuk mahasiswa dengan ID tertentu
        $this->db->where('id', $id_mahasiswa);
        return $this->db->update('mahasiswa', ['pin' => 1]);
    }
        
    
    public function getJurusanByFakultas($code_fakultas) {
        return $this->db->get_where('jurusan', ['code_fakultas' => $code_fakultas])->result();
    }
}
