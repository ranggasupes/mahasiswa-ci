<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas_model extends CI_Model {

    public function get_all_fakultas()
    {
        return $this->db->get('fakultas')->result_array();
    }

    public function insert_fakultas($data)
    {
        if ($this->is_code_exists($data['code_fakultas'])) {
            return false; 
        }
        return $this->db->insert('fakultas', $data);
    }

    public function update_fakultas($code, $data)
    {
        $this->db->where('code_fakultas', $code);
        $result = $this->db->update('fakultas', $data);

        if (!$result) {
            log_message('error', 'Update Fakultas gagal: ' . $this->db->last_query());
        }

        return $result;
    }

    public function delete_fakultas($code)
    {
        $this->db->where('code_fakultas', $code);
        return $this->db->delete('fakultas');
    }

    public function is_code_exists($code)
    {
        $this->db->where('code_fakultas', $code);
        return $this->db->get('fakultas')->num_rows() > 0;
    }
}
?>
