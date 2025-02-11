<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function getJurusanByFakultas($code_fakultas)
    {
        return $this->db->get_where('jurusan', ['code_fakultas' => $code_fakultas])->result_array();
    }
    
    public function get_all_jurusan()
    {
        return $this->db->join('fakultas', 'fakultas.code_fakultas = jurusan.code_fakultas')
                        ->get('jurusan')->result_array();
    }

    public function get_jurusan_by_code($code_jurusan) {
        return $this->db->where('code_jurusan', $code_jurusan)->get('jurusan')->row_array();
    }
    

    public function is_code_jurusan_exist($code_jurusan)
    {
        return $this->db->get_where('jurusan', ['code_jurusan' => $code_jurusan])->num_rows() > 0;
    }

    public function insert_jurusan($data)
    {
        $this->db->insert('jurusan', $data);
    }

    public function update_jurusan($id, $data)
    {
        $this->db->update('jurusan', $data, ['code_jurusan' => $id]);
    }

    public function delete_jurusan($id)
    {
        $this->db->delete('jurusan', ['code_jurusan' => $id]);
    }
}
