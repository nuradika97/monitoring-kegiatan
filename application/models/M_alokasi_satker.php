<?php

class M_alokasi_satker extends CI_Model
{


    function get_alokasi_satker_by_id($id)
    {
        $this->db->select('*');
        $this->db->join('satker', 'laporan_alokasi_satker.id_satker = satker.id_satker');
        $this->db->where('id_detail_kegiatan', $id);
        return $this->db->get('laporan_alokasi_satker');
    }

 //     function get_ketua_tim($id)
 //    {
 //        $this->db->select('*');
 //        $this->db->from('tim');
 //        $this->db->join('kegiatan','tim.id_tim = kegiatan.id_tim');
 //        $this->db->join('pegawai','pegawai.id_pegawai = tim.ketua_tim');
 //        $this->db->where('id_kegiatan', $id);
 //         return $this->db->get();
 //    }


 //    function get_id_kegiatan()
 //    {
 //        $this->db->select('detail_kegiatan.id_kegiatan');
 //        $this->db->from('detail_kegiatan');
 //        $this->db->join('kegiatan','detail_kegiatan.id_kegiatan = kegiatan.id_kegiatan');
 //        // $this->db->where('id_detail_kegiatan', $id);
 //        $this->db->group_by('id_kegiatan');
 //        return $this->db->get();

 //    }

 //    function get_detail_kegiatan_all()
 //    {
 //        $this->db->select('*');
 //        $this->db->from('detail_kegiatan');
 //        $this->db->join('satuan', 'detail_kegiatan.id_satuan = satuan.id_satuan');
 //        // $this->db->group_by('id_detail_kegiatan');
 //        // $this->db->order_by('id_tim');
 //        return $this->db->get();
 //    }

 //    function get_detail_kegiatan_group_by(){

 //        $this->db->select('*');
 //        $this->db->from('detail_kegiatan');
 //        // $this->db->group_by('id_satker');
 //        return $this->db->get();

 //    }

 //    function insert_detail_kegiatan($data,$table){
	// 	$this->db->insert($table,$data);
	// }

 //  	function edit_detail_kegiatan($id){
 //        $this->db->select('*');
 //        $this->db->from('detail_kegiatan');
 //        // $this->db->join('kegiatan','detail_kegiatan.id_kegiatan = kegiatan.id_kegiatan');
 //        // $this->db->join('tim', 'kegiatan.id_tim = tim.id_tim');
 //        // $this->db->join('satuan', 'kegiatan.id_satuan = satuan.id_satuan');
 //        // $this->db->join('jenis_kegiatan', 'kegiatan.id_jenis_kegiatan = jenis_kegiatan.id_jenis_kegiatan');
 //        // $this->db->join('periode', 'kegiatan.id_periode = periode.id_periode');
 //        $this->db->where('id_detail_kegiatan', $id);
 //        return $this->db->get();
	// }

    function edit_alokasi_satker($id){
        $this->db->select('*');
        $this->db->from('laporan_alokasi_satker');
        $this->db->join('satker', 'laporan_alokasi_satker.id_satker = satker.id_satker');
        $this->db->where('id_detail_kegiatan', $id);
        return $this->db->get();
    }

 //    function update_detail_kegiatan($where,$data){
	// 	$this->db->where('id_detail_kegiatan',$where);
	// 	$this->db->update('detail_kegiatan', $data);
	// }

 //    public function delete_detail_kegiatan($where,$table)
 //    {
	// 	$this->db->where('id_detail_kegiatan', $where);
	// 	$this->db->delete($table);
	// }		

 //    public function check_username($username_cek){
 //       $query = $this->db->get_where('detail_kegiatan', array('username' => $username_cek));
 //       if(empty($query->row_array())){
 //        return true;
 //       } else {
 //        return false;
 //       }
 //    }
    
 //    function update_waktu_login($where, $stamp)
	// {
	// 	$this->db->update('detail_kegiatan', $stamp, $where);
 //    }

 //    function insert_detail_kegiatan2($data, $table) 
 //    {
 //    $last_row = $this->db->select('id_detail_kegiatan')->order_by('id_detail_kegiatan',"desc")->limit(1)->get('detail_kegiatan')->row()->id_detail_kegiatan;
 //    if(!empty($data['jns_kebutuhan']))
 //    {
 //        $data['id_pendaftar'] = $last_row;
 //        $query = $this->db->insert($table,$data);
 //    }
 //    return $this->db->insert_id();
 //    } //END FUNCTION//

 //     function cek_tanggal_kegiatan()
 //    {
 //        $this->db->select('detail_kegiatan.id_kegiatan,kegiatan.tgl_mulai, kegiatan.tgl_selesai');
 //        $this->db->from('detail_kegiatan');
 //        $this->db->join('kegiatan','detail_kegiatan.id_kegiatan = kegiatan.id_kegiatan');
 //        // $this->db->where('id_detail_kegiatan', $id);
 //        $this->db->group_by('id_kegiatan');
 //        return $this->db->get();

 //    }


}