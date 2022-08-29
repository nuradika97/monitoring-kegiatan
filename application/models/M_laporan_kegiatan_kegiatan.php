<?php

class M_detail_kegiatan extends CI_Model
{


    public function get_detail_kegiatan_by_id($id)
    {
        $this->db->where('id_detail_kegiatan', $id);
        return $this->db->get('detail_kegiatan');
    }

    function get_detail_kegiatan_all()
    {
        $this->db->select('*');
        $this->db->from('detail_kegiatan');
        // $this->db->group_by('id_detail_kegiatan');
        // $this->db->order_by('id_tim');
        return $this->db->get();
    }

    function get_detail_kegiatan_group_by(){

        $this->db->select('*');
        $this->db->from('detail_kegiatan');
        $this->db->group_by('id_satker');
        return $this->db->get();

    }

    function insert_detail_kegiatan($data,$table){
		$this->db->insert_batch($table,$data);
	}

  	function edit_detail_kegiatan($id){
        $this->db->select('*');
         $this->db->from('detail_kegiatan');
        $this->db->join('tim', 'detail_kegiatan.id_tim = tim.id_tim');
        $this->db->join('satuan', 'detail_kegiatan.id_satuan = satuan.id_satuan');
        $this->db->join('jenis_detail_kegiatan', 'detail_kegiatan.id_jenis_detail_kegiatan = jenis_detail_kegiatan.id_jenis_detail_kegiatan');
        $this->db->join('periode', 'detail_kegiatan.id_periode = periode.id_periode');
        $this->db->where('id_detail_kegiatan', $id);
        return $this->db->get();
	}

    function update_detail_kegiatan($where,$data,$table){
		$this->db->where('id_detail_kegiatan', $where);
		$this->db->update($table,$data);
	}

    public function delete_detail_kegiatan($where,$table)
    {
		$this->db->where($where);
		$this->db->delete($table);
	}		

    public function check_username($username_cek){
       $query = $this->db->get_where('detail_kegiatan', array('username' => $username_cek));
       if(empty($query->row_array())){
        return true;
       } else {
        return false;
       }
    }
    
    function update_waktu_login($where, $stamp)
	{
		$this->db->update('detail_kegiatan', $stamp, $where);
    }

    function insert_detail_kegiatan2($data, $table) 
    {
    $last_row = $this->db->select('id_detail_kegiatan')->order_by('id_detail_kegiatan',"desc")->limit(1)->get('detail_kegiatan')->row()->id_detail_kegiatan;
    if(!empty($data['jns_kebutuhan']))
    {
        $data['id_pendaftar'] = $last_row;
        $query = $this->db->insert($table,$data);
    }
    return $this->db->insert_id();
    } //END FUNCTION//

}