<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_kegiatan extends CI_Controller {

	function __construct(){
		parent::__construct();
		// cek login
		is_logged_in();
	}

	function index(){
      
        //  $data['user']  = $this->db->get_where('jenis_kegiatan', ['username'
        //     => $this->session->userdata('username')])->row_array();
      
        $data['jenis_kegiatan'] = $this->M_jenis_kegiatan->get_jenis_kegiatan_all()->result();
		$this->load->view('admin/jenis_kegiatan_index', $data);
        
	}	

    function jenis_kegiatan_add(){   	
            // $data['user']  = $this->db->get_where('jenis_kegiatan', ['username'
            // => $this->session->userdata('username')])->row_array();
		/* session dari jenis_kegiatan kegiatan */
            // $this->load->view('admin/jenis_kegiatan_add', $data);
            $this->load->view('admin/jenis_kegiatan_add');
        
    }

    function add_jenis_kegiatan_act(){
        
		$nama_jenis_kegiatan = $this->input->post('nama_jenis_kegiatan');
		
               $this->form_validation->set_rules(
                    'nama_jenis_kegiatan', 'Nama jenis_kegiatan',
                    'required|min_length[3]|max_length[100]|is_unique[jenis_kegiatan.nama_jenis_kegiatan]',
                    array(
                            'min_length' => '%s minimal 4 Karakter',
                            'max_length' => '%s maksimal 4 karakter',
                            'required'      => '%s harus diisi',
                            'is_unique'     => '%s Ini Sudah Ada'
                    )
            );
           
            if($this->form_validation->run() != false){
			$data = array(
				'nama_jenis_kegiatan' => $nama_jenis_kegiatan,			
			);
			$this->M_jenis_kegiatan->insert_jenis_kegiatan($data,'jenis_kegiatan');
            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>Data Berhasil Ditambahkan!</b></div>');
			redirect(base_url().'jenis_kegiatan');
            
		}else{
            // $data['user']  = $this->db->get_where('jenis_kegiatan', ['username'
            // => $this->session->userdata('username')])->row_array();
            // $id_jenis_kegiatan = $this->session->userdata('id_jenis_kegiatan');
            // $id_jenis_kegiatan = $this->session->userdata('id_jenis_kegiatan');
		    $data['jenis_kegiatan'] = $this->db->query("select * from jenis_kegiatan order by id_jenis_kegiatan")->result();

		     $this->load->view('admin/jenis_kegiatan_add', $data);
          }
        }

     function edit_jenis_kegiatan($id){				
            $where = array(
                'id_jenis_kegiatan' => $id		
            );
            $data['jenis_kegiatan'] = $this->M_jenis_kegiatan->edit_jenis_kegiatan($where,'jenis_kegiatan')->result();		
            
            $this->load->view('admin/jenis_kegiatan_update', $data);
	    }
    
     function update_jenis_kegiatan($id){				    
        
       
		$nama_jenis_kegiatan = $this->input->post('nama_jenis_kegiatan');

        $where = array(
            'nama_jenis_kegiatan' => $nama_jenis_kegiatan
            );
    /* Jika nama jenis_kegiatan tidak sama dengan yang ada didatabase maka 
    lakukan perubahan jika nama jenis_kegiatan sama maka validasi nama jenis_kegiatan sudah ada*/     

    $cek_knm_jenis_kegiatan = $this->M_jenis_kegiatan->cek_knm_jenis_kegiatan('jenis_kegiatan', $where)->row('nama_jenis_kegiatan');
        
        if($cek_knm_jenis_kegiatan == NULL){

               $this->form_validation->set_rules(
               
                'nama_jenis_kegiatan', 'Nama jenis_kegiatan',
                'required|min_length[3]|max_length[100]|is_unique[jenis_kegiatan.nama_jenis_kegiatan]',
                array(
                    'min_length' => '%s minimal 4 Karakter',
                    'max_length' => '%s maksimal 4 karakter',
                    'required'      => '%s harus diisi',
                    'is_unique'     => '%s Ini Sudah Ada'
                    )
                );

        if ($this->form_validation->run() != false){
            
            $where = array(
                'id_jenis_kegiatan' => $id
            );
            $data = array(
                'nama_jenis_kegiatan' => $nama_jenis_kegiatan	
            );
            
            $this->M_jenis_kegiatan->update_jenis_kegiatan($where,$data,'jenis_kegiatan');
             $this->session->set_flashdata('message', '<div class="alert alert-success"><b>Data Berhasil Diubah!</b></div>');
            redirect(base_url().'jenis_kegiatan');
        } else {
            $where = array(
                    'id_jenis_kegiatan' => $id		
                    );
                $data['jenis_kegiatan'] = $this->M_jenis_kegiatan->edit_jenis_kegiatan($where,'jenis_kegiatan')->result();
                $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Tidak ada Perubahan!</b></div>');	
                $this->load->view('admin/jenis_kegiatan_update', $data);
        }
                
        
    } else { 
        
        $this->form_validation->set_rules(
        
        'nama_jenis_kegiatan', 'Nama jenis kegiatan',
        'required|min_length[3]|max_length[100]|is_unique[jenis_kegiatan.nama_jenis_kegiatan]',
                array(
                    'min_length' => '%s minimal 4 Karakter',
                    'max_length' => '%s maksimal 4 karakter',
                    'required'      => '%s harus diisi',
                    'is_unique'     => '%s Ini Sudah Ada'
                    )
                );

                if ($this->form_validation->run() != true){
                
                    $where = array(
                    'id_jenis_kegiatan' => $id		
                    );
                $data['jenis_kegiatan'] = $this->M_jenis_kegiatan->edit_jenis_kegiatan($where,'jenis_kegiatan')->result();		
                $this->load->view('admin/jenis_kegiatan_update', $data);
            }
                        
            }
            
}

    function delete_jenis_kegiatan($id){	   
		$where = array(
			'id_jenis_kegiatan' => $id		
		);
		$this->M_jenis_kegiatan->delete_jenis_kegiatan($where,'jenis_kegiatan');		
        $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Berhasil Dihapus!</b></div>');
		redirect(base_url().'jenis_kegiatan');
	}


    function load_user(){
          $data['user']  = $this->db->get_where('jenis_kegiatan', ['username'
            => $this->session->userdata('username')])->row_array();
    }
}

?>