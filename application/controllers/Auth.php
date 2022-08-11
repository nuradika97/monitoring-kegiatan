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

        if ($user) {
            // jika password yg diinput sesuai dgn didatabase
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username'   => $user['username'],
                    'id_role'    => $user['id_role'],
                    'id_jabatan' => $user['id_jabatan'],
                    'id_pegawai' => $user['id_pegawai']
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


    // public function registration()
    // {   
    //     $data['level'] = $this->db->query('SELECT * FROM  level_user')->result();
    //     // set validasi form
    //     $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim|max_length[40]');
    //     $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[6]|max_length[20]|is_unique[pegawai.username]', [
    //         'is_unique' => 'Username has already registered!'
    //     ]);
    //     $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
    //         'matches' => 'Password does not match!',
    //         'min_length' => 'Password to short, min 8 words!'
    //     ]);
    //     $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');

    //     // jika validasi gagal
    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = 'Registration';
    //         $this->load->view('auth/registration', $data);
    //     } else {
    //         // jika validasi benar
    //         $this->registration_act();
    //     }
    // }


    // public function registration_act()
    // {
    //     $data = [
    //         'nama'      => htmlspecialchars($this->input->post('nama')),
    //         'username'  => htmlspecialchars($this->input->post('username')),
    //         'password'  => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
    //         'id_lvl'    => htmlspecialchars($this->input->post('level')),
    //         'profil'    => 'default.png'
    //     ];
    //     $this->db->insert('pegawai', $data);

    //     $this->session->set_flashdata('regist-success', 'Berhasil');
    //     redirect('auth');
    // }


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
