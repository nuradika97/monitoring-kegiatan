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
            $id_jabatan = $this->session->userdata('id_jabatan');
            $data['role'] = $this->db->query('SELECT * FROM role_pegawai WHERE id_role = '.$id_role.'')->row_array(); 
            $data['jabatan'] = $this->db->query('SELECT * FROM jabatan_pegawai WHERE id_jabatan = '.$id_jabatan.'')->row_array(); 
            $data['suratmasuk'] = $this->db->query('SELECT COUNT(id_pegawai) AS jumlah FROM surat_masuk WHERE dispo_kepala = "1" AND id_pegawai = '.$id_pegawai.'')->row_array(); 
            $this->load->view('admin/dashboard', $data);
       
    }



    public function surat_masuk()
    {
        if ($this->session->userdata('id_role')==1 OR $this->session->userdata('id_role')==2 OR $this->session->userdata('id_role')==3 OR $this->session->userdata('id_role')==4){
            $data['title'] = 'Surat Masuk';
            $data['user']  = $this->db->get_where('pegawai', ['username'
            => $this->session->userdata('username')])->row_array(); //untuk topbar
            // $data['pegawai']  = $this->db->get_where('pegawai', ['username'
            // => $this->session->userdata('username')])->result();
            $data['surat'] = $this->db->query('SELECT * FROM surat_masuk, sifat_surat, pegawai, kategori_sm WHERE surat_masuk.id_sifat=sifat_surat.id_sifat AND surat_masuk.id_pegawai=pegawai.id_pegawai AND surat_masuk.id_kategori_sm=kategori_sm.id_kategori_sm')->row_array(); //menampilkan yg pegawai ybs saja
            // $data['artikel'] = $this->db->get('artikel')->result();
            $data['surat_masuk'] = $this->db->query('SELECT * FROM surat_masuk, sifat_surat, pegawai, kategori_sm WHERE surat_masuk.id_sifat=sifat_surat.id_sifat AND surat_masuk.id_pegawai=pegawai.id_pegawai AND surat_masuk.id_kategori_sm=kategori_sm.id_kategori_sm')->result();         
            $this->load->view('admin/surat_masuk', $data);
        } else{
            redirect('admin');
        }
    }

    public function surat_keluar()
    {
        if ($this->session->userdata('id_role')==1 OR $this->session->userdata('id_role')==2 OR $this->session->userdata('id_role')==3){
            $data['title'] = 'Surat Keluar';
            $data['user']  = $this->db->get_where('pegawai', ['username'
            => $this->session->userdata('username')])->row_array(); //untuk topbar
            // $data['artikel'] = $this->db->get('artikel')->result();
            $data['surat_keluar'] = $this->db->query('SELECT * FROM surat_keluar, sifat_surat, indeks_sk, klasifikasi_sk WHERE surat_keluar.id_sifat=sifat_surat.id_sifat AND surat_keluar.id_indeks_sk=indeks_sk.id_indeks_sk AND surat_keluar.id_klasifikasi_sk=klasifikasi_sk.id_klasifikasi_sk')->result();         
            $this->load->view('admin/surat_keluar', $data);
        } else{
            redirect('admin');
        }
    }


    public function add_surat_masuk()
    {
        if ($this->session->userdata('id_role')==1 OR $this->session->userdata('id_role')==2){
            $data['title'] = 'Tambah Data Surat Masuk';
            $data['user']  = $this->db->get_where('pegawai', ['username'
            => $this->session->userdata('username')])->row_array();
            //query untuk memunculkan dropdown (dari tabel lain)
            $data['pegawai'] = $this->db->query('SELECT * FROM  pegawai')->result();
            $data['kasubbag'] = $this->db->get_where('pegawai', ['id_jabatan' => "2"])->row();
            $data['sifat_surat'] = $this->db->query('SELECT * FROM  sifat_surat')->result();
            $data['kategori_sm'] = $this->db->query('SELECT * FROM  kategori_sm')->result();


            // set validasi form
            $this->form_validation->set_rules('tanggalsurat', 'Tanggal Surat', 'required|trim');
            $this->form_validation->set_rules('nosurat', 'Nomor Surat', 'required|trim');

            // jika validasi belum jalan
            if ($this->form_validation->run() == false) {
                $this->load->view('admin/add_surat_masuk', $data);
            } else {
                // jika validasi benar
                $this->add_suratmasuk_act();
            }
        } else{
            redirect('admin');
        }
    }


    public function add_suratmasuk_act()
    {
        if ($this->session->userdata('id_role')==1 OR $this->session->userdata('id_role')==2){
            $data = [
                'id_sifat'      => htmlspecialchars($this->input->post('sifatsurat')),
                'no_sm'         => htmlspecialchars($this->input->post('nosurat')),
                'id_kategori_sm'=> htmlspecialchars($this->input->post('kategorism')),
                'asal_sm'       => htmlspecialchars($this->input->post('asalsurat')),
                'perihal_sm'    => htmlspecialchars($this->input->post('perihalsurat')),
                'tanggal_sm'    => htmlspecialchars($this->input->post('tanggalsurat')),                
                'id_pegawai'      => htmlspecialchars($this->input->post('pegawai')),
                'nama_file'     => $this->upload_sm() //fungsi upload file
                
            ];
            $this->db->insert('surat_masuk', $data);

            $this->session->set_flashdata('add-success', 'Berhasil');
            redirect('admin/surat_masuk');
        } else{
            redirect('admin');
        }
    }

    public function update_suratmasuk($id)
    {
        if ($this->session->userdata('id_role')==1 OR $this->session->userdata('id_role')==2){
            $data['title'] = 'Update Data Surat Masuk';
            $data['user']  = $this->db->get_where('pegawai', ['username'
            => $this->session->userdata('username')])->row_array();
            $data['suratmasuk'] = $this->M_suratmasuk->get_sm_by_id($id)->result();
            $data['kasubbag'] = $this->db->get_where('pegawai', ['id_jabatan' => "2"])->row();
            //query untuk memunculkan dropdown (dari tabel lain)
            $data['kategori_sm'] = $this->db->query('SELECT * FROM  kategori_sm')->result();
            $data['sifat_surat'] = $this->db->query('SELECT * FROM  sifat_surat')->result();

            
            $this->form_validation->set_rules('id', 'Id', 'required|trim');
            $this->form_validation->set_rules('tanggalsurat', 'Tanggal', 'required|trim');


            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/update_suratmasuk', $data);
            } else {
                $this->update_suratmasuk_act();
            }
        } else{
            redirect('admin');
        }
    }

    public function update_suratmasuk_act()
    {
        if ($this->session->userdata('id_role')==1 OR $this->session->userdata('id_role')==2){
            $old_pdfmasuk = $this->input->post('old_pdf');
            // jika file tidak kosong
            if (!empty($_FILES["namafile"]["name"])) {
                // upload file baru
                $pdfmasuk = $this->upload_sm();
                if ($pdfmasuk) {
                    // hapus file lama di folder
                    unlink(FCPATH . 'assets/surat/masuk/' . $old_pdfmasuk);
                }
            } else {
                // upload file lama
                $pdfmasuk =  $old_pdfmasuk;
            }
            
            $id = $this->input->post('id');
            $data = [
                'id_sifat'          => htmlspecialchars($this->input->post('sifatsurat')),
                'no_sm'             => htmlspecialchars($this->input->post('nosurat')),
                'id_kategori_sm'    => htmlspecialchars($this->input->post('kategorism')),
                'asal_sm'           => htmlspecialchars($this->input->post('asalsurat')),
                'perihal_sm'        => htmlspecialchars($this->input->post('perihalsurat')),
                'tanggal_sm'        => htmlspecialchars($this->input->post('tanggalsurat')),
                'id_pegawai'        => htmlspecialchars($this->input->post('pegawai')), 
                'nama_file'          => $pdfmasuk //fungsi upload file                
            ];
            $this->M_suratmasuk->update_sm($id, $data);

            
            $this->session->set_flashdata('update-success', 'Berhasil');
            redirect('admin/surat_masuk');
        } else{
            redirect('admin');
        }
    }

    public function dispo_suratmasuk($id)
    {
        if ($this->session->userdata('id_role')==1 OR $this->session->userdata('id_role')==3){
            $data['title'] = 'Update Data Disposisi';
            $data['user']  = $this->db->get_where('pegawai', ['username'
            => $this->session->userdata('username')])->row_array();
            $data['suratmasuk'] = $this->M_suratmasuk->get_sm_by_id($id)->result();
            //query untuk memunculkan dropdown (dari tabel lain)
            $data['pegawai'] = $this->db->query('SELECT * FROM  pegawai')->result();

            
            $this->form_validation->set_rules('id', 'Id', 'required|trim');


            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/dispo_suratmasuk', $data);
            } else {
                $this->dispo_suratmasuk_act();
            }
        } else{
            redirect('admin');
        }
    }

    public function dispo_suratmasuk_act()
    {
        if ($this->session->userdata('id_role')==1 OR $this->session->userdata('id_role')==3){

            
            $id = $this->input->post('id');
            $data = [
                'dispo_sm'          => htmlspecialchars($this->input->post('disposisi')),
                'dispo_kepala'          => htmlspecialchars($this->input->post('dispokepala')),
                'id_pegawai'             => htmlspecialchars($this->input->post('pegawai')),
                'tanggal_disposisi'    => htmlspecialchars($this->input->post('tanggaldispo')),
                'isi_disposisi'           => htmlspecialchars($this->input->post('isidisposisi'))      
            ];
            $this->M_suratmasuk->update_sm($id, $data);
            
            // Konfigurasi email
            $config = [
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'protocol'  => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_user' => 'reezakrisnautama@gmail.com',  // Email gmail
                'smtp_pass'   => '',  // Password gmail
                'smtp_crypto' => 'ssl',
                'smtp_port'   => 465,
                'crlf'    => "\r\n",
                'newline' => "\r\n"
            ];

            // Load library email dan konfigurasinya
            $this->load->library('email', $config);

            // Email dan nama pengirim
            $this->email->from('reezakrisnautama@gmail.com', 'Admin Lisda BPS Cilegon');

            // Email penerima
            $this->email->to('nuradika.reeza@bps.go.id'); // Ganti dengan email tujuan


            // Subject email
            $this->email->subject('Email Disposisi');

            // Isi email
            $this->email->message("Ini adalah pesan pemberitahuan surat disposisi terbaru ke email Anda.<br><br> Login <strong><a href='https://jawarastatistik.id/lisda/' target='_blank' rel='noopener'>disini</a></strong> untuk melihat detail.");

            // Tampilkan pesan sukses atau error
            if ($this->email->send()) {
                echo 'Sukses! email berhasil dikirim.';
            } else {
                echo 'Error! email tidak dapat dikirim.';
            }
            
            $this->session->set_flashdata('update-success', 'Berhasil');
            redirect('admin/surat_masuk');
        } else{
            redirect('admin');
        }
    }

    public function dispo_email()
    {
      // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'reezakrisnautama@gmail.com',  // Email gmail
            'smtp_pass'   => 'utama motor',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('reezakrisnautama@gmail.com', 'Admin Lisda BPS Cilegon');

        // Email penerima
        $this->email->to('nuradika.reeza@bps.go.id'); // Ganti dengan email tujuan


        // Subject email
        $this->email->subject('Email Disposisi');

        // Isi email
        $this->email->message("Ini adalah pesan pemberitahuan surat disposisi ke email Anda.<br><br> Login <strong><a href='https://jawarastatistik.id/lisda/' target='_blank' rel='noopener'>disini</a></strong> untuk melihat detail.");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
    }

    public function add_surat_keluar()
    {
        if ($this->session->userdata('id_role')==1 OR $this->session->userdata('id_role')==2){
            $data['title'] = 'Tambah Data Surat Keluar';
            $data['user']  = $this->db->get_where('pegawai', ['username'
            => $this->session->userdata('username')])->row_array();
            //query untuk memunculkan dropdown (dari tabel lain)
            $data['sifat_surat'] = $this->db->query('SELECT * FROM  sifat_surat')->result();
            $data['indeks_sk'] = $this->db->query('SELECT * FROM  indeks_sk')->result();
            $data['klasifikasi_sk'] = $this->db->query('SELECT * FROM  klasifikasi_sk')->result();


            // set validasi form
            $this->form_validation->set_rules('tanggalsurat', 'Tanggal Surat', 'required|trim');

            // jika validasi belum jalan
            if ($this->form_validation->run() == false) {
                $this->load->view('admin/add_surat_keluar', $data);
            } else {
                // jika validasi benar
                $this->add_suratkeluar_act();
            }
        } else{
            redirect('admin');
        }
    }


    public function add_suratkeluar_act()
    {
        if ($this->session->userdata('id_role')==1 OR $this->session->userdata('id_role')==2){
            $data = [
                'id_sifat'          => htmlspecialchars($this->input->post('sifatsurat')),
                'tujuan_sk'         => htmlspecialchars($this->input->post('tujuansurat')),
                'perihal_sk'        => htmlspecialchars($this->input->post('perihalsurat')),
                'tanggal_sk'        => htmlspecialchars($this->input->post('tanggalsurat')),
                'id_indeks_sk'      => htmlspecialchars($this->input->post('indeks')),
                'id_klasifikasi_sk' => htmlspecialchars($this->input->post('klasifikasi')),
                'no_sk'             => htmlspecialchars($this->input->post('nosurat')),
                'nama_file'         => $this->upload_sk() //fungsi upload file
                
            ];
            $this->db->insert('surat_keluar', $data);

            $this->session->set_flashdata('add-success', 'Berhasil');
            redirect('admin/surat_keluar');
        } else{
            redirect('admin');
        }
    }

    public function update_suratkeluar($id)
    {
        if ($this->session->userdata('id_role')==1 OR $this->session->userdata('id_role')==2){
            $data['title'] = 'Update Data Surat Keluar';
            $data['user']  = $this->db->get_where('pegawai', ['username'
            => $this->session->userdata('username')])->row_array();
            $data['suratkeluar'] = $this->M_suratkeluar->get_sk_by_id($id)->result();
            //query untuk memunculkan dropdown (dari tabel lain)
            $data['klasifikasi_sk'] = $this->db->query('SELECT * FROM  klasifikasi_sk')->result();
            $data['indeks_sk'] = $this->db->query('SELECT * FROM  indeks_sk')->result();
            $data['sifat_surat'] = $this->db->query('SELECT * FROM  sifat_surat')->result();

            
            $this->form_validation->set_rules('id', 'Id', 'required|trim');
            $this->form_validation->set_rules('tanggalsurat', 'Tanggal', 'required|trim');


            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/update_suratkeluar', $data);
            } else {
                $this->update_suratkeluar_act();
            }
        } else{
            redirect('admin');
        }
    }

    public function update_suratkeluar_act()
    {
        if ($this->session->userdata('id_role')==1 OR $this->session->userdata('id_role')==2){
            $old_pdfkeluar = $this->input->post('old_pdf');
            // jika file tidak kosong
            if (!empty($_FILES["namafile"]["name"])) {
                // upload file baru
                $pdfkeluar = $this->upload_sm();
                if ($pdfkeluar) {
                    // hapus file lama di folder
                    unlink(FCPATH . 'assets/surat/keluar/' . $old_pdfkeluar);
                }
            } else {
                // upload file lama
                $pdfkeluar =  $old_pdfkeluar;
            }
            
            $id = $this->input->post('id');
            $data = [
                'id_sifat'          => htmlspecialchars($this->input->post('sifatsurat')),
                'tujuan_sk'         => htmlspecialchars($this->input->post('tujuansurat')),
                'perihal_sk'        => htmlspecialchars($this->input->post('perihalsurat')),
                'tanggal_sk'        => htmlspecialchars($this->input->post('tanggalsurat')),
                'id_indeks_sk'      => htmlspecialchars($this->input->post('indeks')),
                'id_klasifikasi_sk' => htmlspecialchars($this->input->post('klasifikasi')),
                'no_sk'             => htmlspecialchars($this->input->post('nosurat')),
                'nama_file'         => $pdfkeluar //fungsi upload file                
            ];
            $this->M_suratkeluar->update_sk($id, $data);

            
            $this->session->set_flashdata('update-success', 'Berhasil');
            redirect('admin/surat_keluar');
        } else{
            redirect('admin');
        }
    }



   
    public function upload_sm()
    {
        if ($this->session->userdata('id_role')==1 OR $this->session->userdata('id_role')==2){
            $id = $this->input->post('id');
            // konfigurasi upload file
            
            $config['upload_path']      = './assets/surat/masuk/';
            $config['allowed_types']    = 'pdf';
            $config['filename']         = $_FILES['namafile']['name'];
            $config['max_size']         = 16384;        

            $this->upload->initialize($config);
            if ($this->upload->do_upload('namafile')) {
                $data_upload = $this->upload->data(); //untuk memasukkan nama file (diresize ketika sudah selesai upload)
                                
                // upload foto baru
                return $data_upload['file_name'];
            }
        } else{
            redirect('admin');
        }
    }

    public function upload_sk()
    {
        if ($this->session->userdata('id_role')==1 OR $this->session->userdata('id_role')==2){
            $id = $this->input->post('id');
            // konfigurasi upload file
            
            $config['upload_path']      = './assets/surat/keluar/';
            $config['allowed_types']    = 'pdf';
            $config['filename']         = $_FILES['namafile']['name'];
            $config['max_size']         = 16384;        

            $this->upload->initialize($config);
            if ($this->upload->do_upload('namafile')) {
                $data_upload = $this->upload->data(); //untuk memasukkan nama file (diresize ketika sudah selesai upload)
                                
                // upload foto baru
                return $data_upload['file_name'];
            }
        } else{
            redirect('admin');
        }
    }



    public function delete_suratmasuk($id)
    {
        if ($this->session->userdata('id_role')==1 OR $this->session->userdata('id_role')==2){
            // ambil gambar berdasarkan id
            $get_suratmasuk = $this->db->get_where('surat_masuk', ['id_sm' => $id])->row();
            $query = $this->M_suratmasuk->delete_sm($id);
            if ($query) {
                //hapus file pdf pada folder
                if ($get_suratmasuk->nama_file!=''){
                    unlink(FCPATH . 'assets/surat/masuk/' . $get_suratmasuk->nama_file);
                }
                     
                redirect('admin/surat_masuk');
            }

        } else{
            redirect('admin');
        }
    }

    public function delete_suratkeluar($id)
    {
        if ($this->session->userdata('id_role')==1 OR $this->session->userdata('id_role')==2){
            // ambil gambar berdasarkan id
            $get_suratkeluar = $this->db->get_where('surat_keluar', ['id_sk' => $id])->row();
            $query = $this->M_suratkeluar->delete_sk($id);
            if ($query) {
                //hapus file pdf pada folder
                if ($get_suratkeluar->nama_file!=''){
                    unlink(FCPATH . 'assets/surat/keluar/' . $get_suratkeluar->nama_file);
                }
                     
                redirect('admin/surat_keluar');
            }

        } else{
            redirect('admin');
        }
    }

   
    public function pengguna()
    {
        if ($this->session->userdata('id_role')==1){
            $data['title'] = 'Data Pengguna';
            $data['user']  = $this->db->get_where('pegawai', ['username'
            => $this->session->userdata('username')])->row_array();
            // $data['artikel'] = $this->db->get('artikel')->result();
            $data['pengguna'] = $this->db->query('SELECT * FROM pegawai, role_pegawai, jabatan_pegawai WHERE pegawai.id_role=role_pegawai.id_role AND pegawai.id_jabatan=jabatan_pegawai.id_jabatan')->result(); 
            $this->load->view('admin/pengguna', $data);

        } else{
            redirect('admin');
        }
    }

    public function add_pengguna()
    {
        if ($this->session->userdata('id_role')==1){
            $data['title'] = 'Tambah Data Pengguna';
            $data['role'] = $this->db->query('SELECT * FROM  role_pegawai')->result();
            $data['jabatan'] = $this->db->query('SELECT * FROM  jabatan_pegawai')->result();
            $data['user']  = $this->db->get_where('pegawai', ['username'
            => $this->session->userdata('username')])->row_array();
            // set validasi form
            $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim|max_length[40]');
            $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]|max_length[20]|is_unique[pegawai.username]', [
                'is_unique' => 'Username has already registered!'
            ]);
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
                'matches' => 'Password does not match!',
                'min_length' => 'Password to short, min 6 characters!'
            ]);
            $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');

            // jika validasi gagal
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Tambah Data Pengguna';
                $this->load->view('admin/add_pengguna', $data);
            } else {
                // jika validasi benar
                $this->add_pengguna_act();
            }

        } else{
            redirect('admin');
        }
    }


    public function add_pengguna_act()
    {
        if ($this->session->userdata('id_role')==1){
            $data = [
                'id_role'    => htmlspecialchars($this->input->post('role')),
                'id_jabatan'    => htmlspecialchars($this->input->post('jabatan')),
                'nama_pegawai'  => htmlspecialchars($this->input->post('nama')),
                'username'  => htmlspecialchars($this->input->post('username')),
                'password'  => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
            ];
            $this->db->insert('pegawai', $data);

            $this->session->set_flashdata('regist-success', 'Berhasil');
            redirect('admin/pengguna');

        } else{
            redirect('admin');
        }
    }

    public function update_pengguna($id)
    {
        if ($this->session->userdata('id_role')==1){
            $data['title'] = 'Update Data Pengguna';
            $data['role'] = $this->db->query('SELECT * FROM  role_pegawai')->result();
            $data['jabatan'] = $this->db->query('SELECT * FROM  jabatan_pegawai')->result();
            $data['user']  = $this->db->get_where('pegawai', ['username'
            => $this->session->userdata('username')])->row_array();
            $data['pengguna'] = $this->M_pengguna->get_pengguna_by_id($id)->result();

            //mengambil username untuk mengecek username unique tanpa error ketika tidak diganti (yg sebelumnya dianggap sudah ada username tsb. sehingga tidak tersimpan)
            $original_username = $this->M_pengguna->get_pengguna_by_id($id)->row()->username;
            //mengecek kesamaan hasil dari isian username dengan yang ada di database
            if($this->input->post('username') != $original_username) {
               $is_unique =  '|is_unique[pegawai.username]';
            } else {
               $is_unique =  '';
            }
            // set validasi form
            $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim|max_length[40]');
            $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]|max_length[25]'.$is_unique, [
                'is_unique' => 'Username has already registered!'
            ]);
            if(!empty($this->input->post('password1'))){ //mengabaikan jika password kosong
                $this->form_validation->set_rules('password1', 'Password', 'trim|min_length[6]|matches[password2]', [
                    'matches' => 'Kedua password tidak cocok!',
                    'min_length' => 'Password terlalu pendek, min 6 karakter!'
                ]);
                $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|matches[password1]');
            }

            // jika validasi gagal
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Update Data Pengguna';
                $this->load->view('admin/update_pengguna', $data);
            } else {
                // jika validasi benar
                $this->update_pengguna_act();
            }

        } else{
            redirect('admin');
        }
    }

    public function update_pengguna_act()
    {
        if ($this->session->userdata('id_role')==1){
            $id = $this->input->post('id_pegawai');        
            $data = [                
                'id_role'    => htmlspecialchars($this->input->post('role')),
                'id_jabatan'    => htmlspecialchars($this->input->post('jabatan')),
                'nama_pegawai'  => htmlspecialchars($this->input->post('nama')),
                'username'  => htmlspecialchars($this->input->post('username'))
            ];
            if(!empty($this->input->post('password1'))){
                $data['password'] = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            }
            $this->M_pengguna->update_pengguna($id, $data);

            $this->session->set_flashdata('update-success', 'Berhasil');
            redirect('admin/pengguna');

        } else{
            redirect('admin');
        }
    }

    public function delete_pengguna($id)
    {
        if ($this->session->userdata('id_role')==1){
            // delete pengguna berdasarkan id
            $query = $this->M_pengguna->delete_pengguna($id);
            redirect('admin/pengguna');

        } else{
            redirect('admin');
        }
    }

    public function akun()
    {
        // if ($this->session->userdata('id_role')==1){
            $data['title'] = 'Update Data Akun';
            $data['user']  = $this->db->get_where('pegawai', ['username'
            => $this->session->userdata('username')])->row_array();
            //mengecek jika password kosong tidak masalah

            // set validasi form
            $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim|max_length[40]');
            if(!empty($this->input->post('password1'))){ //mengabaikan jika password kosong
                $this->form_validation->set_rules('password1', 'Password', 'trim|min_length[6]|matches[password2]', [
                    'matches' => 'Kedua password tidak cocok!',
                    'min_length' => 'Password terlalu pendek, min 6 karakter!'
                ]);
                $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|matches[password1]');
            }

            // jika validasi gagal
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Update Data Akun';
                $this->load->view('admin/akun', $data);
            } else {
                // jika validasi benar
                $this->update_akun();
            }

        // } else{
        //     redirect('user');
        // }
    }

    public function update_akun()
    {
        // if ($this->session->userdata('id_role')==1){
            $id = $this->input->post('id_pegawai');        
            $data = [
                'username'  => htmlspecialchars($this->input->post('username')),
                'profil'    => 'default.png'
            ];
            if(!empty($this->input->post('password1'))){
                $data['password'] = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            }
            $this->M_pengguna->update_akun($id, $data);

            $this->session->set_flashdata('update-success', 'Berhasil');
            redirect('admin/akun');

        // } else{
        //     redirect('user');
        // }
    }

}
