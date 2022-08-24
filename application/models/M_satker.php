<?php

class M_satker extends CI_Model
{


    public function get_satker_by_id($id)
    {
        $this->db->where('id_satker', $id);
        return $this->db->get('satker');
    }

    public function get_satker_all()
    {
        return $this->db->get('satker');
    }

    public function insert_satker($data,$table){
		$this->db->insert($table,$data);
	}

  	function edit_satker($where,$table){
		return $this->db->get_where($table,$where);
	}

    function update_satker($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

    public function delete_satker($where,$table)
    {
		$this->db->where($where);
		$this->db->delete($table);
	}		

    public function check_username($username_cek){
       $query = $this->db->get_where('satker', array('username' => $username_cek));
       if(empty($query->row_array())){
        return true;
       } else {
        return false;
       }
    }
    // update waktu login
    function update_waktu_login($where, $stamp)
	{
		$this->db->update('satker', $stamp, $where);
    }


    function cek_knm_satker($where, $table)
	{
		return $this->db->get_where($where, $table);
    }

}