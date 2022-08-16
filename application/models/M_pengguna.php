<?php

class M_pengguna extends CI_Model
{


    public function get_pengguna_by_id($id)
    {
        $this->db->where('id_pegawai', $id);
        return $this->db->get('pegawai');
    }

    public function update_pengguna($id, $data)
    {
        $this->db->where('id_pegawai', $id);
        return $this->db->update('pegawai', $data);
        // if ($this->db->affected_rows() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    }

    public function update_akun($id, $data)
    {
        $this->db->where('id_pegawai', $id);
        return $this->db->update('pegawai', $data);
        // if ($this->db->affected_rows() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    }

    public function delete_pengguna($id)
    {
        $this->db->where('id_pegawai', $id);
        return $this->db->delete('pegawai');
    }

}