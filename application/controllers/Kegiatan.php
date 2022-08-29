<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	function __construct(){
		parent::__construct();
		// cek login
		is_logged_in();
	}

	function index(){
      
        //  $data['user']  = $this->db->get_where('kegiatan', ['username'
        //     => $this->session->userdata('username')])->row_array();
        $data['kegiatan'] = $this->M_kegiatan->get_kegiatan_all()->result();
		$this->load->view('admin/kegiatan_index', $data);
        
	}	

    function kegiatan_add(){   	
        
        $data['tim'] = $this->M_tim->get_tim_all()->result();
        $data['periode'] = $this->M_periode->get_periode_all()->result();
        $data['satuan'] = $this->M_satuan->get_satuan_all()->result();
        $data['jenis_kegiatan'] = $this->M_jenis_kegiatan->get_jenis_kegiatan_all()->result();
        $data['satker'] = $this->M_satker->get_satker_all()->result();
        $this->load->view('admin/kegiatan_add', $data);
        
    }

    function add_kegiatan_act(){

        $nama_kegiatan = $this->input->post('nama_kegiatan');
		$id_tim = $this->input->post('id_tim');
		$tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_selesai = $this->input->post('tgl_selesai');
        $id_periode = $this->input->post('id_periode');
        $id_jenis_kegiatan = $this->input->post('id_jenis_kegiatan');
        $id_satuan = $this->input->post('id_satuan');
        // $kode_satker = $this->input->post('kode_satker');
       
           
        // var_dump($data);
        // die();
   

         $this->form_validation->set_rules('nama_kegiatan','Nama Kegiatan','required',
            array(
                'required' => '%s harus diisi'
            )
            );
            $this->form_validation->set_rules('id_tim','Nama Tim','required',
            array(
                'required' => '%s harus dipilih'
            )
            );
            $this->form_validation->set_rules('id_periode','Periode','required',
            array(
                'required' => '%s harus dipilih'
            )
            );
            $this->form_validation->set_rules('id_jenis_kegiatan','Jenis Kegiatan','required',
            array(
                'required' => '%s harus dipilih'
            )
            );
            $this->form_validation->set_rules('id_satuan','Satuan','required',
            array(
                'required' => '%s harus dipilih'
            )
            );
          

            $validasi = array(
                    array('field' => 'tgl_mulai', 'label' => 'Tanggal Mulai', 'rules' => 'required|callback_compareDate'),
                    array('field' => 'tgl_selesai', 'label' => 'Tanggal Selesai', 'rules' => 'required|callback_compareDate'),
                );
            $this->form_validation->set_rules($validasi);
            $this->form_validation->set_message('required', '%s is required.');
            
        if($this->form_validation->run() != false){

            $data = array(
            'nama_kegiatan' =>  $nama_kegiatan,
            'id_tim' =>  $id_tim,
            'tgl_mulai' => $tgl_mulai,
            'tgl_selesai' => $tgl_selesai,
            'id_periode' => $id_periode,
            'id_jenis_kegiatan' => $id_jenis_kegiatan,
            'id_satuan' => $id_satuan,
         );
        
			$this->M_kegiatan->insert_kegiatan($data,'kegiatan');
            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>Data Berhasil Ditambahkan!</b></div>');
			redirect(base_url().'kegiatan');
            
		}else{
            $data['tim'] = $this->M_tim->get_tim_all()->result();
            $data['periode'] = $this->M_periode->get_periode_all()->result();
            $data['satuan'] = $this->M_satuan->get_satuan_all()->result();
            $data['jenis_kegiatan'] = $this->M_jenis_kegiatan->get_jenis_kegiatan_all()->result();
            $data['satker'] = $this->M_satker->get_satker_all()->result();
		     $this->load->view('admin/kegiatan_add', $data);
          }
        }

     function edit_kegiatan($id){				
         
            $data['tim'] = $this->M_tim->get_tim_all()->result();
            $data['periode'] = $this->M_periode->get_periode_all()->result();
            $data['satuan'] = $this->M_satuan->get_satuan_all()->result();
            $data['jenis_kegiatan'] = $this->M_jenis_kegiatan->get_jenis_kegiatan_all()->result();
            $data['satker'] = $this->M_satker->get_satker_all()->result();
            $data['kegiatan'] = $this->M_kegiatan->edit_kegiatan($id)->result();		
            
            $this->load->view('admin/kegiatan_update', $data);
	    }
    
     function update_kegiatan(){				
        
        $id_kegiatan = $this->input->post('id_kegiatan');
        $nama_kegiatan = $this->input->post('nama_kegiatan');
		$id_tim = $this->input->post('id_tim');
		$tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_selesai = $this->input->post('tgl_selesai');
        $id_periode = $this->input->post('id_periode');
        $id_jenis_kegiatan = $this->input->post('id_jenis_kegiatan');
        $id_satuan = $this->input->post('id_satuan');
       
           
         $this->form_validation->set_rules('nama_kegiatan','Nama Kegiatan','required',
            array(
                'required' => '%s harus diisi'
            )
            );
            $this->form_validation->set_rules('id_tim','Nama Tim','required',
            array(
                'required' => '%s harus dipilih'
            )
            );
            $this->form_validation->set_rules('id_periode','Periode','required',
            array(
                'required' => '%s harus dipilih'
            )
            );
            $this->form_validation->set_rules('id_jenis_kegiatan','Jenis Kegiatan','required',
            array(
                'required' => '%s harus dipilih'
            )
            );
            $this->form_validation->set_rules('id_satuan','Satuan','required',
            array(
                'required' => '%s harus dipilih'
            )
            );
          

           $validasi = array(
                    array('field' => 'tgl_mulai', 'label' => 'Tanggal Mulai', 'rules' => 'required|callback_compareDate'),
                    array('field' => 'tgl_selesai', 'label' => 'Tanggal Selesai', 'rules' => 'required|callback_compareDate'),
                );
            $this->form_validation->set_rules($validasi);
            $this->form_validation->set_message('required', '%s is required.');
            
        if($this->form_validation->run() != false){

            $data = array(
            'nama_kegiatan' =>  $nama_kegiatan,
            'id_tim' =>  $id_tim,
            'tgl_mulai' => $tgl_mulai,
            'tgl_selesai' => $tgl_selesai,
            'id_periode' => $id_periode,
            'id_jenis_kegiatan' => $id_jenis_kegiatan,
            'id_satuan' => $id_satuan,
         );
       
			$this->M_kegiatan->update_kegiatan($id_kegiatan, $data,'kegiatan');
            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>Data Berhasil Diubah!</b></div>');
			redirect(base_url().'kegiatan');
         } else {
                                $data['kegiatan'] = $this->M_kegiatan->edit_kegiatan($id_kegiatan)->result();
                                $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Tidak ada Perubahan!</b></div>');	
                                $this->load->view('admin/kegiatan_update', $data);
                        }
                                

                    
    }

    function delete_kegiatan($id){	   
		$where = array(
			'id_kegiatan' => $id		
		);
		$this->M_kegiatan->delete_kegiatan($where,'kegiatan');		
        $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Berhasil Dihapus!</b></div>');
		redirect(base_url().'kegiatan');

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
	

		if ($tgl_selesai >= $tgl_mulai) {
			return True;
		} else {
			$this->form_validation->set_message('compareDate', 'tgl Mulai harus lebih dahulu dari tanggal Selesai');
			return False;
		}
	}

    
}
?>