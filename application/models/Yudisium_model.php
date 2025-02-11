<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yudisium_model extends CI_Model {

    // Mendapatkan semua data mahasiswa yudisium
    public function get_all_yudisium() {
        return $this->db->get('mahasiswa')->result_array();
    }

    // Menambahkan mahasiswa yang akan mengikuti yudisium
    public function insert_yudisium($data) {
        return $this->db->insert('mahasiswa', $data);
    }

    // Mengambil data mahasiswa yang belum memiliki PIN
    public function get_mahasiswa_pin() {
        $query = $this->db->where(['status_regis' => 'yudisium', 'pin' => 1])->get('mahasiswa');
        log_message('debug', 'Query get_mahasiswa_pin: ' . $this->db->last_query());
        return $query->result_array();
    }
    
    public function get_mahasiswa_nonpin() {
        $query = $this->db->where(['status_regis' => 'yudisium'])
                          ->where("(pin = 0 OR pin IS NULL OR pin = '')", NULL, FALSE)
                          ->get('mahasiswa');
        log_message('debug', 'Query get_mahasiswa_nonpin: ' . $this->db->last_query());
        return $query->result_array();
    }
    

    // Mengupdate data mahasiswa agar memiliki PIN
    public function update_pin($id, $pin) {
        return $this->db->where('id', $id)->update('mahasiswa', ['pin' => $pin]);
    }
    

    // Mengambil data mahasiswa yang sudah memiliki PIN
    // Mendapatkan status PIN mahasiswa berdasarkan ID
public function get_pin_status($id) {
    return $this->db->where('id', $id)->get('mahasiswa')->row()->pin;
}

public function get_total_yudisium_pin() {
    $this->db->where("pin = 1");
    return $this->db->count_all_results('mahasiswa');
}

public function get_total_yudisium_nonpin() {
    $this->db->where("pin = 0 OR pin IS NULL OR pin = ''");
    return $this->db->count_all_results('mahasiswa');
}


}
