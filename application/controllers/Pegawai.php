<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	function __construct(){
		parent::__construct();
		// cek login
		is_logged_in();
	}

	function index(){
      
        //  $data['user']  = $this->db->get_where('pegawai', ['username'
        //     => $this->session->userdata('username')])->row_array();
      
	
        $data['pegawai'] = $this->M_pegawai->get_pegawai_all()->result();
		$this->load->view('admin/pegawai', $data);
        
	}	

    function add_pegawai(){   	
            $data['user']  = $this->db->get_where('pegawai', ['username'
            => $this->session->userdata('username')])->row_array();
		
            $this->load->view('admin/add_pegawai', $data);
        
    }

    function add_pegawai_act(){
        
        $nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
        $password1 = $this->input->post('password1');
        $password2 = $this->input->post('password2');

      
            $this->form_validation->set_rules('nama','Nama Lengkap','required');

             $this->form_validation->set_rules(
                    'email', 'Email',
                    'required|valid_email|is_unique[pegawai.email]',
                    array(
                            'min_length' => '%s minimal 5 karakter',
                            'max_length' => '%s maksimal 12 karakter',
                            'required'      => '%s harus diisi',
                            'is_unique'     => '%s Ini Sudah Ada'
                    )
            );

            $this->form_validation->set_rules(
                    'username', 'Username',
                    'required|min_length[4]|max_length[12]|is_unique[pegawai.username]',
                    array(
                            'min_length' => '%s minimal 4 karakter',
                            'max_length' => '%s maksimal 12 karakter',
                            'required'      => '%s harus diisi',
                            'is_unique'     => '%s Ini Sudah Ada'
                    )
            );

            $this->form_validation->set_rules('password1','Password','required|trim|min_length[5]');
             array(
                            'min_length' => '%s minimal 5 karakter',
                            'required'      => '%s harus diisi',
             );

            $this->form_validation->set_rules('password2','Password', 'required|trim|min_length[5]|matches[password1]', 
            array(
                'required' => '%s harus diisi',
                'matches' => 'Konfirmasi %s tidak sama',
                'min_length' => '%s minimal 5 karakter'
            )
            );
           
            if($this->form_validation->run() != false){
			$data = array(
				'nama_pegawai' => $nama,
				'username' => $username,			
				'email' => $email,			
				'password' => md5($password1)
			);
			$this->M_pegawai->insert_pegawai($data,'pegawai');

			redirect(base_url().'pegawai');
            
		}else{
            $data['user']  = $this->db->get_where('pegawai', ['username'
            => $this->session->userdata('username')])->row_array();
            $id_pegawai = $this->session->userdata('id_pegawai');
            $id_role = $this->session->userdata('id_role');
		    $data['pegawai'] = $this->db->query("select * from pegawai order by id_pegawai")->result();

		     $this->load->view('admin/add_pegawai', $data);
          }
        }

     function edit_pegawai($id){				
            $where = array(
                'id_pegawai' => $id		
            );
            $data['pegawai'] = $this->M_pegawai->edit_pegawai($where,'pegawai')->result();		
            
            $this->load->view('admin/update_pegawai', $data);
	    }
    
     function update_pegawai($id){				
        
       
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
                            'min_length' => '%s minimal 4 karakter',
                            'max_length' => '%s maksimal 12 karakter',
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

          /*   $this->form_validation->set_rules('password1','Password','required|trim|min_length[5]');
             array(
                            'required' => '%s harus diisi',
                            'min_length' => '%s minimal 6 karakter',
                            'required'      => '%s harus diisi',
             );

            $this->form_validation->set_rules('password2','Password', 'required|trim|min_length[5]|matches[password1]', 
            array(
                'required' => '%s harus diisi',
                'matches' => 'Konfirmasi %s tidak sama',
                'min_length' => '%s minimal 6 karakter'
            )
            ); */
           
          

            if ($this->form_validation->run() != false) {
		
            if ($password1 != NULL) {

                $data = array(
                    'nama_pegawai' => $nama,
                    'username' => $username,			
                    'email' => $email,			
                    'password' => Hash::make($password1)
                );
            } else {
                  $data = array(
                    'nama_pegawai' => $nama,
                    'username' => $username,			
                    'email' => $email			
                  );
            }          
            // var_dump($data);
            // die();
            $where = array(
                'id_pegawai' => $id		
            );
			$this->M_pegawai->update_pegawai($where,$data,'pegawai');

			redirect(base_url().'pegawai');
            
		} else {
       
            $where = array(
                'id_pegawai' => $id		
            );
		   $data['pegawai'] = $this->M_pegawai->edit_pegawai($where,'pegawai')->result();		
		     $this->load->view('admin/update_pegawai', $data);
          }
        }

    function delete_pegawai($id){	   
		$where = array(
			'id_pegawai' => $id		
		);
		$this->M_pegawai->delete_pegawai($where,'pegawai');		
		redirect(base_url().'pegawai');
	}


    function load_user(){
          $data['user']  = $this->db->get_where('pegawai', ['username'
            => $this->session->userdata('username')])->row_array();
    }

}
?>