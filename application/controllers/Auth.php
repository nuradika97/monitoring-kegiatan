<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('auth/login', $data);
        } else {
            // jika validasi berhasil
            $this->_login();
        }
    }


    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // cari data di tabel admin berdasarkan username 
        $user = $this->db->get_where('pegawai', ['username' => $username])->row_array();

        // mencari role yang sesuai dalam tabel tim kegiatan
        $tim_kegiatan = $this->db->get_where('tim_kegiatan',['id_pegawai'=> $user['id_pegawai']])->row_array();

        if ($user) {
            // jika password yg diinput sesuai dgn didatabase
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username'   => $user['username'],
                    'id_role'    => $tim_kegiatan['id_role'],
                    'id_pegawai' => $user['id_pegawai'],
                    'nama_pegawai' => $user['nama_pegawai'],

                ];
                // buat sesssion berdsarkan $data
                $this->session->set_userdata($data);
                // if ($user['id_role']==1){
                    redirect('admin');
                // } else {
                //     redirect('user');
                // }
                
            } else {
                // jika password yg diinput tidak sesuai dengan didatabase
                $this->session->set_flashdata('login-failed-1', 'Gagal');
                redirect('auth');
            }
        } else {
            // jika username dan passsword salah
            $this->session->set_flashdata('login-failed-2', 'Gagal');
            redirect('auth');
        }
    }


    public function logout()
    {
        $data = ['username','id_role','id_pegawai'];
        // hapus session
        $this->session->unset_userdata($data);

        // tampilkan flash message
        $this->session->set_flashdata('logout-success', 'Berhasil');
        redirect('auth');
    }
}
