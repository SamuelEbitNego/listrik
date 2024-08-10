<?php
class Admin_model extends CI_Model
{

     // Mengambil daftar pengguna
     public function get_users()
     {
          $query = $this->db->get('users');
          return $query->result_array();
     }

     public function get_payment_by_id($id)
     {
          $this->db->where('id', $id);
          return $this->db->get('payments')->row_array();
     }

     public function update_payment($id, $data)
     {
          $this->db->where('id', $id);
          return $this->db->update('payments', $data);
     }

     // Mengambil daftar tagihan
     public function get_bills()
     {
          $this->db->select('bills.*, users.username');
          $this->db->from('bills');
          $this->db->join('users', 'bills.user_id = users.id');
          $query = $this->db->get();
          return $query->result_array();
     }

     // Menambahkan tagihan baru
     public function add_bill($bill_data)
     {
          return $this->db->insert('bills', $bill_data);
     }

     // Menghapus tagihan
     public function delete_bill($bill_id)
     {
          $this->db->where('id', $bill_id);
          return $this->db->delete('bills');
     }

     // Mengambil detail pengguna berdasarkan ID
     public function get_user_by_id($user_id)
     {
          $this->db->where('id', $user_id);
          $query = $this->db->get('users');
          return $query->row_array();
     }

     // Memperbarui status tagihan
     public function update_bill_status($bill_id, $status)
     {
          $this->db->where('id', $bill_id);
          return $this->db->update('bills', array('status' => $status));
     }

     public function count_users()
     {
          return $this->db->count_all('users');
     }

     public function count_bills()
     {
          return $this->db->count_all('bills');
     }

     public function count_unpaid_bills()
     {
          $this->db->where('status', 'unpaid');
          return $this->db->count_all_results('bills');
     }

     public function count_overdue_bills()
     {
          $this->db->where('status', 'unpaid');
          $this->db->where('due_date <', date('Y-m-d'));
          return $this->db->count_all_results('bills');
     }

     public function get_recent_bills()
     {
          $this->db->select('bills.*, users.username');
          $this->db->from('bills');
          $this->db->join('users', 'bills.user_id = users.id');
          $this->db->order_by('bills.id', 'DESC');
          $this->db->limit(5);
          $query = $this->db->get();
          return $query->result_array();
     }

     public function add_user($user_data)
     {
          return $this->db->insert('users', $user_data);
     }

     public function update_user($user_id, $user_data)
     {
          $this->db->where('id', $user_id);
          return $this->db->update('users', $user_data);
     }

     public function delete_user($user_id)
     {
          $this->db->where('id', $user_id);
          return $this->db->delete('users');
     }

     public function delete_payments_by_bill($bill_id)
     {
          $this->db->where('bill_id', $bill_id);
          return $this->db->delete('payments');
     }

     public function get_all_payment($payment_data)
     {
          $this->db->where('id', $payment_data['bill_id']);
          $this->db->update('bills', array('status' => 'paid'));

          return $this->db->insert('payments', $payment_data);
     }

     public function get_all_payments()
     {
          $this->db->select('payments.id, payments.bill_id, payments.amount, payments.payment_method, payments.payment_date, users.username');
          $this->db->from('payments');
          $this->db->join('bills', 'payments.bill_id = bills.id', 'left');
          $this->db->join('users', 'bills.user_id = users.id', 'left');
          $this->db->order_by('payments.payment_date', 'DESC');

          return $this->db->get()->result_array();
     }

     public function get_bill($bill_id)
     {
          $this->db->where('id', $bill_id);
          return $this->db->get('tagihan')->row_array();
     }

     // Method to insert payment data
     public function pay_bill($payment_data)
     {
          return $this->db->insert('pembayaran', $payment_data);
     }
}
