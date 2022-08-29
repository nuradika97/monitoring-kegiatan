<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_kegiatan extends CI_Controller {

	function __construct(){
		parent::__construct();
		// cek login
		is_logged_in();
	}

	function index($id){

        //  $data['user']  = $this->db->get_where('kegiatan', ['username'
        //     => $this->session->userdata('username')])->row_array();
        $data['kegiatan'] = $this->M_kegiatan->get_kegiatan_by_id($id)->result();
        $data['detail_kegiatan'] = $this->M_detail_kegiatan->get_detail_kegiatan_group_by()->result();
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
        $data['id'] = $id;
        // var_dump($data['id']);
        // die();
        // $data['detail_kegiatan'] = $this->M_detail_kegiatan->get_detail_kegiatan_sum($id)->result();
        $this->load->view('admin/detail_kegiatan_add', $data);
        
    }

    function add_detail_kegiatan_act(){

        $id_kegiatan = $this->input->post('id_kegiatan');
        $nama_detail_kegiatan = $this->input->post('nama_detail_kegiatan');
        // $kode_satker = $this->input->post('kode_satker');
       
           
        // var_dump($id_kegiatan);
        // die();
   

         $this->form_validation->set_rules('nama_detail_kegiatan','Nama Detail Kegiatan Kegiatan','required',
            array(
                'required' => '%s harus diisi'
            )
            );
          
            
        if($this->form_validation->run() != false){

        
               $data = [
                   'id_kegiatan' => $id_kegiatan,
                   'detail_kegiatan' =>  $nama_detail_kegiatan,
                   'created_at' => date('Y-m-d H:i:s'),
                   ];
            
        
            $data['id'] = $this->input->post('id_kegiatan');
			$this->M_detail_kegiatan->insert_detail_kegiatan($data,'detail_kegiatan');
            
            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>Data Berhasil Ditambahkan!</b></div>');
			redirect(base_url().'detail_kegiatan');
            
		}else{
            $id = $this->input->post('id_kegiatan');
            $data['id_kegiatan'] = $this->input->post('id_kegiatan');
            $data['tim'] = $this->M_tim->get_tim_all()->result();
            $data['periode'] = $this->M_periode->get_periode_all()->result();
            $data['satuan'] = $this->M_satuan->get_satuan_all()->result();
            $data['jenis_kegiatan'] = $this->M_jenis_kegiatan->get_jenis_kegiatan_all()->result();
            $data['satker'] = $this->M_satker->get_satker_all()->result();
            $data['kegiatan'] = $this->M_kegiatan->get_kegiatan_by_id($id)->result();
		    $this->load->view('admin/detail_kegiatan_add', $data);
          }
        }

     function edit_kegiatan($id){				
            $where = array(
                'id_kegiatan' => $id		
            );
            $data['kegiatan'] = $this->M_kegiatan->edit_kegiatan($where,'kegiatan')->result();		
            
            $this->load->view('admin/kegiatan_update', $data);
	    }
    
     function update_kegiatan($id){				
        
       
        $nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
        $password1 = $this->input->post('password1');
        $password2 = $this->input->post('password2');

      
            $this->form_validation->set_rules('nama','Nama Lengkap','required');

             $this->form_validation->set_rules(
                    'email', 'Email',
                    'required|valid_email',
                    array(
                            'required'      => '%s harus diisi',
                            'is_unique'     => '%s Ini Sudah Ada'
                    )
            );

            $this->form_validation->set_rules(
                    'username', 'Username',
                    'required|min_length[4]|max_length[12]',
                    array(
                            'min_length' => '%s minimal 4 karakter',
                            'max_length' => '%s maksimal 12 karakter',
                            'required'      => '%s harus diisi',
                            'is_unique'     => '%s Ini Sudah Ada'
                    )
            );

           $this->form_validation->set_rules('password1','Password','trim|min_length[5]');
             array(
                            'required' => '%s harus diisi',
                            'min_length' => '%s minimal 6 karakter',
                            'required'      => '%s harus diisi',
             );

            $this->form_validation->set_rules('password2','Password', 'min_length[5]|matches[password1]', 
            array(
                'required' => '%s harus diisi',
                'matches' => 'Konfirmasi %s tidak sama',
                'min_length' => '%s minimal 6 karakter'
            )
            );
           
            if ($this->form_validation->run() != false) {
		
            if ($password1 != NULL) {

                $data = array(
                    'nama_kegiatan' => $nama,
                    'username' => $username,			
                    'email' => $email,			
                    'password' => md5($password1)
                );
                $where = array(
                    'id_kegiatan' => $id		
                );
                
                $this->M_kegiatan->update_kegiatan($where,$data,'kegiatan');
                $this->session->set_flashdata('message', '<div class="alert alert-success"><b>Data Berhasil Diubah!</b></div>');
                redirect(base_url().'kegiatan');
            } else {
                 // die();
                $where = array(
                    'id_kegiatan' => $id		
                );
                $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Tidak ada Perubahan!</b></div>');
                redirect(base_url().'kegiatan');
                }          
         
           
            
		} else {
       
            $where = array(
                'id_kegiatan' => $id		
            );
		   $data['kegiatan'] = $this->M_kegiatan->edit_kegiatan($where,'kegiatan')->result();		
		     $this->load->view('admin/kegiatan_update', $data);
          }
        }

    function delete_detail_kegiatan($id){	   
		$where = array(
			'id_kegiatan' => $id		
		);
		$this->M_kegiatan->delete_detail_kegiatan($where,'kegiatan');		
        $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Berhasil Dihapus!</b></div>');
		redirect(base_url().'detail_kegiatan');

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