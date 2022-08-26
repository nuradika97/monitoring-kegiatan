<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Controller {

	function __construct(){
		parent::__construct();
		// cek login
		is_logged_in();
	}

	function index(){
      
        //  $data['user']  = $this->db->get_where('satuan', ['username'
        //     => $this->session->userdata('username')])->row_array();
      
        $data['satuan'] = $this->M_satuan->get_satuan_all()->result();
		$this->load->view('admin/satuan_index', $data);
        
	}	

    function satuan_add(){   	
            // $data['user']  = $this->db->get_where('satuan', ['username'
            // => $this->session->userdata('username')])->row_array();
		/* session dari satuan kegiatan */
            // $this->load->view('admin/satuan_add', $data);
            $this->load->view('admin/satuan_add');
        
    }

    function add_satuan_act(){
        
		$nama_satuan = $this->input->post('nama_satuan');
		
               $this->form_validation->set_rules(
                    'nama_satuan', 'Nama satuan',
                    'required|min_length[3]|max_length[100]|is_unique[satuan.nama_satuan]',
                    array(
                            'min_length' => '%s minimal 4 Karakter',
                            'max_length' => '%s maksimal 4 karakter',
                            'required'      => '%s harus diisi',
                            'is_unique'     => '%s Ini Sudah Ada'
                    )
            );
           
            if($this->form_validation->run() != false){
			$data = array(
				'nama_satuan' => $nama_satuan,			
			);
			$this->M_satuan->insert_satuan($data,'satuan');
            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>Data Berhasil Ditambahkan!</b></div>');
			redirect(base_url().'satuan');
            
		}else{
            // $data['user']  = $this->db->get_where('satuan', ['username'
            // => $this->session->userdata('username')])->row_array();
            // $id_satuan = $this->session->userdata('id_satuan');
            // $id_role = $this->session->userdata('id_role');
		    $data['satuan'] = $this->db->query("select * from satuan order by id_satuan")->result();

		     $this->load->view('admin/satuan_add', $data);
          }
        }

     function edit_satuan($id){				
            $where = array(
                'id_satuan' => $id		
            );
            $data['satuan'] = $this->M_satuan->edit_satuan($where,'satuan')->result();		
            
            $this->load->view('admin/satuan_update', $data);
	    }
    
     function update_satuan($id){				    
        
       
		$nama_satuan = $this->input->post('nama_satuan');

        $where = array(
            'nama_satuan' => $nama_satuan
            );
    /* Jika nama satuan tidak sama dengan yang ada didatabase maka 
    lakukan perubahan jika nama satuan sama maka validasi nama satuan sudah ada*/     

    $cek_knm_satuan = $this->M_satuan->cek_knm_satuan('satuan', $where)->row('nama_satuan');
        
        if($cek_knm_satuan == NULL){

               $this->form_validation->set_rules(
               
                'nama_satuan', 'Nama satuan',
                'required|alpha|min_length[3]|max_length[100]|is_unique[satuan.nama_satuan]',
                array(
                    'alpha' => '%s Harus huruf ',
                    'min_length' => '%s minimal 4 Karakter',
                    'max_length' => '%s maksimal 4 karakter',
                    'required'      => '%s harus diisi',
                    'is_unique'     => '%s Ini Sudah Ada'
                    )
                );

        if ($this->form_validation->run() != false){
            
            $where = array(
                'id_satuan' => $id
            );
            $data = array(
                'nama_satuan' => $nama_satuan	
            );
            
            $this->M_satuan->update_satuan($where,$data,'satuan');
             $this->session->set_flashdata('message', '<div class="alert alert-success"><b>Data Berhasil Diubah!</b></div>');
            redirect(base_url().'satuan');
        } else {
            $where = array(
                    'id_satuan' => $id		
                    );
                $data['satuan'] = $this->M_satuan->edit_satuan($where,'satuan')->result();
                $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Tidak ada Perubahan!</b></div>');	
                $this->load->view('admin/satuan_update', $data);
        }
                
        
    } else { 
        
        $this->form_validation->set_rules(
        
        'nama_satuan', 'Nama satuan',
        'required|alpha|min_length[3]|max_length[100]|is_unique[satuan.nama_satuan]',
                array(
                    'alpha' => '%s harus berupa alpha',
                    'min_length' => '%s minimal 4 Karakter',
                    'max_length' => '%s maksimal 4 karakter',
                    'required'      => '%s harus diisi',
                    'is_unique'     => '%s Ini Sudah Ada'
                    )
                );

                if ($this->form_validation->run() != true){
                
                    $where = array(
                    'id_satuan' => $id		
                    );
                $data['satuan'] = $this->M_satuan->edit_satuan($where,'satuan')->result();		
                $this->load->view('admin/satuan_update', $data);
            }
                        
            }
            
}

    function delete_satuan($id){	   
		$where = array(
			'id_satuan' => $id		
		);
		$this->M_satuan->delete_satuan($where,'satuan');		
        $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Berhasil Dihapus!</b></div>');
		redirect(base_url().'satuan');
	}


    function load_user(){
          $data['user']  = $this->db->get_where('satuan', ['username'
            => $this->session->userdata('username')])->row_array();
    }
}

?>