<?php

class M_tim_kegiatan extends CI_Model
{


    public function get_tim_kegiatan_by_id($id)
    {
        $this->db->where('id_timkeg', $id);
        return $this->db->get('tim_kegiatan');
    }

    public function get_tim_kegiatan_all()
    {
        $this->db->select('*');
        $this->db->from('tim_kegiatan');
        $this->db->join('tim', 'tim_kegiatan.id_tim = tim.id_tim');
        $this->db->join('pegawai', 'tim_kegiatan.id_pegawai = pegawai.id_pegawai');
        $this->db->join('role', 'tim_kegiatan.id_role = role.id_role');
        $this->db->order_by('kode_tim');
        return $this->db->get();
        
    }

    public function get_tim_role(){
        $this->db->select('*');
        $this->db->from('role');
        return $this->db->get();
    }

    public function insert_tim_kegiatan($data,$table){
		$this->db->insert($table,$data);
	}

  	function edit_tim_kegiatan($id){
		$this->db->select('*');
        $this->db->from('tim_kegiatan');
        $this->db->join('tim', 'tim_kegiatan.id_tim = tim.id_tim');
        $this->db->join('pegawai', 'tim_kegiatan.id_pegawai = pegawai.id_pegawai');
        $this->db->join('role', 'tim_kegiatan.id_role = role.id_role');
        $this->db->where('id_timkeg', $id);
        return $this->db->get();
	}

    function update_tim_kegiatan($where,$data,$table){
		$this->db->where('id_timkeg', $where);
		$this->db->update($table,$data);
	}

    public function delete_tim_kegiatan($where,$table)
    {
		$this->db->where($where);
		$this->db->delete($table);
	}		

    public function check_username($username_cek){
       $query = $this->db->get_where('tim_kegiatan', array('username' => $username_cek));
       if(empty($query->row_array())){
        return true;
       } else {
        return false;
       }
    }
    // update waktu login
    function update_waktu_login($where, $stamp)
	{
		$this->db->update('tim_kegiatan', $stamp, $where);
    }


    function cek_knm_db($where)
	{
        $query = $this->db->select("(SELECT CONCAT(id_tim, id_pegawai, id_role) FROM tim_kegiatan as tim  where CONCAT(id_tim, id_pegawai, id_role) LIKE '%$where%'");
      
		return $query;
    }

}