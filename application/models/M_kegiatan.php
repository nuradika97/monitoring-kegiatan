<?php

class M_kegiatan extends CI_Model
{


    public function get_kegiatan_by_id($id)
    {
        $this->db->where('id_kegiatan', $id);
        return $this->db->get('kegiatan');
    }

    function get_kegiatan_all()
    {
        $this->db->select('*');
        $this->db->from('kegiatan');
        $this->db->join('tim', 'kegiatan.id_tim = tim.id_tim');
        $this->db->join('satuan', 'kegiatan.id_satuan = satuan.id_satuan');
        $this->db->join('jenis_kegiatan', 'kegiatan.id_jenis_kegiatan = jenis_kegiatan.id_jenis_kegiatan');
        $this->db->join('periode', 'kegiatan.id_periode = periode.id_periode');
        // $this->db->group_by('id_kegiatan');
        // $this->db->order_by('id_tim');
        return $this->db->get();
    }

    function insert_kegiatan($data,$table){
		$this->db->insert($table,$data);
	}

  	function edit_kegiatan($id){
        $this->db->select('*');
         $this->db->from('kegiatan');
        $this->db->join('tim', 'kegiatan.id_tim = tim.id_tim');
        $this->db->join('satuan', 'kegiatan.id_satuan = satuan.id_satuan');
        $this->db->join('jenis_kegiatan', 'kegiatan.id_jenis_kegiatan = jenis_kegiatan.id_jenis_kegiatan');
        $this->db->join('periode', 'kegiatan.id_periode = periode.id_periode');
        $this->db->where('id_kegiatan', $id);
        return $this->db->get();
	}

    function update_kegiatan($where,$data,$table){
		$this->db->where('id_kegiatan', $where);
		$this->db->update($table,$data);
	}

    public function delete_kegiatan($where,$table)
    {
		$this->db->where($where);
		$this->db->delete($table);
	}		

    public function check_username($username_cek){
       $query = $this->db->get_where('kegiatan', array('username' => $username_cek));
       if(empty($query->row_array())){
        return true;
       } else {
        return false;
       }
    }
    
    function update_waktu_login($where, $stamp)
	{
		$this->db->update('kegiatan', $stamp, $where);
    }

    function insert_kegiatan2($data, $table) 
    {
    $last_row = $this->db->select('id_kegiatan')->order_by('id_kegiatan',"desc")->limit(1)->get('kegiatan')->row()->id_kegiatan;
    if(!empty($data['jns_kebutuhan']))
    {
        $data['id_pendaftar'] = $last_row;
        $query = $this->db->insert($table,$data);
    }
    return $this->db->insert_id();
    } //END FUNCTION//

}