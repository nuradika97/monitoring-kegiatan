<?php

class M_satuan extends CI_Model
{


    public function get_satuan_by_id($id)
    {
        $this->db->where('id_satuan', $id);
        return $this->db->get('satuan');
    }

    public function get_satuan_all()
    {
        return $this->db->get('satuan');
    }

    public function insert_satuan($data,$table){
		$this->db->insert($table,$data);
	}

  	function edit_satuan($where,$table){
		return $this->db->get_where($table,$where);
	}

    function update_satuan($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

    public function delete_satuan($where,$table)
    {
		$this->db->where($where);
		$this->db->delete($table);
	}		

    public function check_username($username_cek){
       $query = $this->db->get_where('satuan', array('username' => $username_cek));
       if(empty($query->row_array())){
        return true;
       } else {
        return false;
       }
    }
    // update waktu login
    function update_waktu_login($where, $stamp)
	{
		$this->db->update('satuan', $stamp, $where);
    }


    function cek_knm_satuan($where, $table)
	{
		return $this->db->get_where($where, $table);
    }

}