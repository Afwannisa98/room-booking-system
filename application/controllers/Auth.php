<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function login() {
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->Auth_model->get_user_by_username($username);

            if ($user && password_verify($password, $user['password'])) {
                // $this->session->set_userdata('username', $user['username']);
                // $this->session->set_userdata('role', $user['role']);

                 $this->session->set_userdata([
                'user_id'  => $user['id'],
                'username' => $user['username'],
                'role'     => $user['role']
            ]);

                // Redirect based on role
                if ($user['role'] == 1) {
                    redirect('auth/dashboard_admin');
                } elseif ($user['role'] == 2) {
                    redirect('auth/dashboard_user');
                } else {
                    redirect('home');
                }

            } else {
                $this->session->set_flashdata('login_error', 'Invalid username or password!');
                $_SESSION['show_login_modal'] = true;  //show modal after redirect
                redirect('home'); // back to home/index
            }
        }
    }

    //sign in new user

    public function register() {
    $this->load->model('Auth_model');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('signup_error', validation_errors());
        $_SESSION['show_signup_modal'] = true;
        redirect('home');
    } else {
        $data = [
            'username' => $this->input->post('username'),
            'email'    => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role'     => 2 // default role: user
        ];

        $this->Auth_model->insert_user($data);

        $this->session->set_flashdata('signup_success', 'Registration successful. You can now log in.');
        $_SESSION['show_login_modal'] = true;
        redirect('home');
    }
}


    public function dashboard_admin() {
        if (!$this->session->userdata('username') || $this->session->userdata('role') != 1) {
            redirect('auth/login');
        }
        
        $this->load->model('Booking_model'); 
        $user_id = $this->session->userdata('user_id');
        $data['bookings'] = $this->Booking_model->get_all_bookings();
        
        // $bookings = $this->Booking_model->get_all_bookings($user_id);

        $data['username'] = $this->session->userdata('username');
        $data['role'] = 1;
        $data['user_id'] = $this->session->userdata('user_id');
        $this->load->view('dashboard', $data); // Load dashboard.php view
    }

    // public function dashboard_user() {
    //     if (!$this->session->userdata('username') || $this->session->userdata('role') !== 'user') {
    //         redirect('auth/login');
    //     }

    //     $data['username'] = $this->session->userdata('username');
    //     $data['role'] = 'user';
    //     $data['user_id'] = $this->session->userdata('user_id');
    //     $this->load->view('dashboard_user', $data); // Load dashboard_user.php view
    // }

    public function dashboard_user() {
    if (!$this->session->userdata('username') || $this->session->userdata('role') !=2) {
        redirect('auth/login');
    }

    $this->load->model('Booking_model'); // load the model

    $user_id = $this->session->userdata('user_id');

    // fetch bookings for the logged in user
    $bookings = $this->Booking_model->get_user_bookings($user_id);

    $data['username'] = $this->session->userdata('username');
    $data['role'] = 2;
    $data['user_id'] = $user_id;
    $data['bookings'] = $bookings; // pass bookings to the view

    $this->load->view('dashboard_user', $data); // Load dashboard_user.php view
}


    public function logout() {
        $this->session->sess_destroy();
        redirect('home'); // Go to home_view
    }
}

