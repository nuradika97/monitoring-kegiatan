<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_kegiatan extends CI_Controller {

	function __construct(){
		parent::__construct();
		// cek login
		is_logged_in();
	}

	function index($id){

        // var_dump($id);
        // die();
        if($id != ''){
            $data['kegiatan'] = $this->M_kegiatan->get_kegiatan_by_id($id)->result();
        }else{
            $data['kegiatan'] = $this->M_kegiatan->get_kegiatan_by_id()->result();
        }
        $data['ketuatim'] = $this->M_detail_kegiatan->get_ketua_tim($id)->result();
        // var_dump($data['ketuatim']);
        // die();
        $data['detail_kegiatan'] = $this->M_detail_kegiatan->get_detail_kegiatan_all()->result();
        // $data['detail_kegiatan'] = $this->M_detail_kegiatan->get_detail_kegiatan_all()->result();
		$this->load->view('admin/detail_kegiatan_index', $data);
        
	}	

    function detail_kegiatan_add($id){   	
        $data['tim'] = $this->M_tim->get_tim_all()->result();
        $data['periode'] = $this->M_periode->get_periode_all()->result();
        $data['satuan'] = $this->M_satuan->get_satuan_all()->result();
        $data['jenis_kegiatan'] = $this->M_jenis_kegiatan->get_jenis_kegiatan_all()->result();
        $data['satker'] = $this->M_satker->get_satker_all()->result();
        $data['kegiatan'] = $this->M_kegiatan->get_kegiatan_by_id($id)->result();
        $data['id_kegiatan'] = $id;
        // var_dump($data['id']);
        // die();
        // $data['detail_kegiatan'] = $this->M_detail_kegiatan->get_detail_kegiatan_sum($id)->result();
        $this->load->view('admin/detail_kegiatan_add', $data);
        
    }

    function alokasi_satker($id){      
        $data['tim'] = $this->M_tim->get_tim_all()->result();
        $data['periode'] = $this->M_periode->get_periode_all()->result();
        $data['satuan'] = $this->M_satuan->get_satuan_all()->result();
        $data['jenis_kegiatan'] = $this->M_jenis_kegiatan->get_jenis_kegiatan_all()->result();
        $data['satker'] = $this->M_satker->get_satker_all()->result();
        $data['detail_kegiatan'] = $this->M_detail_kegiatan->get_detail_kegiatan_by_id($id)->result();
        $data['alokasi_satker'] = $this->M_alokasi_satker->get_alokasi_satker_by_id($id)->result();
        $data['edit_alokasi_satker'] = $this->M_alokasi_satker->edit_alokasi_satker($id)->result();
        $data['id_detail_kegiatan'] = $id;
        // var_dump($data['alokasi_satker']);
        // die();
        // $data['detail_kegiatan'] = $this->M_detail_kegiatan->get_detail_kegiatan_sum($id)->result();
      
        $this->load->view('admin/detail_kegiatan_alokasi', $data);
        
        
    }

    function alokasi_satker_act($id){
        $data['id_detail_kegiatan'] = $id;      
        // Ambil data yang dikirim dari form
        $id_alokasi_satker = $this->input->post('id_alokasi_satker'); //id alokasi satker unik
        $id_detail_kegiatan = $this->input->post('id_detail_kegiatan'); //id detail kegiatan (1 id untuk 9 satker)
        $id_satker = $this->input->post('satker'); //id satker sejumlahh 9 satker
        $target = $this->input->post('target');  //target untuk tiap alokasi satker
        $data = array();                        //array untuk INSERT data baru
        $data_update = array();                 //array untuk UPDATE data yang pernah diinsert
        
        
        $i = 0; // Set index array awal dengan 0
        foreach($id_satker as $satker){ // buat perulangan berdasarkan jumlah id satker
            if (!empty($target[$i])){ //kalau target ada isinya lakukan insert
              if (empty($id_alokasi_satker[$i])){ //kalau id_alokasi_satker kosong (belum pernah insert sebelumnya) -> lakukan insert data
                array_push($data, array(
                'id_detail_kegiatan'=>$id_detail_kegiatan[$i],
                'id_satker'         =>$satker, 
                'target'            =>$target[$i],
                'created_at'        => date('Y-m-d')  
                ));
              } elseif(!empty($id_alokasi_satker[$i])){ //kalau id_alokasi_satker ada isinya (pernah insert sebelumnya) -> lakukan update data
                array_push($data_update, array(
                'id_alokasi_satker' =>$id_alokasi_satker[$i],
                'id_detail_kegiatan'=>$id_detail_kegiatan[$i],
                'id_satker'         =>$satker, 
                'target'            =>$target[$i],
                'created_at'        => date('Y-m-d')  
                ));
              }  
          }         
          $i++;
        }

        if (!empty($data)){
            $this->db->insert_batch('laporan_alokasi_satker', $data);
        }
        if (!empty($data_update)){
            $this->db->update_batch('laporan_alokasi_satker',$data_update, 'id_alokasi_satker');
        }
        
        
        
        // $this->db->insert_batch('laporan_alokasi_satker', $data); //INSERT DATA alokasi baru pada database        
        // $this->db->update_batch('laporan_alokasi_satker',$data_update, 'id_alokasi_satker'); //UPDATE DATA yang pernah dialokasikan pada database
        
        // $i = 0; // Set index array awal dengan 0
        // foreach($id_satker as $satker){ // buat perulangan berdasarkan jumlah id satker
        //     if (!empty($target[$i])){ //kalau target ada isinya lakukan update
        //       if (!empty($id_alokasi_satker[$i])){ //kalau id_alokasi_satker ada isinya (pernah insert sebelumnya)
        //         array_push($data_update, array(
        //         'id_alokasi_satker' =>$id_alokasi_satker[$i],
        //         'id_detail_kegiatan'=>$id_detail_kegiatan[$i],
        //         'id_satker'         =>$satker, 
        //         'target'            =>$target[$i],
        //         'created_at'        => date('Y-m-d')  
        //         ));
        //       }  
        //   }         
        //   $i++;
        // }
        // if ($i>0){
        //     $this->db->update_batch('laporan_alokasi_satker',$data_update, 'id_alokasi_satker'); //UPDATE DATA yang pernah dialokasikan pada database
        // }

        // var_dump($data['id']);
        // die();
        // $data['detail_kegiatan'] = $this->M_detail_kegiatan->get_detail_kegiatan_sum($id)->result();
        $this->session->set_flashdata('add-success', 'Berhasil');
            redirect(base_url().'detail_kegiatan/index/'.$id);
        
    }

    function add_detail_kegiatan_act(){

        $id_kegiatan = $this->input->post('id_kegiatan');
        $detail_kegiatan = $this->input->post('detail_kegiatan');
        $tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_selesai = $this->input->post('tgl_selesai');

        

            //   var_dump($id_kegiatan);
            //    die();

         $this->form_validation->set_rules('detail_kegiatan','Nama Detail Kegiatan Kegiatan','required',
            array(
                'required' => '%s harus diisi'
            )
            );

            $cek_tanggal = $this->M_detail_kegiatan->cek_tanggal_kegiatan()->result();
         foreach ($cek_tanggal as $ct){
                  $cek_tgl_mulai = $ct->tgl_mulai;
                  $cek_tgl_selesai = $ct->tgl_selesai;
            }

            $validasi = array(
                    array('field' => 'tgl_mulai', 'label' => 'Tanggal Mulai', 'rules' => 'required|callback_compareDate'),
                    array('field' => 'tgl_selesai', 'label' => 'Tanggal Selesai', 'rules' => 'required|callback_compareDate'),
                );
            $this->form_validation->set_rules($validasi);
            $this->form_validation->set_message('required', '%s harus diisi.');
            
            if($tgl_mulai < $cek_tgl_mulai) {
                $this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'rule1',
                array('rule1' => '%s <b>Detail kegiatan</b> tidak boleh melebih <b>Rentan Waktu Kegiatan</b>')
                );
            } elseif($tgl_selesai > $cek_tgl_selesai){
                
                $this->form_validation->set_rules('tgl_selesai', 'Tanggal Mulai', 'rule2',
                array('rule2' => '%s <b>Detail kegiatan</b> tidak boleh melebih <b>Rentan Waktu Kegiatan</b>')
                );
            }
          
        if($this->form_validation->run() != false){

               $data = array(
                   'id_kegiatan' => $id_kegiatan,
                   'detail_kegiatan' =>  $detail_kegiatan,
                   'tgl_mulai' =>  $tgl_mulai,
                   'tgl_selesai' =>  $tgl_selesai,
                   'created_at' => date('Y-m-d H:i:s')
               );
             
            $this->M_detail_kegiatan->insert_detail_kegiatan($data, 'detail_kegiatan');
            $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Berhasil Diubah!</b></div>');
            foreach ($id_kegiatan as $ik){
                  $id_kegiatan = $ik->id_kegiatan;
            }


             redirect(base_url().'detail_kegiatan/index/'.$id_kegiatan);
        
            
		}else{
            $data['id_kegiatan'] = $this->input->post('id_kegiatan');
            $data['kegiatan'] = $this->M_kegiatan->get_kegiatan_by_id($id_kegiatan)->result();
             $data['ketuatim'] = $this->M_detail_kegiatan->get_ketua_tim($id_kegiatan)->result();
            $data['detail_kegiatan'] = $this->M_detail_kegiatan->get_detail_kegiatan_by_id($id_kegiatan)->result();	
		    $this->load->view('admin/detail_kegiatan_add', $data);
            // redirect(base_url().'detail_kegiatan/add_detail_kegiatan_act/'.$id_kegiatan);
          }
        }

     function edit_detail_kegiatan($id){				
            $where = array(
                'id_detail_kegiatan' => $id		
            );
            $data['detail_kegiatan'] = $this->M_detail_kegiatan->edit_detail_kegiatan($id)->result();
            //   $data['detail_kegiatan'] = $this->M_detail_kegiatan->get_detail_kegiatan_all()->result();	
            
            $this->load->view('admin/detail_kegiatan_update', $data);
	    }
    
     function update_detail_kegiatan($id){				
        
        $id_detail_kegiatan = $id;
        $id_kegiatan = $this->input->post('id_kegiatan');
        $detail_kegiatan = $this->input->post('detail_kegiatan');
        $tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_selesai = $this->input->post('tgl_selesai');

        $cek_tanggal = $this->M_detail_kegiatan->cek_tanggal_kegiatan()->result();
         foreach ($cek_tanggal as $ct){
                  $cek_tgl_mulai = $ct->tgl_mulai;
                  $cek_tgl_selesai = $ct->tgl_selesai;
            }

            if($tgl_mulai < $cek_tgl_mulai) {
                $this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'rule1',
                array('rule1' => '%s <b>Detail kegiatan</b> tidak boleh melebih <b>Rentang Waktu Kegiatan</b>')
                );
            } elseif($tgl_selesai > $cek_tgl_selesai){
                
                $this->form_validation->set_rules('tgl_selesai', 'Tanggal Mulai', 'rule2',
                array('rule2' => '%s <b>Detail kegiatan</b> tidak boleh melebih <b>Rentang Waktu Kegiatan</b>')
                );
            }

         $this->form_validation->set_rules('detail_kegiatan','Nama Detail Kegiatan Kegiatan','required',
            array(
                'required' => '%s harus diisi'
            )
            );

            $validasi = array(
                    array('field' => 'tgl_mulai', 'label' => 'Tanggal Mulai', 'rules' => 'required|callback_compareDate'),
                    array('field' => 'tgl_selesai', 'label' => 'Tanggal Selesai', 'rules' => 'required|callback_compareDate'),
                );
            $this->form_validation->set_rules($validasi);
            $this->form_validation->set_message('required', '%s is required.');
            
          
          
        if($this->form_validation->run() != false){

               $data = array(
                   'id_detail_kegiatan' => $id_detail_kegiatan,
                   'id_kegiatan' => $id_kegiatan,
                   'detail_kegiatan' =>  $detail_kegiatan,
                   'tgl_mulai' =>  $tgl_mulai,
                   'tgl_selesai' =>  $tgl_selesai,
                   'created_at' => date('Y-m-d H:i:s')
               );
            $this->M_detail_kegiatan->update_detail_kegiatan($id, $data);
            $data['detail_kegiatan'] = $this->M_detail_kegiatan->edit_detail_kegiatan($id,'detail_kegiatan')->result();	
            $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Berhasil Diubah!</b></div>');
            $get_id_kegiatan = $this->M_detail_kegiatan->get_id_kegiatan($id)->result();
            foreach ($get_id_kegiatan as $ik){
                  $id = $ik->id_kegiatan;
                  echo "$id";
            }
             redirect(base_url().'detail_kegiatan/index/'.$id);
        
            
		}else{
            $data['id_kegiatan'] = $this->input->post('id_kegiatan');
            $data['kegiatan'] = $this->M_kegiatan->get_kegiatan_by_id($id)->result();
            $data['detail_kegiatan'] = $this->M_detail_kegiatan->edit_detail_kegiatan($id)->result();	
		    $this->load->view('admin/detail_kegiatan_update', $data);
            // redirect(base_url().'detail_kegiatan/edit_detail_kegiatan/'.$id);
          }
        }

    function delete_detail_kegiatan($id){	  
        
        $where = $id;
        $this->M_detail_kegiatan->delete_detail_kegiatan($where,'detail_kegiatan');	
		
        $id_kegiatan = $this->M_detail_kegiatan->get_id_kegiatan()->result();
        
         foreach ($id_kegiatan as $ik) {
         $id = $ik->id_kegiatan;
         echo "$id";
         }
        $this->session->set_flashdata('message', '<div class="alert alert-warning"><b>Data Berhasil Dihapus!</b></div>');
        // $this->index($id);
        redirect(base_url().'detail_kegiatan/index/'.$id);
	}


    function load_user(){
          $data['user']  = $this->db->get_where('kegiatan', ['username'
            => $this->session->userdata('username')])->row_array();
    }


     function compareDate()
	{
		$tgl_mulai = $_POST['tgl_mulai'];
		$tgl_selesai = $_POST['tgl_selesai'];
		$tgl_sekarang = date("Y-m-d h:i");
	

		if ($tgl_selesai >= $tgl_mulai) {
            return True;
		} else {
			$this->form_validation->set_message('compareDate', 'tgl Mulai harus lebih dahulu dari tanggal Selesai');
			return False;
		}
	}

    
}
?>