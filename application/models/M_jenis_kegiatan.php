<?php

class M_jenis_kegiatan extends CI_Model
{


    public function get_jenis_kegiatan_by_id($id)
    {
        $this->db->where('id_jenis_kegiatan', $id);
        return $this->db->get('jenis_kegiatan');
    }

    public function get_jenis_kegiatan_all()
    {
        return $this->db->get('jenis_kegiatan');
    }

    public function insert_jenis_kegiatan($data,$table){
		$this->db->insert($table,$data);
	}

  	function edit_jenis_kegiatan($where,$table){
		return $this->db->get_where($table,$where);
	}

    function update_jenis_kegiatan($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

    public function delete_jenis_kegiatan($where,$table)
    {
		$this->db->where($where);
		$this->db->delete($table);
	}		

    public function check_username($username_cek){
       $query = $this->db->get_where('jenis_kegiatan', array('username' => $username_cek));
       if(empty($query->row_array())){
        return true;
       } else {
        return false;
       }
    }
    // update waktu login
    function update_waktu_login($where, $stamp)
	{
		$this->db->update('jenis_kegiatan', $stamp, $where);
    }


    function cek_knm_jenis_kegiatan($where, $table)
	{
		return $this->db->get_where($where, $table);
    }

}