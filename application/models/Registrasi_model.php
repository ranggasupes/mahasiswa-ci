<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi_model extends CI_Model {

    // Get Mahasiswa with PIN and status_regis = 0
    public function get_mahasiswa_pin() {
        $this->db->where('pin !=', 0);  // Menampilkan hanya mahasiswa yang punya PIN
        $this->db->where('status_regis', 0);  // Hanya mahasiswa yang belum registrasi
        $query = $this->db->get('mahasiswa');
        return $query->result_array();
    }

    // Get Mahasiswa by ID
    public function get_mahasiswa_by_id($id) {
        return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
    }

    // Update Mahasiswa Data
    public function update_mahasiswa($id, $data) {
        return $this->db->where('id', $id)->update('mahasiswa', $data);
    }
}
