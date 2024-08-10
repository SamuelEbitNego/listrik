<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
     public function get_user_bills($user_id)
     {
          $this->db->where('user_id', $user_id);
          $query = $this->db->get('bills');
          return $query->result_array();
     }

     public function pay_bill($payment_data)
     {
          $this->db->where('id', $payment_data['bill_id']);
          $this->db->update('bills', array('status' => 'paid'));

          return $this->db->insert('payments', $payment_data);
     }

     public function delete_payments_by_bill($bill_id)
     {
          $this->db->where('bill_id', $bill_id);
          return $this->db->delete('payments');
     }

     public function delete_bill($bill_id)
     {
          $this->db->where('id', $bill_id);
          return $this->db->delete('bills');
     }

     public function get_bill_amount($bill_id)
     {
          $this->db->select('amount');
          $this->db->from('bills');
          $this->db->where('id', $bill_id);
          $query = $this->db->get();
          $result = $query->row_array();
          return $result ? $result['amount'] : 0;
     }

     public function get_bill($bill_id)
     {
          $this->db->where('id', $bill_id);
          $query = $this->db->get('bills');
          return $query->row_array();
     }
}
