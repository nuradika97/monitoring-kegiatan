<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satker extends CI_Controller {

	function __construct(){
		parent::__construct();
		// cek login
		is_logged_in();
	}

	function index(){
      
        //  $data['user']  = $this->db->get_where('satker', ['username'
        //     => $this->session->userdata('username')])->row_array();
      
        $data['satker'] = $this->M_satker->get_satker_all()->result();
		$this->load->view('admin/satker_index', $data);
        
	}	

    function satker_add(){   	
            // $data['user']  = $this->db->get_where('satker', ['username'
            // => $this->session->userdata('username')])->row_array();
		/* session dari satker kegiatan */
            // $this->load->view('admin/satker_add', $data);
            $this->load->view('admin/satker_add');
        
    }

    function add_satker_act(){
        
        $kode_satker = $this->input->post('kode_satker');
		$nama_satker = $this->input->post('nama_satker');
		
      
             $this->form_validation->set_rules(
                    'kode_satker', 'Kode satker',
                    'required|exact_length[4]|is_unique[satker.kode_satker]',
                    array(
                            'exact_length[4]' => '%s minimal 4 Angka',
                            'required'      => '%s harus diisi',
                            'is_unique'     => '%s Ini Sudah Ada'
                    )
            );

               $this->form_validation->set_rules(
                    'nama_satker', 'Nama satker',
                    'required|min_length[3]|max_length[100]|is_unique[satker.nama_satker]',
                    array(
                            'min_length' => '%s minimal 4 Karakter',
                            'max_length' => '%s maksimal 4 karakter',
                            'required'      => '%s harus diisi',
                            'is_unique'     => '%s Ini Sudah Ada'
                    )
            );
           
            if($this->form_validation->run() != false){
			$data = array(
				'kode_satker' => $kode_satker,
				'nama_satker' => $nama_satker,			
			);
			$this->M_satker->insert_satker($data,'satker');
            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>Data Berhasil Ditambahkan!</b></div>');
			redirect(base_url().'satker');
            
		}else{
            // $data['user']  = $this->db->get_where('satker', ['username'
            // => $this->session->userdata('username')])->row_array();
            // $id_satker = $this->session->userdata('id_satker');
            // $id_role = $this->session->userdata('id_role');
		    $data['satker'] = $this->db->query("select * from satker order by id_satker")->result();

		     $this->load->view('admin/satker_add', $data);
          }
        }

     function edit_satker($id){				
            $where = array(
                'id_satker' => $id		
            );
            $data['satker'] = $this->M_satker->edit_satker($where,'satker')->result();		
            
            $this->load->view('admin/satker_update', $data);
	    }
    
     function update_satker($id){				    
        
       
		$nama_satker = $this->input->post('nama_satker');

        $where = array(
            'nama_satker' => $nama_satker
            );
    /* Jika nama satker tidak sama dengan yang ada didatabase maka 
    lakukan perubahan jika nama satker sama maka validasi nama satker sudah ada*/     

    $cek_knm_satker = $this->M_satker->cek_knm_satker('satker', $where)->row('nama_satker');
        
        if($cek_knm_satker == NULL){

               $this->form_validation->set_rules(
               
                'nama_satker', 'Nama satker',
                'required|min_length[3]|max_length[100]|is_unique[satker.nama_satker]',
                array(
                    'min_length' => '%s minimal 4 Karakter',
                    'max_length' => '%s maksimal 4 karakter',
                    'required'      => '%s harus diisi',
                    'is_unique'     => '%s Ini Sudah Ada'
                    )
                );

        if ($this->form_validation->run() != false){
            
            $where = array(
                'id_satker' => $id
            );
            $data = array(
                'nama_satker' => $nama_satker	
            );
            
            $this->M_satker->update_satker($where,$data,'satker');
             $this->session->set_flashdata('message', '<div class="alert alert-success"><b>Data Berhasil Diubah!</b></div>');
            redirect(base_url().'satker');
        } else {
            $where = array(
                    'id_satker' => $id		
                    );
                $data['satker'] = $this->M_satker->edit_satker($where,'satker')->result();
                $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Tidak ada Perubahan!</b></div>');	
                $this->load->view('admin/satker_update', $data);
        }
                
        
    } else { 
        
        $this->form_validation->set_rules(
        
        'nama_satker', 'Nama satker',
        'required|min_length[3]|max_length[100]|is_unique[satker.nama_satker]',
                array(
                    'min_length' => '%s minimal 4 Karakter',
                    'max_length' => '%s maksimal 4 karakter',
                    'required'      => '%s harus diisi',
                    'is_unique'     => '%s Ini Sudah Ada'
                    )
                );

                if ($this->form_validation->run() != true){
                
                    $where = array(
                    'id_satker' => $id		
                    );
                $data['satker'] = $this->M_satker->edit_satker($where,'satker')->result();		
                $this->load->view('admin/satker_update', $data);
            }
                        
            }
            
}

    function delete_satker($id){	   
		$where = array(
			'id_satker' => $id		
		);
		$this->M_satker->delete_satker($where,'satker');		
        $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Berhasil Dihapus!</b></div>');
		redirect(base_url().'satker');
	}


    function load_user(){
          $data['user']  = $this->db->get_where('satker', ['username'
            => $this->session->userdata('username')])->row_array();
    }
}

?>