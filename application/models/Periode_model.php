<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periode_model extends CI_Model {

    public function get_all_periode()
    {
        return $this->db->select('id, nama_periode, keterangan, status')->get('periode')->result_array();
    }

    public function get_periode_by_id($id)
    {
        return $this->db->get_where('periode', ['id' => $id])->row_array();
    }

    public function insert_periode($data)
    {
        return $this->db->insert('periode', $data);
    }

    public function update_periode($id, $data)
    {
        return $this->db->update('periode', $data, ['id' => $id]);
    }

    public function delete_periode($id)
    {
        return $this->db->delete('periode', ['id' => $id]);
    }

    public function deactivate_all()
    {
        $this->db->update('periode', ['status' => 0]); // Nonaktifkan semua periode
    }

    // ✅ Perbaikan: Mengubah 'Aktif' menjadi 1
    public function getPeriodeAktif()
    {
        return $this->db->select('id, nama_periode, keterangan')
                        ->where('status', 1) // Ambil yang statusnya 1 (aktif)
                        ->get('periode')
                        ->row_array(); // Mengambil satu periode aktif saja
    }
}
