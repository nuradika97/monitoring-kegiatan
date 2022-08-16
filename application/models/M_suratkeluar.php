<?php

class M_suratkeluar extends CI_Model
{

    public function get_sk_by_id($id)
    {
        $this->db->where('id_sk', $id);
        return $this->db->get('surat_keluar');
    }


    public function update_sk($id, $data)
    {
        $this->db->where('id_sk', $id);
        return $this->db->update('surat_keluar', $data);
        // if ($this->db->affected_rows() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    }


    public function delete_sk($id)
    {
        $this->db->where('id_sk', $id);
        return $this->db->delete('surat_keluar');
    }


    

}
