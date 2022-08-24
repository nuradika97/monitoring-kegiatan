<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends CI_Controller {

	function __construct(){
		parent::__construct();
		// cek login
		is_logged_in();
	}

	function index(){
      
        //  $data['user']  = $this->db->get_where('periode', ['username'
        //     => $this->session->userdata('username')])->row_array();
      
        $data['periode'] = $this->M_periode->get_periode_all()->result();
		$this->load->view('admin/periode_index', $data);
        
	}	

    function periode_add(){   	
            // $data['user']  = $this->db->get_where('periode', ['username'
            // => $this->session->userdata('username')])->row_array();
		/* session dari periode kegiatan */
            // $this->load->view('admin/periode_add', $data);
            $this->load->view('admin/periode_add');
        
    }

    function add_periode_act(){
        
		$nama_periode = $this->input->post('nama_periode');
		
               $this->form_validation->set_rules(
                    'nama_periode', 'Nama periode',
                    'required|alpha_numeric_spaces|min_length[3]|max_length[100]|is_unique[periode.nama_periode]',
                    array(
                            'alpha_numeric_spaces' => '%s harus berupa alpha',
                            'min_length' => '%s minimal 4 Karakter',
                            'max_length' => '%s maksimal 4 karakter',
                            'required'      => '%s harus diisi',
                            'is_unique'     => '%s Ini Sudah Ada'
                    )
            );
           
            if($this->form_validation->run() != false){
			$data = array(
				'nama_periode' => $nama_periode,			
			);
			$this->M_periode->insert_periode($data,'periode');
            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>Data Berhasil Ditambahkan!</b></div>');
			redirect(base_url().'periode');
            
		}else{
            // $data['user']  = $this->db->get_where('periode', ['username'
            // => $this->session->userdata('username')])->row_array();
            // $id_periode = $this->session->userdata('id_periode');
            // $id_role = $this->session->userdata('id_role');
		    $data['periode'] = $this->db->query("select * from periode order by id_periode")->result();

		     $this->load->view('admin/periode_add', $data);
          }
        }

     function edit_periode($id){				
            $where = array(
                'id_periode' => $id		
            );
            $data['periode'] = $this->M_periode->edit_periode($where,'periode')->result();		
            
            $this->load->view('admin/periode_update', $data);
	    }
    
     function update_periode($id){				    
        
       
		$nama_periode = $this->input->post('nama_periode');

        $where = array(
            'nama_periode' => $nama_periode
            );
    /* Jika nama periode tidak sama dengan yang ada didatabase maka 
    lakukan perubahan jika nama periode sama maka validasi nama periode sudah ada*/     

    $cek_knm_periode = $this->M_periode->cek_knm_periode('periode', $where)->row('nama_periode');
        
        if($cek_knm_periode == NULL){

               $this->form_validation->set_rules(
               
                'nama_periode', 'Nama periode',
                'required|alpha|min_length[3]|max_length[100]|is_unique[periode.nama_periode]',
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
                'id_periode' => $id
            );
            $data = array(
                'nama_periode' => $nama_periode	
            );
            
            $this->M_periode->update_periode($where,$data,'periode');
             $this->session->set_flashdata('message', '<div class="alert alert-success"><b>Data Berhasil Diubah!</b></div>');
            redirect(base_url().'periode');
        } else {
            $where = array(
                    'id_periode' => $id		
                    );
                $data['periode'] = $this->M_periode->edit_periode($where,'periode')->result();
                $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Tidak ada Perubahan!</b></div>');	
                $this->load->view('admin/periode_update', $data);
        }
                
        
    } else { 
        
        $this->form_validation->set_rules(
        
        'nama_periode', 'Nama periode',
        'required|alpha|min_length[3]|max_length[100]|is_unique[periode.nama_periode]',
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
                    'id_periode' => $id		
                    );
                $data['periode'] = $this->M_periode->edit_periode($where,'periode')->result();		
                $this->load->view('admin/periode_update', $data);
            }
                        
            }
            
}

    function delete_periode($id){	   
		$where = array(
			'id_periode' => $id		
		);
		$this->M_periode->delete_periode($where,'periode');		
        $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Berhasil Dihapus!</b></div>');
		redirect(base_url().'periode');
	}


    function load_user(){
          $data['user']  = $this->db->get_where('periode', ['username'
            => $this->session->userdata('username')])->row_array();
    }
}

?>