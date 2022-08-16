<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // jalankan helper
        is_logged_in();
        $this->load->library(array('upload'));
    }


    public function index()
    {
        
            $data['title'] = 'Dashboard';
            $data['user']  = $this->db->get_where('pegawai', ['username'
            => $this->session->userdata('username')])->row_array();
            $id_pegawai = $this->session->userdata('id_pegawai');
            $id_role = $this->session->userdata('id_role');
            $data['role'] = $this->db->query('SELECT * FROM role WHERE id_role = '.$id_role.'')->row_array(); 
            $this->load->view('admin/dashboard', $data);
       
    }



}
