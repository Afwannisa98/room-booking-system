<?php
class Booking_model extends CI_Model
{
    public function get_all_bookings()
    {
        $this->db->select('bookings.*, users.username, room.name as room_name, status.name as status_name' );
        $this->db->from('bookings');
        $this->db->join('users', 'users.id = bookings.user_id');
        $this->db->join('room', 'room.id = bookings.room_id');
        $this->db->join('status', 'status.id = bookings.status_id');   //join table status
        return $this->db->get()->result();
    }

    // public function get_user_bookings($user_id)
    // {
    //     $this->db->where('user_id', $user_id);
    //     return $this->db->get('bookings')->result();
    // }

    public function get_user_bookings($user_id)
    {
    $this->db->select('bookings.*, room.name as room_name, status.name as status_name');
    $this->db->from('bookings');
    $this->db->join('room', 'room.id = bookings.room_id');
    $this->db->join('status', 'status.id = bookings.status_id');

    $this->db->where('bookings.user_id', $user_id);
    // $query = $this->db->get('bookings'); // adjust table name if needed
    // return $query->result(); // returns an array of objects
    return $this->db->get()->result();
    }

    //get all room
    public function get_all_rooms()
    {
        return $this->db->get('room')->result();
    }

    public function get_available_rooms()
    {
        $this->db->where('status', 1); // Only rooms with status = 1 (available)
        return $this->db->get('room')->result();
    }

    public function get_all_status()
    {
        return $this->db->get('status')->result();
    }

    
    public function update_booking($id, $data)
    {
        return $this->db->where('id', $id)->update('bookings', $data);
    }

    public function get_booking_by_id($id)
    {
        $this->db->select('bookings.*, room.name as room_name, status.name as status_name');
        $this->db->from('bookings');
        $this->db->join('room', 'room.id = bookings.room_id');
        $this->db->join('status', 'status.id = bookings.status_id');
        $this->db->where('bookings.id', $id);
        return $this->db->get()->row(); // returns a single object
    }

    public function delete_booking($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('bookings');
    }




    
}




