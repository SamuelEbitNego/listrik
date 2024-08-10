<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Complaint_model extends CI_Model
{
     public function __construct()
     {
          parent::__construct();
     }

     public function submit_complaint($data)
     {
          return $this->db->insert('complaints', $data);
     }

     public function get_complaints_by_user($user_id)
     {
          return $this->db->get_where('complaints', ['user_id' => $user_id])->result_array();
     }

     public function get_all_complaints()
     {
          return $this->db->get('complaints')->result_array();
     }

     public function get_complaint($id)
     {
          return $this->db->get_where('complaints', ['id' => $id])->row_array();
     }

     public function update_complaint($id, $data)
     {
          return $this->db->update('complaints', $data, ['id' => $id]);
     }

     public function delete_complaint($id)
     {
          $this->db->where('id', $id);
          return $this->db->delete('complaints');
     }
}
