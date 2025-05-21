<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Room_model');
    }

    public function index() {
        $this->load->model('Room_model');
        $user_id = $this->session->userdata('user_id');
        $role = $this->session->userdata('role');
        $username = $this->session->userdata('username');

        $data = [
        'username' => $username,
        'role' => $role
    ];

        $data['rooms'] = $this->Room_model->get_all_rooms();
        $this->load->view('room_listing', $data);
    }

    public function create()
    {
        $this->load->library('form_validation');
        $this->load->model('Room_model');

        $this->form_validation->set_rules('name', 'Name / Room Type', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('capacity', 'Room Capacity', 'required|integer');
        $this->form_validation->set_rules('facilities', 'Facilities', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[0,1,2]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('room_create');
        } else {
            $data = array(
                'name'       => $this->input->post('name'),
                'location'   => $this->input->post('location'),
                'capacity'   => $this->input->post('capacity'),
                'facilities' => $this->input->post('facilities'),
                'status'     => $this->input->post('status'),
                'created_at'  => date('Y-m-d H:i:s') //current timestamp
            );

            $this->db->insert('room', $data);
            redirect('room/index');
        }
    }

    // public function edit($id)
    // {

    // $room = $this->Room_model->get_room_by_id($id);
    // if (!$room) {
    //     show_404();
    // }
  
    // $data['room'] = $room;
    // $this->load->view('room_edit', $data);
    // }

    public function edit($id = null)
{
    if ($id === null) {
        show_404(); // Gracefully handle if no ID is passed
    }

    $room = $this->Room_model->get_room_by_id($id);
    if (!$room) {
        show_404();
    }

    $data['room'] = $room;
    $this->load->view('room_edit', $data);
}


    public function update($id)
    {
        $this->load->library('form_validation');

        $room = $this->Room_model->get_room_by_id($id);
        if (!$room) {
            show_404();
        }

        // Set validation rules
         $this->form_validation->set_rules('name', 'Name / Room Type', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('capacity', 'Room Capacity', 'required|integer');
        $this->form_validation->set_rules('facilities', 'Facilities', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[0,1,2]');


        if ($this->form_validation->run() == TRUE) {
            // Prepare update data
            $updateData = [
                'name'       => $this->input->post('name'),
                'location'   => $this->input->post('location'),
                'capacity'   => $this->input->post('capacity'),
                'facilities' => $this->input->post('facilities'),
                'status'     => $this->input->post('status'),
                'updated_at'  => date('Y-m-d H:i:s') //current timestamp
            ];

            // Update in DB
            $this->Room_model->update_room($id, $updateData);

            // Redirect after success
            redirect('room/index');
        } else {
            // Validation failed: reload the form
            $data['room']   = $room;

            $this->load->view('room_edit', $data);
        }
    }

    public function delete($id)
    {
        // $this->load->model('Room_model');

        $room = $this->Room_model->get_room_by_id($id);
        if (!$room) {
            show_404(); // Room not found
        }

        $this->Room_model->delete_room($id);
        $this->session->set_flashdata('success', 'Room has been successfully deleted.');
        redirect('room/index');
    }



}
