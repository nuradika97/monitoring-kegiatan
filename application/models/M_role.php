<?php

class M_role extends CI_Model
{


    public function get_role_by_id($id)
    {
        $this->db->where('id_role', $id);
        return $this->db->get('role');
    }

    public function get_role_all()
    {
        return $this->db->get('role');
    }

    public function insert_role($data,$table){
		$this->db->insert($table,$data);
	}

  	function edit_role($where,$table){
		return $this->db->get_where($table,$where);
	}

    function update_role($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

    public function delete_role($where,$table)
    {
		$this->db->where($where);
		$this->db->delete($table);
	}		

    public function check_username($username_cek){
       $query = $this->db->get_where('role', array('username' => $username_cek));
       if(empty($query->row_array())){
        return true;
       } else {
        return false;
       }
    }
    // update waktu login
    function update_waktu_login($where, $stamp)
	{
		$this->db->update('role', $stamp, $where);
    }


    function cek_knm_role($where, $table)
	{
		return $this->db->get_where($where, $table);
    }

}