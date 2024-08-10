<?php
class Pembayaran_model extends CI_Model
{
     public function __construct()
     {
          parent::__construct();
          $this->load->database();
     }

     public function get_all_payments()
     {
          $this->db->select('p.*, b.bulan, b.tahun, pel.nama_pelanggan');
          $this->db->from('pembayaran p');
          $this->db->join('tagihan t', 'p.id_tagihan = t.id_tagihan');
          $this->db->join('pelanggan pel', 't.id_pelanggan = pel.id_pelanggan');
          $this->db->join('penggunaan b', 't.id_penggunaan = b.id_penggunaan');
          $query = $this->db->get();
          return $query->result_array();
     }

     public function delete_payment($id)
     {
          return $this->db->delete('pembayaran', array('id_pembayaran' => $id));
     }
}
