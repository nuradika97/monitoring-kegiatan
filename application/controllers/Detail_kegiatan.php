<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_kegiatan extends CI_Controller {

	function __construct(){
		parent::__construct();
		// cek login
		is_logged_in();
	}

	function index($id){

        // var_dump($id);
        // die();
        if($id != ''){
            $data['kegiatan'] = $this->M_kegiatan->get_kegiatan_by_id($id)->result();
        }else{
            $data['kegiatan'] = $this->M_kegiatan->get_kegiatan_by_id()->result();
        }
        $data['ketuatim'] = $this->M_detail_kegiatan->get_ketua_tim($id)->result();
        // var_dump($data['ketuatim']);
        // die();
        $data['detail_kegiatan'] = $this->M_detail_kegiatan->get_detail_kegiatan_all()->result();
        // $data['detail_kegiatan'] = $this->M_detail_kegiatan->get_detail_kegiatan_all()->result();
		$this->load->view('admin/detail_kegiatan_index', $data);
        
	}	

    function detail_kegiatan_add($id){   	
        $data['tim'] = $this->M_tim->get_tim_all()->result();
        $data['periode'] = $this->M_periode->get_periode_all()->result();
        $data['satuan'] = $this->M_satuan->get_satuan_all()->result();
        $data['jenis_kegiatan'] = $this->M_jenis_kegiatan->get_jenis_kegiatan_all()->result();
        $data['satker'] = $this->M_satker->get_satker_all()->result();
        $data['kegiatan'] = $this->M_kegiatan->get_kegiatan_by_id($id)->result();
        $data['id_kegiatan'] = $id;
        // var_dump($data['id']);
        // die();
        // $data['detail_kegiatan'] = $this->M_detail_kegiatan->get_detail_kegiatan_sum($id)->result();
        $this->load->view('admin/detail_kegiatan_add', $data);
        
    }

    function add_detail_kegiatan_act(){

        $id_kegiatan = $this->input->post('id_kegiatan');
        $nama_detail_kegiatan = $this->input->post('nama_detail_kegiatan');

         $this->form_validation->set_rules('nama_detail_kegiatan','Nama Detail Kegiatan Kegiatan','required',
            array(
                'required' => '%s harus diisi'
            )
            );
          
        if($this->form_validation->run() != false){

               $data = array(
                   'id_kegiatan' => $id_kegiatan,
                   'detail_kegiatan' =>  $nama_detail_kegiatan,
                   'created_at' => date('Y-m-d H:i:s')
               );
            
			$this->M_detail_kegiatan->insert_detail_kegiatan($data,'detail_kegiatan');
            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>Data Berhasil Ditambahkan!</b></div>');
            $this->index($id_kegiatan);
            
		}else{
            $id = $this->input->post('id_kegiatan');
            $data['id_kegiatan'] = $this->input->post('id_kegiatan');
            $data['kegiatan'] = $this->M_kegiatan->get_kegiatan_by_id($id)->result();
		    $this->load->view('admin/detail_kegiatan_add', $data);
          }
        }

     function edit_kegiatan($id){				
            $where = array(
                'id_detail_kegiatan' => $id		
            );
            $data['detail_kegiatan'] = $this->M_detail_kegiatan->edit_detail_kegiatan($id,'kegiatan')->result();		
            // var_dump($data);
            // die();
            $this->load->view('admin/detail_kegiatan_update', $data);
	    }
    
     function update_kegiatan($id){				
        
        $id_kegiatan = $id;
        $nama_detail_kegiatan = $this->input->post('nama_detail_kegiatan');

         $this->form_validation->set_rules('nama_detail_kegiatan','Nama Detail Kegiatan Kegiatan','required',
            array(
                'required' => '%s harus diisi'
            )
            );
          
        if($this->form_validation->run() != false){

               $data = array(
                   'id_kegiatan' => $id_kegiatan,
                   'detail_kegiatan' =>  $nama_detail_kegiatan,
                   'created_at' => date('Y-m-d H:i:s')
               );
            
			$this->M_detail_kegiatan->insert_detail_kegiatan($data,'detail_kegiatan');
            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>Data Berhasil Ditambahkan!</b></div>');
            $this->index($id_kegiatan);
            
		}else{
            $id = $this->input->post('id_kegiatan');
            $data['id_kegiatan'] = $this->input->post('id_kegiatan');
            $data['kegiatan'] = $this->M_kegiatan->get_kegiatan_by_id($id)->result();
		    $this->load->view('admin/detail_kegiatan_add', $data);
          }
        }

    function delete_detail_kegiatan($id){	  
        
        $where = $id;
        $this->M_detail_kegiatan->delete_detail_kegiatan($where,'detail_kegiatan');	
		$id_kegiatan = $this->M_detail_kegiatan->get_id_kegiatan()->result();
        
         foreach ($id_kegiatan as $ik) {
         $id = $ik->id_kegiatan;
         echo "$id";
         }
        $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Berhasil Dihapus!</b></div>');
        // $this->index($id);
        redirect(base_url().'detail_kegiatan/index/'.$id);
	}


    function load_user(){
          $data['user']  = $this->db->get_where('kegiatan', ['username'
            => $this->session->userdata('username')])->row_array();
    }

    function compareDate()
	{
		$tgl_mulai = $_POST['tgl_mulai'];
		$tgl_selesai = $_POST['tgl_selesai'];
		$tgl_sekarang = date("Y-m-d h:i");
		// var_dump($tgl_selesai);
		// die();

		if ($tgl_selesai >= $tgl_mulai) {
			return True;
		} else {
			$this->form_validation->set_message('compareDate', 'tgl Mulai harus lebih dahulu dari tanggal Selesai');
			return False;
		}
	}

    
}
?>