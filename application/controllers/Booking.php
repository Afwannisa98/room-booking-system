<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Booking_model');
        $this->load->helper(['url', 'form']);
        $this->load->library('session');

        if (!$this->session->userdata('username')) {
            redirect('auth/login');
        }
    }

    // public function view_bookings() {
    //     $data['username'] = $this->session->userdata('username');
    //     $data['role'] = $this->session->userdata('role');

    //     if ($data['role'] === 'admin') {
    //         $data['bookings'] = $this->Booking_model->get_all_bookings();
    //     } else {
    //         $data['bookings'] = $this->Booking_model->get_user_bookings($this->session->userdata('id'));
    //     }

    //     $this->load->view('view_bookings', $data);
    // }

    public function index()
{
    $this->load->model('Booking_model');

    $user_id = $this->session->userdata('user_id');
    $role = $this->session->userdata('role');
    $username = $this->session->userdata('username');
    

    if ($role == 1) {
        $bookings = $this->Booking_model->get_all_bookings();
    } else {
        $bookings = $this->Booking_model->get_user_bookings($user_id);
    }

    $data = [
        'username' => $username,
        'role' => $role,
        'bookings' => $bookings
    ];

    $this->load->view('dashboard_user', $data);
}

public function create()
{
    
    
    $this->load->library('form_validation');
    $this->load->model('Booking_model');
    $data['rooms'] = $this->Booking_model->get_available_rooms();

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('phone', 'Phone Number', 'required');
    $this->form_validation->set_rules('room_id', 'Room', 'required');
    // $this->form_validation->set_rules('booking_date', 'Booking Date', 'required');
    $this->form_validation->set_rules('start_date', 'Start Date', 'required');
    $this->form_validation->set_rules('end_date', 'End Date', 'required');
    // $this->form_validation->set_rules('time', 'Time', 'required');
    $this->form_validation->set_rules('start_time', 'Start Time', 'required');
    $this->form_validation->set_rules('end_time', 'End Time', 'required');
    $this->form_validation->set_rules('purpose', 'Purpose', 'required');
    $this->form_validation->set_rules('attendees', 'Number of Attendees', 'required|integer');
    // $this->form_validation->set_rules('status', 'Status', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('booking_form', $data);
    } else {
        $data = array(
            'user_id' => $this->session->userdata('user_id'), // assuming you store user id in session
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'room_id' => $this->input->post('room_id'),
            // 'room' => $this->input->post('room'),
            // 'booking_date' => $this->input->post('booking_date'),
            // 'time' => $this->input->post('time'),
            'start_date'  => $this->input->post('start_date'),
            'end_date'    => $this->input->post('end_date'),
            'start_time'  => $this->input->post('start_time'),
            'end_time'    => $this->input->post('end_time'),
            'purpose'     => $this->input->post('purpose'),
            'pax'         => $this->input->post('attendees'),
            // 'equipment'   => $this->input->post('equipment'),
            'notes'       => $this->input->post('notes'),
             'status_id'     => 1   //pending
            // 'status' => $this->input->post('status')
        );

        $this->db->insert('bookings', $data);
        redirect('booking/index'); // or redirect to bookings list
    }
}

public function edit($id)
{
    $data['role'] = $this->session->userdata('role');

    $this->load->model('Booking_model');

    $booking = $this->Booking_model->get_booking_by_id($id);
    if (!$booking) {
        show_404();
    }
    $data['is_admin'] = $this->session->userdata('role') == 1;

    // $data['is_admin'] = session()->get('role') == 1; 
    $data['booking'] = $booking;
    $data['rooms'] = $this->Booking_model->get_available_rooms();
    $data['statuss'] = $this->Booking_model->get_all_status();
    $this->load->view('edit_booking_form', $data);
}

// public function update($id)
// {
//     $this->load->library('form_validation');
//     $this->load->model('Booking_model');

//     $booking = $this->Booking_model->get_booking_by_id($id);
//     if (!$booking) {
//         show_404();
//     }

//     $data['rooms'] = $this->Booking_model->get_all_rooms();

//     $this->form_validation->set_rules('name', 'Name', 'required');
//     $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
//     $this->form_validation->set_rules('phone', 'Phone Number', 'required');
//     $this->form_validation->set_rules('room_id', 'Room', 'required');
//     $this->form_validation->set_rules('start_date', 'Start Date', 'required');
//     $this->form_validation->set_rules('end_date', 'End Date', 'required');
//     $this->form_validation->set_rules('start_time', 'Start Time', 'required');
//     $this->form_validation->set_rules('end_time', 'End Time', 'required');
//     $this->form_validation->set_rules('purpose', 'Purpose', 'required');
//     $this->form_validation->set_rules('attendees', 'Number of Attendees', 'required|integer');

//     if ($this->form_validation->run() == FALSE) {
//         $data['booking'] = $booking;
//         $this->load->view('edit_booking_form', $data);
//     } else {
//         $updateData = [
//             'name' => $this->input->post('name'),
//             'email' => $this->input->post('email'),
//             'phone' => $this->input->post('phone'),
//             'room_id' => $this->input->post('room_id'),
//             'start_date'  => $this->input->post('start_date'),
//             'end_date'    => $this->input->post('end_date'),
//             'start_time'  => $this->input->post('start_time'),
//             'end_time'    => $this->input->post('end_time'),
//             'purpose'     => $this->input->post('purpose'),
//             'pax'         => $this->input->post('attendees'),
//             'notes'       => $this->input->post('notes'),
//             'status_id'       => $this->input->post('status_id')
//         ];

//         $this->Booking_model->update_booking($id, $updateData);
//         redirect('booking/index');
//     }
// }

public function update($id)
{
    $this->load->library('form_validation');
    $this->load->model('Booking_model');

    $booking = $this->Booking_model->get_booking_by_id($id);
    if (!$booking) {
        show_404();
    }

    // Set validation rules
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('phone', 'Phone Number', 'required');
    $this->form_validation->set_rules('room_id', 'Room', 'required');
    $this->form_validation->set_rules('start_date', 'Start Date', 'required');
    $this->form_validation->set_rules('end_date', 'End Date', 'required');
    $this->form_validation->set_rules('start_time', 'Start Time', 'required');
    $this->form_validation->set_rules('end_time', 'End Time', 'required');
    $this->form_validation->set_rules('purpose', 'Purpose', 'required');
    $this->form_validation->set_rules('attendees', 'Number of Attendees', 'required|integer');

    $is_admin = $this->session->userdata('role') == 1;

    if ($this->form_validation->run() == TRUE) {
        // Prepare update data
        $updateData = [
            'name'        => $this->input->post('name'),
            'email'       => $this->input->post('email'),
            'phone'       => $this->input->post('phone'),
            'room_id'     => $this->input->post('room_id'),
            'start_date'  => $this->input->post('start_date'),
            'end_date'    => $this->input->post('end_date'),
            'start_time'  => $this->input->post('start_time'),
            'end_time'    => $this->input->post('end_time'),
            'purpose'     => $this->input->post('purpose'),
            'pax'         => $this->input->post('attendees'),
            'notes'       => $this->input->post('notes'),
        ];

        // If admin, allow status update
        if ($is_admin) {
            $updateData['status_id'] = $this->input->post('status_id');
            $updateData['comment'] = $this->input->post('comment');
        } else {
            $updateData['status_id'] = $booking->status_id;
        }

        // Update in DB
        $this->Booking_model->update_booking($id, $updateData);

        // Redirect after success
        redirect('booking/index');
    } else {
        // Validation failed: reload the form
        $data['booking']   = $booking;
        $data['rooms']     = $this->Booking_model->get_available_rooms();
        $data['statuss']   = $this->Booking_model->get_all_status();
        $data['is_admin']  = $is_admin;

        $this->load->view('edit_booking_form', $data);
    }
}


public function delete($id)
{
    $this->load->model('Booking_model');

    $booking = $this->Booking_model->get_booking_by_id($id);
    if (!$booking) {
        show_404(); // Booking not found
    }

    // Only allow deletion if the booking is not approved (status_id = 4) or rejected (status_id = 3)
    if ($booking->status_id == 3 || $booking->status_id == 4) {
        $this->session->set_flashdata('error', 'You cannot cancel a booking that is already approved or rejected.');
        redirect('booking/index');
        return;
    }

    $this->Booking_model->delete_booking($id);
    $this->session->set_flashdata('success', 'Booking has been successfully cancelled.');
    redirect('booking/index');
}




}
