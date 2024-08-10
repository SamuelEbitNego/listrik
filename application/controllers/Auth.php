<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->load->model('Auth_model');
          $this->load->library('form_validation');
          $this->load->library('session');
     }

     public function login()
     {
          $data['title'] = 'Login';

          if ($this->input->post()) {
               $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
               $this->form_validation->set_rules('password', 'Password', 'required');

               if ($this->form_validation->run() === TRUE) {
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');

                    $user = $this->Auth_model->get_user_by_email($email);

                    if ($user && password_verify($password, $user['password'])) {
                         $this->session->set_userdata('user_id', $user['id']);
                         $this->session->set_userdata('username', $user['username']);
                         $this->session->set_userdata('role', $user['role']);
                         $this->session->set_flashdata('success', 'Login successful.');

                         if ($user['role'] == 'admin') {
                              redirect('admin/dashboard');
                         } else {
                              redirect('user/dashboard');
                         }
                    } else {
                         $this->session->set_flashdata('error', 'Invalid email or password.');
                    }
               }
          }

          $this->load->view('templates/auth_header', $data);
          $this->load->view('auth/login', $data);
          $this->load->view('templates/auth_footer');
     }

     public function logout()
     {
          $this->session->sess_destroy();
          $this->session->set_flashdata('success', 'You have been logged out.');
          redirect('auth/login');
     }

     public function register()
     {
          $data['title'] = 'Register';

          if ($this->input->post()) {
               $this->form_validation->set_rules('username', 'Username', 'required');
               $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
               $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
               $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

               if ($this->form_validation->run() === TRUE) {
                    $user_data = array(
                         'username' => $this->input->post('username'),
                         'email' => $this->input->post('email'),
                         'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                         'role' => 'user'
                    );

                    if ($this->Auth_model->register($user_data)) {
                         $this->session->set_flashdata('success', 'Registration successful. You can now login.');
                         redirect('auth/login');
                    } else {
                         $this->session->set_flashdata('error', 'Registration failed. Please try again.');
                    }
               }
          }

          $this->load->view('templates/auth_header', $data);
          $this->load->view('auth/register', $data);
          $this->load->view('templates/auth_footer');
     }
}
