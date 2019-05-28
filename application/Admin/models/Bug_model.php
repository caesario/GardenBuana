<?php

class Bug_model extends CI_Model
{
    public function tambahData()
    {
        $data = [
            "nama" => $this->input->post('nama_bug', true),
        ];

        $this->db->insert('bug', $data);
    }
}
