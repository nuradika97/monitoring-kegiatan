<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tim_kegiatan extends CI_Controller {

	function __construct(){
		parent::__construct();
		// cek login
		is_logged_in();
	}

	function index(){
      
        //  $data['user']  = $this->db->get_where('tim', ['username'
        //     => $this->session->userdata('username')])->row_array();
        
        $data['timkeg'] = $this->M_tim_kegiatan->get_tim_kegiatan_all()->result();
     
		$this->load->view('admin/tim_kegiatan_index', $data);
        
	}	

    function tim_kegiatan_add(){   	
            
             $data['timkeg'] = $this->M_tim_kegiatan->get_tim_kegiatan_all()->result();
             $data['tim'] = $this->M_tim->get_tim_all()->result();
             $data['pegawai'] = $this->M_pegawai->get_pegawai_all()->result();
             $data['role'] = $this->M_tim_kegiatan->get_tim_role()->result();
             $this->load->view('admin/tim_kegiatan_add', $data);
        
    }

    function add_tim_kegiatan_act(){
        
        $id_tim = $this->input->post('id_tim');
		$id_pegawai = $this->input->post('id_pegawai');
		$id_role = $this->input->post('id_role');
		
        $cek_knm_tim = ($id_tim.$id_pegawai.$id_role);
        // $cek_knm_db = $this->M_tim_kegiatan->cek_knm_db($cek_knm_tim)->result();

        $this->form_validation->set_rules(
                    'id_tim', 'Nama Tim',
                    'required',
                    array(
                            'required'=> '%s harus dipilih',
                    )
                );
                
                $this->form_validation->set_rules(
                    'id_pegawai', 'Nama Pegawai',
                    'required',
                    array(
                        'required'      => '%s harus dipilih',
                        )
                    );
                    
                    $this->form_validation->set_rules(
                        'id_role', 'Role',
                        'required',
                        array(
                            'required'      => '%s harus dipilih',
                            )
                        );

                        // jika nama kegiatan dan nama pegawai dan role sudah ada maka tidak bisa   
                        
                        if ($cek_knm_tim <> NULL){
                           
                            $query = $this->db->query('SELECT CONCAT(id_tim,id_pegawai,id_role) as tim FROM tim_kegiatan where CONCAT(id_tim, id_pegawai, id_role) LIKE '.$cek_knm_tim.'')->row('tim');
                            
                            if($cek_knm_tim === $query){
                                
                                $data['timkeg'] = $this->M_tim_kegiatan->get_tim_kegiatan_all()->result();
                                $data['role'] = $this->M_tim_kegiatan->get_tim_role()->result();
                                
                                $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Nama dengan Tim Kegiatan dan Role sudah ada!</b></div>');    
                                redirect(base_url().'tim_kegiatan/tim_kegiatan_add');
                            }
                            
                        }
                        if($this->form_validation->run() != false){
                            $data = array(
                                'id_tim' => $id_tim,
                                'id_pegawai' => $id_pegawai,			
                                'id_role' => $id_role		
                            );
                            
                            // var_dump($id_tim);
                            // die();
                            
                            $this->M_tim_kegiatan->insert_tim_kegiatan($data,'tim_kegiatan');
                            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>Data Berhasil Ditambahkan!</b></div>');
                            redirect(base_url().'tim_kegiatan');
                            
                        }else{
                            $data['timkeg'] = $this->M_tim_kegiatan->get_tim_kegiatan_all()->result();
                            $data['tim'] = $this->M_tim->get_tim_all()->result();
                            $data['pegawai'] = $this->M_pegawai->get_pegawai_all()->result();
                            $data['role'] = $this->M_tim_kegiatan->get_tim_role()->result();

                            $this->load->view('admin/tim_kegiatan_add', $data);
                        }
                    }
                        
     function edit_tim_kegiatan($id){				
            $where = array(
                'id_timkeg' => $id		
            );
            $data['timkeg'] = $this->M_tim_kegiatan->edit_tim_kegiatan($id)->result();
            $data['tim'] = $this->M_tim->get_tim_all()->result();
            $data['pegawai'] = $this->M_pegawai->get_pegawai_all()->result();
            $data['role'] = $this->M_tim_kegiatan->get_tim_role()->result();
            // var_dump($data);
            // die();
            $this->load->view('admin/tim_kegiatan_update', $data);
	    }
    // sampai disini
     function update_tim_kegiatan($id){				    
        
       
		$id_tim = $this->input->post('id_tim');
		$id_pegawai = $this->input->post('id_pegawai');
		$id_role = $this->input->post('id_role');

      
        $cek_knm_tim = ($id_tim.$id_pegawai.$id_role);
        // $cek_knm_db = $this->M_tim_kegiatan->cek_knm_db($cek_knm_tim)->result();

        $this->form_validation->set_rules(
                    'id_tim', 'Nama Tim',
                    'required',
                    array(
                            'required'=> '%s harus dipilih',
                    )
                );
                
                $this->form_validation->set_rules(
                    'id_pegawai', 'Nama Pegawai',
                    'required',
                    array(
                        'required'      => '%s harus dipilih',
                        )
                    );
                    
                    $this->form_validation->set_rules(
                        'id_role', 'Role',
                        'required',
                        array(
                            'required'      => '%s harus dipilih',
                            )
                        );
                        if ($cek_knm_tim <> NULL){
                                           
                                            $query = $this->db->query('SELECT CONCAT(id_tim,id_pegawai,id_role) as tim FROM tim_kegiatan where CONCAT(id_tim, id_pegawai, id_role) LIKE '.$cek_knm_tim.'')->row('tim');
                                            
                                            if($cek_knm_tim === $query){
                                                
                                                    // $data['timkeg'] = $this->M_tim_kegiatan->edit_tim_kegiatan($id)->result();
                                                    // $data['tim'] = $this->M_tim->get_tim_all()->result();
                                                    // $data['pegawai'] = $this->M_pegawai->get_pegawai_all()->result();
                                                    // $data['role'] = $this->M_tim_kegiatan->get_tim_role()->result();
                                                
                                                // var_dump($data['timkeg']);
                                                // die();
                                                $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Nama dengan Tim Kegiatan dan Role sudah ada!</b></div>');    
                                                redirect(base_url().'tim_kegiatan/edit_tim_kegiatan/'.$id);
                                            }
                                            
                                        }
                                        
                        if ($this->form_validation->run() != false){
                            
                              $data = array(
                                'id_tim' => $id_tim,
                                'id_pegawai' => $id_pegawai,			
                                'id_role' => $id_role
                            );
                            
                            // var_dump($data);
                            // die();
                            
                            $this->M_tim_kegiatan->update_tim_kegiatan($id, $data, 'tim_kegiatan');
                            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>Data Berhasil diupdate!</b></div>');
                            redirect(base_url().'tim_kegiatan');
                            
                        } else {
                            $where = array(
                                    'id_tim' => $id		
                                    );
                                $data['tim'] = $this->M_tim_kegiatan->edit_tim_kegiatan($where,'tim_kegiatan')->result();
                                $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Tidak ada Perubahan!</b></div>');	
                                $this->load->view('admin/tim_kegiatan_update', $data);
                        }
                                

                    }
            

    function delete_tim_kegiatan($id){	   
		$where = array(
			'id_timkeg' => $id		
		);
		$this->M_tim->delete_tim($where,'tim_kegiatan');		
		redirect(base_url().'tim_kegiatan');
         $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Berhasil Dihapus!</b></div>');
	}


    function load_user(){
          $data['user']  = $this->db->get_where('tim', ['username'
            => $this->session->userdata('username')])->row_array();
    }
}


?>