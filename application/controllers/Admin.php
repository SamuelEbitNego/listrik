<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          $this->load->model('Admin_model');
          $this->load->model('User_model');
          $this->load->library('session');

          // Cek apakah pengguna telah login dan merupakan admin
          if (!$this->session->userdata('user_id') || $this->session->userdata('role') != 'admin') {
               redirect('auth/login');
          }
     }

     public function manage_payments()
     {
          $data['title'] = 'Manage Payments';
          $data['payments'] = $this->Admin_model->get_all_payments();

          $this->load->view('templates/admin_header', $data);
          $this->load->view('templates/admin_sidebar');
          $this->load->view('admin/manage_payments', $data);
          $this->load->view('templates/footer');
     }

     public function delete_payment($id)
     {
          if ($this->Pembayaran_model->delete_payment($id)) {
               $this->session->set_flashdata('success', 'Payment deleted successfully');
          } else {
               $this->session->set_flashdata('error', 'Failed to delete payment');
          }
          redirect('admin/manage_payments');
     }


     public function dashboard()
     {
          $data['title'] = 'Admin Dashboard';
          $data['total_users'] = $this->Admin_model->count_users();
          $data['total_bills'] = $this->Admin_model->count_bills();
          $data['unpaid_bills'] = $this->Admin_model->count_unpaid_bills();
          $data['overdue_bills'] = $this->Admin_model->count_overdue_bills();
          $data['recent_bills'] = $this->Admin_model->get_recent_bills();

          $this->load->view('templates/admin_header', $data);
          $this->load->view('templates/admin_sidebar');
          $this->load->view('admin/dashboard');
          $this->load->view('templates/admin_footer');
     }

     public function users()
     {
          $data['title'] = 'Manage Users';
          $data['users'] = $this->Admin_model->get_users();
          $this->load->view('templates/admin_header', $data);
          $this->load->view('templates/admin_sidebar');
          $this->load->view('admin/users', $data);
          $this->load->view('templates/admin_footer');
     }

     public function bills()
     {
          $data['title'] = 'Manage Bills';
          $data['bills'] = $this->Admin_model->get_bills();
          $this->load->view('templates/admin_header', $data);
          $this->load->view('templates/admin_sidebar');
          $this->load->view('admin/bills', $data);
          $this->load->view('templates/admin_footer');
     }

     public function add_bill()
     {
          if ($this->input->post()) {
               $this->form_validation->set_rules('user_id', 'User', 'required');
               $this->form_validation->set_rules('amount', 'Amount', 'required');
               $this->form_validation->set_rules('due_date', 'Due Date', 'required');

               if ($this->form_validation->run() === TRUE) {
                    $bill_data = array(
                         'user_id' => $this->input->post('user_id'),
                         'amount' => $this->input->post('amount'),
                         'due_date' => $this->input->post('due_date'),
                         'status' => 'Unpaid'
                    );
                    $this->Admin_model->add_bill($bill_data);
                    $this->session->set_flashdata('success', 'Bill berhasil ditambahkan');
                    redirect('admin/bills');
               }
          }

          $data['title'] = 'Add Bill';
          $data['users'] = $this->Admin_model->get_users();
          $this->load->view('templates/admin_header', $data);
          $this->load->view('templates/admin_sidebar');
          $this->load->view('admin/add_bill', $data);
          $this->load->view('templates/admin_footer');
     }

     public function delete_bill($bill_id)
     {
          $this->load->model('Admin_model');

          $this->Admin_model->delete_payments_by_bill($bill_id);

          if ($this->Admin_model->delete_bill($bill_id)) {
               $this->session->set_flashdata('success', 'Bill deleted successfully');
          } else {
               $this->session->set_flashdata('error', 'Failed to delete bill');
          }

          redirect('admin/bills');
     }


     public function add_user()
     {
          $data['title'] = 'Add New User';

          if ($this->input->post()) {
               $this->form_validation->set_rules('username', 'Username', 'required');
               $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
               $this->form_validation->set_rules('password', 'Password', 'required');
               $this->form_validation->set_rules('role', 'Role', 'required');

               if ($this->form_validation->run() === TRUE) {
                    $user_data = array(
                         'username' => $this->input->post('username'),
                         'email' => $this->input->post('email'),
                         'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                         'role' => $this->input->post('role')
                    );

                    if ($this->Admin_model->add_user($user_data)) {
                         $this->session->set_flashdata('success', 'Menambahkan user sukses');
                         redirect('admin/users');
                    } else {
                         $this->session->set_flashdata('error', 'Gagal menambahkan user');
                    }
               }
          }

          $this->load->view('templates/admin_header', $data);
          $this->load->view('templates/admin_sidebar');
          $this->load->view('admin/add_user', $data);
          $this->load->view('templates/admin_footer');
     }

     public function edit_user($user_id)
     {
          $data['title'] = 'Edit User';
          $data['user'] = $this->Admin_model->get_user_by_id($user_id);

          if ($this->input->post()) {
               $this->form_validation->set_rules('username', 'Username', 'required');
               $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
               $this->form_validation->set_rules('role', 'Role', 'required');

               if ($this->form_validation->run() === TRUE) {
                    $user_data = array(
                         'username' => $this->input->post('username'),
                         'email' => $this->input->post('email'),
                         'role' => $this->input->post('role')
                    );

                    if ($this->Admin_model->update_user($user_id, $user_data)) {
                         $this->session->set_flashdata('success', 'User update sukses');
                         redirect('admin/users');
                    } else {
                         $this->session->set_flashdata('error', 'Gagal update user');
                    }
               }
          }

          $this->load->view('templates/admin_header', $data);
          $this->load->view('templates/admin_sidebar');
          $this->load->view('admin/edit_user', $data);
          $this->load->view('templates/admin_footer');
     }

     // Delete User Method
     public function delete_user($user_id)
     {
          if ($this->Admin_model->delete_user($user_id)) {
               $this->session->set_flashdata('success', 'User berhasil terhapus');
          } else {
               $this->session->set_flashdata('error', 'User gagal terhapus');
          }
          redirect('admin/users');
     }

     public function complaints()
     {
          $data['title'] = 'Manage Complaints';
          $data['complaints'] = $this->Complaint_model->get_all_complaints();

          $this->load->view('templates/admin_header', $data);
          $this->load->view('templates/admin_sidebar');
          $this->load->view('admin/complaints', $data);
          $this->load->view('templates/admin_footer');
     }

     public function respond_complaint($id)
     {
          $data['title'] = 'Respond to Complaint';
          $data['complaint'] = $this->Complaint_model->get_complaint($id);

          if ($this->input->post()) {
               $response_data = [
                    'response' => $this->input->post('response'),
                    'status' => 'resolved'
               ];

               if ($this->Complaint_model->update_complaint($id, $response_data)) {
                    $this->session->set_flashdata('success', 'Response submitted successfully.');
               } else {
                    $this->session->set_flashdata('error', 'Failed to submit response.');
               }

               redirect('admin/complaints');
          }

          $this->load->view('templates/admin_header', $data);
          $this->load->view('templates/admin_sidebar');
          $this->load->view('admin/respond_complaint', $data);
          $this->load->view('templates/admin_footer');
     }

     public function delete_complaint($id)
     {
          // Load the model
          $this->load->model('Complaint_model');

          // Delete the complaint
          if ($this->Complaint_model->delete_complaint($id)) {
               $this->session->set_flashdata('success', 'Complaint deleted successfully');
          } else {
               $this->session->set_flashdata('error', 'Failed to delete complaint');
          }

          redirect('admin/complaints');
     }

     public function edit_payment($id)
     {
          // Load the model
          $this->load->model('Admin_model');

          // Get payment data
          $data['payment'] = $this->Admin_model->get_payment_by_id($id);

          // Check if data exists
          if (!$data['payment']) {
               show_404();
          }

          // Load views
          $data['title'] = 'Edit Payment';
          $this->load->view('templates/header', $data);
          $this->load->view('admin/edit_payment', $data);
          $this->load->view('templates/footer');
     }

     public function update_payment()
     {
          // Load the model
          $this->load->model('Admin_model');

          // Get post data
          $id = $this->input->post('id');
          $payment_data = array(
               'amount' => $this->input->post('amount'),
               'payment_method' => $this->input->post('payment_method'),
               'payment_date' => $this->input->post('payment_date')
          );

          // Update the payment
          if ($this->Admin_model->update_payment($id, $payment_data)) {
               $this->session->set_flashdata('success', 'Payment updated successfully');
          } else {
               $this->session->set_flashdata('error', 'Failed to update payment');
          }

          redirect('admin/manage_payments');
     }
}
