<?php

class M_ucapan extends CI_Model
{

    public function get_ucapan_by_id($id)
    {
        $this->db->where('id_pesan', $id);
        return $this->db->get('ucapan');
    }



    public function delete_ucapan($id)
    {
        $this->db->where('id_pesan', $id);
        return $this->db->delete('ucapan');
    }


    

}
