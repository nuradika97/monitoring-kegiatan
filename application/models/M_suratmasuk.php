<?php

class M_suratmasuk extends CI_Model
{

    public function get_sm_by_id($id)
    {
        $this->db->where('id_sm', $id);
        return $this->db->get('surat_masuk');
    }


    public function update_sm($id, $data)
    {
        $this->db->where('id_sm', $id);
        return $this->db->update('surat_masuk', $data);
        // if ($this->db->affected_rows() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    }


    public function delete_sm($id)
    {
        $this->db->where('id_sm', $id);
        return $this->db->delete('surat_masuk');
    }


    

}
