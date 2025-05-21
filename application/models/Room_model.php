<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room_model extends CI_Model {

    public function get_all_rooms() {
        $query = $this->db->get('room');
        return $query->result();
    }

    public function get_room_by_id($id)
    {
        $this->db->select('room.*');
        $this->db->from('room');
        $this->db->where('room.id', $id);
        return $this->db->get()->row(); // returns a single object
    }

    public function update_room($id, $data)
    {
        return $this->db->where('id', $id)->update('room', $data);
    }

    public function delete_room($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('room');
    }

    

}
