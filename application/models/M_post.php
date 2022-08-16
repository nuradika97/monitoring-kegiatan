<?php

class M_post extends CI_Model
{

    public function get_post_by_id($id)
    {
        $this->db->where('id_post', $id);
        return $this->db->get('post');
    }


    public function update_post($id, $data)
    {
        $this->db->where('id_post', $id);
        return $this->db->update('post', $data);
        // if ($this->db->affected_rows() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    }


    public function delete_post($id)
    {
        $this->db->where('id_post', $id);
        return $this->db->delete('post');
    }


    

}
