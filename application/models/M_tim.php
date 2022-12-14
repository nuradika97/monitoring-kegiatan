<?php

class M_tim extends CI_Model
{


    public function get_tim_by_id($id)
    {
        $this->db->where('id_tim', $id);
        return $this->db->get('tim');
    }

    public function get_tim_all()
    {
        $this->db->select('*');
        $this->db->from('tim');
        $this->db->join('pegawai', 'pegawai.id_pegawai = tim.ketua_tim');
        return $this->db->get();
    }

    public function insert_tim($data,$table){
		$this->db->insert($table,$data);
	}

  	function edit_tim($where,$table){
         $this->db->select('*');
        $this->db->from($table);
        $this->db->join('pegawai', 'pegawai.id_pegawai = tim.ketua_tim');
        $this->db->where($where);
		return $this->db->get();
	}

    function update_tim($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

    public function delete_tim($where,$table)
    {
		$this->db->where($where);
		$this->db->delete($table);
	}		

    public function check_username($username_cek){
       $query = $this->db->get_where('tim', array('username' => $username_cek));
       if(empty($query->row_array())){
        return true;
       } else {
        return false;
       }
    }
    // update waktu login
    function update_waktu_login($where, $stamp)
	{
		$this->db->update('tim', $stamp, $where);
    }


    function cek_knm_tim($where, $table)
	{
		return $this->db->get_where($where, $table);
    }

}