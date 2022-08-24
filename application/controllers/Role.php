<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

	function __construct(){
		parent::__construct();
		// cek login
		is_logged_in();
	}

	function index(){
      
        //  $data['user']  = $this->db->get_where('role', ['username'
        //     => $this->session->userdata('username')])->row_array();
      
        $data['role'] = $this->M_role->get_role_all()->result();
		$this->load->view('admin/role_index', $data);
        
	}	

    function role_add(){   	
            // $data['user']  = $this->db->get_where('role', ['username'
            // => $this->session->userdata('username')])->row_array();
		/* session dari role kegiatan */
            // $this->load->view('admin/role_add', $data);
            $this->load->view('admin/role_add');
        
    }

    function add_role_act(){
        
		$nama_role = $this->input->post('nama_role');
		
               $this->form_validation->set_rules(
                    'nama_role', 'Nama role',
                    'required|alpha_numeric_spaces|min_length[3]|max_length[100]|is_unique[role.nama_role]',
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
				'nama_role' => $nama_role,			
			);
			$this->M_role->insert_role($data,'role');
            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>Data Berhasil Ditambahkan!</b></div>');
			redirect(base_url().'role');
            
		}else{
            // $data['user']  = $this->db->get_where('role', ['username'
            // => $this->session->userdata('username')])->row_array();
            // $id_role = $this->session->userdata('id_role');
            // $id_role = $this->session->userdata('id_role');
		    $data['role'] = $this->db->query("select * from role order by id_role")->result();

		     $this->load->view('admin/role_add', $data);
          }
        }

     function edit_role($id){				
            $where = array(
                'id_role' => $id		
            );
            $data['role'] = $this->M_role->edit_role($where,'role')->result();		
            
            $this->load->view('admin/role_update', $data);
	    }
    
     function update_role($id){				    
        
       
		$nama_role = $this->input->post('nama_role');

        $where = array(
            'nama_role' => $nama_role
            );
    /* Jika nama role tidak sama dengan yang ada didatabase maka 
    lakukan perubahan jika nama role sama maka validasi nama role sudah ada*/     

    $cek_knm_role = $this->M_role->cek_knm_role('role', $where)->row('nama_role');
        
        if($cek_knm_role == NULL){

               $this->form_validation->set_rules(
               
                'nama_role', 'Nama role',
                'required|alpha|min_length[3]|max_length[100]|is_unique[role.nama_role]',
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
                'id_role' => $id
            );
            $data = array(
                'nama_role' => $nama_role	
            );
            
            $this->M_role->update_role($where,$data,'role');
             $this->session->set_flashdata('message', '<div class="alert alert-success"><b>Data Berhasil Diubah!</b></div>');
            redirect(base_url().'role');
        } else {
            $where = array(
                    'id_role' => $id		
                    );
                $data['role'] = $this->M_role->edit_role($where,'role')->result();
                $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Tidak ada Perubahan!</b></div>');	
                $this->load->view('admin/role_update', $data);
        }
                
        
    } else { 
        
        $this->form_validation->set_rules(
        
        'nama_role', 'Nama role',
        'required|alpha|min_length[3]|max_length[100]|is_unique[role.nama_role]',
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
                    'id_role' => $id		
                    );
                $data['role'] = $this->M_role->edit_role($where,'role')->result();		
                $this->load->view('admin/role_update', $data);
            }
                        
            }
            
}

    function delete_role($id){	   
		$where = array(
			'id_role' => $id		
		);
		$this->M_role->delete_role($where,'role');		
        $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Berhasil Dihapus!</b></div>');
		redirect(base_url().'role');
	}


    function load_user(){
          $data['user']  = $this->db->get_where('role', ['username'
            => $this->session->userdata('username')])->row_array();
    }
}

?>