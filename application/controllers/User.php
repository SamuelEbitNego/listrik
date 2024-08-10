<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->model('User_model');

          // Check if user is logged in and is a user
          if ($this->session->userdata('role') != 'user') {
               redirect('auth/login');
          }
     }

     public function dashboard()
     {
          $data['title'] = 'User Dashboard';
          $data['bills'] = $this->User_model->get_user_bills($this->session->userdata('user_id'));
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar');
          $this->load->view('user/dashboard', $data);
          $this->load->view('templates/footer');
     }

     public function pay_bill()
     {
          $bill = $this->User_model->get_bill($bill_id);

          if ($bill && $bill['status'] == 'unpaid') {
               $data['title'] = 'Pay Bill';
               $data['bill'] = $bill;

               if ($this->input->post()) {
                    // Logic for processing payment
                    $payment_data = array(
                         'bill_id' => $bill_id,
                         'amount' => $bill['amount'],
                         'payment_method' => $this->input->post('payment_method'),
                         'payment_date' => date('Y-m-d H:i:s')
                    );

                    if ($this->User_model->pay_bill($payment_data)) {
                         $this->session->set_flashdata('success', 'Bill paid successfully');
                         redirect('user/dashboard');
                    } else {
                         $data['error'] = 'Failed to process payment';
                    }
               }

               $this->load->view('user/dashboard', $data);
               $this->load->view('templates/header', $data);
               $this->load->view('templates/sidebar');
               $this->load->view('user/pay_bill', $data);
               $this->load->view('templates/footer');
          } else {
               $this->session->set_flashdata('error', 'Invalid bill or bill already paid');
               redirect('user/dashboard');
          }
     }



     public function delete_bill($bill_id)
     {
          // Load the model
          $this->load->model('User_model');

          // Delete payments related to the bill
          $this->User_model->delete_payments_by_bill($bill_id);

          // Now delete the bill
          if ($this->User_model->delete_bill($bill_id)) {
               $this->session->set_flashdata('success', 'Bill deleted successfully');
          } else {
               $this->session->set_flashdata('error', 'Failed to delete bill');
          }

          redirect('user/dashboard');
     }

     public function submit_complaint()
     {
          $data['title'] = 'Submit Complaint';

          if ($this->input->post()) {
               $complaint_data = [
                    'user_id' => $this->session->userdata('user_id'),
                    'complaint' => $this->input->post('complaint')
               ];

               if ($this->Complaint_model->submit_complaint($complaint_data)) {
                    $this->session->set_flashdata('success', 'Complaint submitted successfully.');
               } else {
                    $this->session->set_flashdata('error', 'Failed to submit complaint.');
               }

               redirect('user/complaints');
          }

          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar');
          $this->load->view('user/submit_complaint', $data);
          $this->load->view('templates/footer');
     }

     public function complaints()
     {
          $data['title'] = 'My Complaints';
          $data['complaints'] = $this->Complaint_model->get_complaints_by_user($this->session->userdata('user_id'));

          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar');
          $this->load->view('user/complaints', $data);
          $this->load->view('templates/footer');
     }

     public function process_payment()
     {
          $bill_id = $this->input->post('bill_id');
          $payment_method = $this->input->post('payment_method');

          // Logic to handle different payment methods can be implemented here.
          // For simplicity, we'll just update the bill status to 'paid'.

          $payment_data = array(
               'bill_id' => $bill_id,
               'amount' => $this->User_model->get_bill_amount($bill_id), // Assuming get_bill_amount method exists
               'payment_method' => $payment_method,
               'payment_date' => date('Y-m-d H:i:s')
          );

          if ($this->User_model->pay_bill($payment_data)) {
               $this->session->set_flashdata('success', 'Bill paid successfully');
               redirect('user/dashboard');
          } else {
               $this->session->set_flashdata('error', 'Failed to process payment');
               redirect('user/pay_bill/' . $bill_id);
          }
     }
}
