<?php

class M_pegawai extends CI_Model
{


    public function get_pegawai_by_id($id)
    {
        $this->db->where('id_pegawai', $id);
        return $this->db->get('pegawai');
    }

    public function get_pegawai_all()
    {
        return $this->db->get('pegawai');
    }

    public function insert_pegawai($data,$table){
		$this->db->insert($table,$data);
	}

  	function edit_pegawai($where,$table){
		return $this->db->get_where($table,$where);
	}

    function update_pegawai($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

    public function delete_pegawai($where,$table)
    {
		$this->db->where($where);
		$this->db->delete($table);
	}		

    public function check_username($username_cek){
       $query = $this->db->get_where('pegawai', array('username' => $username_cek));
       if(empty($query->row_array())){
        return true;
       } else {
        return false;
       }
    }

}