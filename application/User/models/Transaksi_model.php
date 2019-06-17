<?php

class Transaksi_model extends CI_Model
{
    public function createPesanan($data)
    {
        if ($data) {
            $insert = $this->db->insert('trx_pesanan', $data);
            return ($insert == TRUE) ? TRUE : FALSE;
        }
    }
}
