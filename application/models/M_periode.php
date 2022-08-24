<?php

class M_periode extends CI_Model
{


    public function get_periode_by_id($id)
    {
        $this->db->where('id_periode', $id);
        return $this->db->get('periode');
    }

    public function get_periode_all()
    {
        return $this->db->get('periode');
    }

    public function insert_periode($data,$table){
		$this->db->insert($table,$data);
	}

  	function edit_periode($where,$table){
		return $this->db->get_where($table,$where);
	}

    function update_periode($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

    public function delete_periode($where,$table)
    {
		$this->db->where($where);
		$this->db->delete($table);
	}		

    public function check_username($username_cek){
       $query = $this->db->get_where('periode', array('username' => $username_cek));
       if(empty($query->row_array())){
        return true;
       } else {
        return false;
       }
    }
    // update waktu login
    function update_waktu_login($where, $stamp)
	{
		$this->db->update('periode', $stamp, $where);
    }


    function cek_knm_periode($where, $table)
	{
		return $this->db->get_where($where, $table);
    }

}