<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tim extends CI_Controller {

	function __construct(){
		parent::__construct();
		// cek login
		is_logged_in();
	}

	function index(){
      
        //  $data['user']  = $this->db->get_where('tim', ['username'
        //     => $this->session->userdata('username')])->row_array();
      
        $data['tim'] = $this->M_tim->get_tim_all()->result();
		$this->load->view('admin/tim_index', $data);
        
	}	

    function tim_add(){   	
            // $data['user']  = $this->db->get_where('tim', ['username'
            // => $this->session->userdata('username')])->row_array();
		/* session dari tim kegiatan */
            // $this->load->view('admin/tim_add', $data);
            $this->load->view('admin/tim_add');
        
    }

    function add_tim_act(){
        
        $kode_tim = $this->input->post('kode_tim');
		$nama_tim = $this->input->post('nama_tim');
		
      
             $this->form_validation->set_rules(
                    'kode_tim', 'Kode Tim',
                    'required|exact_length[4]|is_unique[tim.kode_tim]',
                    array(
                            'exact_length[4]' => '%s minimal 4 Angka',
                            'required'      => '%s harus diisi',
                            'is_unique'     => '%s Ini Sudah Ada'
                    )
            );

               $this->form_validation->set_rules(
                    'nama_tim', 'Nama Tim',
                    'required|alpha_numeric_spaces|min_length[3]|max_length[100]|is_unique[tim.nama_tim]',
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
				'kode_tim' => $kode_tim,
				'nama_tim' => $nama_tim,			
			);
			$this->M_tim->insert_tim($data,'tim');
            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>Data Berhasil Ditambahkan!</b></div>');
			redirect(base_url().'tim');
            
		}else{
            // $data['user']  = $this->db->get_where('tim', ['username'
            // => $this->session->userdata('username')])->row_array();
            // $id_tim = $this->session->userdata('id_tim');
            // $id_role = $this->session->userdata('id_role');
		    $data['tim'] = $this->db->query("select * from tim order by id_tim")->result();

		     $this->load->view('admin/tim_add', $data);
          }
        }

     function edit_tim($id){				
            $where = array(
                'id_tim' => $id		
            );
            $data['tim'] = $this->M_tim->edit_tim($where,'tim')->result();		
            
            $this->load->view('admin/tim_update', $data);
	    }
    
     function update_tim($id){				    
        
       
		$nama_tim = $this->input->post('nama_tim');

        $where = array(
            'nama_tim' => $nama_tim
            );
    /* Jika nama tim tidak sama dengan yang ada didatabase maka 
    lakukan perubahan jika nama tim sama maka validasi nama tim sudah ada*/     

    $cek_knm_tim = $this->M_tim->cek_knm_tim('tim', $where)->row('nama_tim');
        
        if($cek_knm_tim == NULL){

               $this->form_validation->set_rules(
               
                'nama_tim', 'Nama Tim',
                'required|alpha_spaces|min_length[3]|max_length[100]|is_unique[tim.nama_tim]',
                array(
                    'alpha_spaces' => '%s Harus huruf ',
                    'min_length' => '%s minimal 4 Karakter',
                    'max_length' => '%s maksimal 4 karakter',
                    'required'      => '%s harus diisi',
                    'is_unique'     => '%s Ini Sudah Ada'
                    )
                );

        if ($this->form_validation->run() != false){
            
            $where = array(
                'id_tim' => $id
            );
            $data = array(
                'nama_tim' => $nama_tim	
            );
            
            $this->M_tim->update_tim($where,$data,'tim');
             $this->session->set_flashdata('message', '<div class="alert alert-success"><b>Data Berhasil Diubah!</b></div>');
            redirect(base_url().'tim');
        } else {
            $where = array(
                    'id_tim' => $id		
                    );
                $data['tim'] = $this->M_tim->edit_tim($where,'tim')->result();
                $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Tidak ada Perubahan!</b></div>');	
                $this->load->view('admin/tim_update', $data);
        }
                
        
    } else { 
        
        $this->form_validation->set_rules(
        
        'nama_tim', 'Nama Tim',
        'required|alpha|min_length[3]|max_length[100]|is_unique[tim.nama_tim]',
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
                    'id_tim' => $id		
                    );
                $data['tim'] = $this->M_tim->edit_tim($where,'tim')->result();		
                $this->load->view('admin/tim_update', $data);
            }
                        
            }
            
}

    function delete_tim($id){	   
		$where = array(
			'id_tim' => $id		
		);
		$this->M_tim->delete_tim($where,'tim');		
		redirect(base_url().'tim');
         $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Berhasil Dihapus!</b></div>');
	}


    function load_user(){
          $data['user']  = $this->db->get_where('tim', ['username'
            => $this->session->userdata('username')])->row_array();
    }
}

?>