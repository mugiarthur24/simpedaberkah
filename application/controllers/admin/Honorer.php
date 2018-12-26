<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Honorer extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/honorer_m');
    }
    public function index($offset=0){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                // echo "<pre/>"; echo ;echo "<pre>";exit();
                $post = $this->input->get();
                $data['title'] = $this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/honorer-v';
                $jumlah = $this->honorer_m->jumlah_data(@$post['string'],@$post['skpd']);
                $config['base_url'] = base_url().'/index.php/admin/honorer/index/';
                $config['total_rows'] = $jumlah;
                $config['per_page'] = '10';
                $config['first_page'] = 'Awal';
                $config['last_page'] = 'Akhir';
                $config['next_page'] = '&laquo;';
                $config['prev_page'] = '&raquo;';
                // bootstap style
                $config['first_link']       = 'Pertama';
                $config['last_link']        = 'Terakhir';
                $config['next_link']        = 'Selanjutnya';
                $config['prev_link']        = 'Sebelumnya';
                $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
                $config['full_tag_close']   = '</ul></nav></div>';
                $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                $config['num_tag_close']    = '</span></li>';
                $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
                $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
                $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
                $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['prev_tagl_close']  = '</span>Next</li>';
                $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                $config['first_tagl_close'] = '</span></li>';
                $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['last_tagl_close']  = '</span></li>';
                //inisialisasi config
                $this->pagination->initialize($config);
                $data['skpd'] = $this->honorer_m->select_data('master_lokasi_kerja');
                $data['status'] = $this->honorer_m->select_data('master_status_pegawai');
                $data['agama'] = $this->honorer_m->select_data('master_agama');
                $data['golongan'] = $this->honorer_m->select_data('master_golongan');
                $data['eselon'] = $this->honorer_m->select_data('master_eselon');
                $data['sjabatan'] = $this->honorer_m->select_data('master_status_jabatan');

                // pengaturan searching
                $data['jmldata'] = $jumlah;
                $data['nmr'] = $offset;
                $data['hasil'] = $this->honorer_m->searcing_data($config['per_page'],$offset,@$post['string'],@$post['skpd']);
                $data['pagging'] = $this->pagination->create_links();
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    function acak($panjang)
    {
        $karakter= 'abcdefghijklmnopqrstuvwxyz123456789';
        $string = '';
        for ($i = 0; $i < $panjang; $i++) {
          $pos = rand(0, strlen($karakter)-1);
          $string .= $karakter{$pos};
      }
      return $string;
  }
    public function create(){
        // $lasthonor = $this->Admin_m->last_id_h()->id_honorer;
        // echo "<pre>";print_r(str_pad($lasthonor, 7, 0, STR_PAD_LEFT));echo "<pre/>";exit();
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $lasthonor2 = $this->Admin_m->last_id_h()->id_honorer;
                if ( $lasthonor2 == 0) {
                     $lasthonor = 1;
                }else{
                     $lasthonor = $lasthonor2+1;

                }
                $datainput = array(
                    'nama' => $post['nama'],
                    'kode_honorer' => str_pad($lasthonor, 7, 0, STR_PAD_LEFT),
                    'alamat'=>$post['alamat'],
                    'nomor_sk'=>$post['nomor_sk'],
                    'id_lokasi_kerja'=>$post['id_lokasi_kerja'],
                    'tmt'=>$post['tmt_thn'].'-'.$post['tmt_bln'].'-'.$post['tmt_hr'],
                    'no_hp'=>$post['no_hp'],
                );
                $this->honorer_m->insert_data('honorer',$datainput);
                // Buat Akun User
                $username = str_pad($lasthonor, 7, 0, STR_PAD_LEFT);
                $email = 'honorer@gmail.com';
                $password = $this->acak(5);
                $gruphonor = $this->Admin_m->detail_data_order('groups','name','honorer')->id;
                $group = array($gruphonor);

                $additional_data = array(
                    'first_name' => $post['nama'],
                    'last_name' => $this->Admin_m->info_pt(1)->nama_info_pt,
                    'company' => $this->Admin_m->info_pt(1)->nama_info_pt,
                    'phone' => $post['no_hp'],
                    'repassword' => $password,
                    'lvl' =>'2',
                    'id_pegawai' => $this->Admin_m->last_id_h()->id_honorer,
                    );
                $this->ion_auth->register($username, $password, $email, $additional_data, $group);
                $pesan = 'Data Honorer baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/honorer'));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_honorer($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->honorer_m->detail_data('honorer','id_honorer',$id);
                
                $data['title'] = $result->nama;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['detail'] = $result;
                $data['sppdhonor'] = $this->honorer_m->sppd_honorer($id);
                $data['akun'] = $this->honorer_m->akun_honorer($id);
                $data['groups'] = $this->ion_auth->groups()->result();
                $data['usergroups'] = array();
                if($usergroups = $this->ion_auth->get_users_groups($data['akun']->id)->result()){
                    foreach($usergroups as $group)
                    {
                        $data['usergroups'][] = $group->id;
                    }
                }
                // echo "<pre>";print_r($data['sppdhonor']);echo "<pre/>";exit();
                $data['skpd'] = $this->honorer_m->select_data('master_lokasi_kerja');
                $data['page'] = 'admin/edit-honorer-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
public function update_honorer(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'nama' => $post['nama'],
                    'alamat'=>$post['alamat'],
                    'nomor_sk'=>$post['nomor_sk'],
                    'id_lokasi_kerja'=>$post['id_lokasi_kerja'],
                    'tmt'=> $post['tmt_thn'].'-'.$post['tmt_bln'].'-'.$post['tmt_hr'],
                    'no_hp'=>$post['no_hp'],
                );
                // echo "<pre>";print_r($datainput);echo "<pre/>";exit();

                $this->honorer_m->update_data('honorer','id_honorer',$post['id_honorer'],$datainput);
                $pesan = 'Data Honorer golongan baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/honorer/'));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    
    public function delete_honorer($id_honorer){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->honorer_m->delete_data('honorer','id_honorer',$id_honorer);
                $pesan = 'Data Honorer berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/honorer/'));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function buat_sppd_honorer($id,$idsppd,$idhonor){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->load->model('admin/Sppd_m');
                $this->load->model('admin/Pegawai_m');
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Admin_m->detail_data_order('sppd_ld','id_sppd_ld',$idsppd);
                $data['reshonor'] = $this->Admin_m->detail_data_order('honorer','id_honorer',$idhonor);
                // echo "<pre>";echo print_r($data['detail']);echo "<pre/>";exit();
                $data['dtgolongan'] = $this->Sppd_m->last_golongan($id);
                $data['dtpangkat'] = $this->Sppd_m->last_pangkat($id);
                $data['provinsi'] = $this->Pegawai_m->select_data('master_provinsi');
                $data['jnsperjadin'] = $this->Pegawai_m->select_data('master_jenis_perjadin');
                $data['tjabatan'] = $this->Pegawai_m->select_data('master_jabatan');
                $data['dteselon'] = $this->Sppd_m->last_eselon($id);
                $data['page'] = 'admin/buat-sppd-honorer-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function proses_buat_sppd_honorer(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_jenis_perjadin' => $post['id_jenis_perjadin'],
                    'id_sppd_ld' => $post['id_sppd_ld'],
                    'id_pegawai' => $post['id_pegawai'],
                    'id_honorer' => $post['id_honorer'],
                    'tahun' => $post['tahun'],
                    'tgl_sppd' => $post['tgl_sppd'],
                    'no_perjadin' => $post['no_perjadin'],
                    'nomor' => $post['nomor'],
                    'tgl_bukti'=>$post['tgl_bukti'],
                    'maksud_perjadin'=>$post['maksud_perjadin'],
                    'tujuan_perjadin'=>$post['tujuan_perjadin'],
                    'kd_anggaran'=>$post['kd_anggaran'],
                    'id_golongan'=>$post['id_golongan'],
                    'id_jabatan'=>$post['fjabatan'],
                    'id_pangkat'=>$post['id_pangkat'],
                    'tujuan'=>$post['tujuan'],
                    'tgl_berangkat'=>$post['tgl_berangkat'],
                    'tgl_kembali'=>$post['tgl_kembali'],
                    'lama_hari'=>$post['lama_hari'],
                    'uraian_kas'=>$post['uraian_kas'],
                    'tempat_berangkat'=>$post['tempat_berangkat'],
                    'pejabat_yang_memerintah'=>$post['pejabat_yang_memerintah'],
                    'id_eselon'=>$post['id_eselon'],
                    'no_rek' => $post['no_rek'],
                    'instansi' => $post['instansi'],
                    'id_bendahara' => $post['id_bendahara'],
                    'nip_bendahara' => $post['nip_bendahara'],
                    'pejabat_mengetahui'=>$post['pejabat_mengetahui'],
                    'biaya_riil'=>$post['biaya_riil'],
                    'dasar_pelaksanaan'=>$post['dasar_pelaksanaan'],
                    'isi_laporan'=>$post['isi_laporan'],
                    'alat_angkutan'=>$post['alat_angkutan'],
                    'biaya_pergi'=>$post['biaya_pergi'],
                    'biaya_pulang'=>$post['biaya_pulang'],
                    'biaya_lain'=>$post['biaya_lain'],
                    'biaya_representasi' =>$post['biaya_representasi'],
                    'nama_hotel' =>$post['nama_hotel'],
                    'tgl_ta_berangkat' =>$post['tgl_ta_berangkat'],
                    'pesawat_berangkat' =>$post['pesawat_berangkat'],
                    'no_tiket_berangkat' =>$post['no_tiket_berangkat'],
                    'kode_book_berangkat' =>$post['kode_book_berangkat'],
                    'harga_berangkat' =>$post['harga_berangkat'],
                    'tgl_ta_kembali' =>$post['tgl_ta_kembali'],
                    'pesawat_kembali' =>$post['pesawat_kembali'],
                    'no_tiket_kembali' =>$post['no_tiket_kembali'],
                    'kode_book_kembali' =>$post['kode_book_kembali'],
                    'harga_kembali' =>$post['harga_kembali'],                        
                    'uang_perhari'=>$post['uang_perhari'],
                    'total_uang_harian'=>$post['total_uang_harian'],
                    'uang_hotel'=>$post['uang_hotel'],
                    'total_uang_hotel'=>$post['total_uang_hotel'],
                    'jumlah_biaya'=>$post['jumlah_biaya'],
                    'jumlah_dibayarkan'=>$post['jumlah_dibayarkan'],
                    'biaya_sisa'=>$post['biaya_sisa']
                );
                $this->honorer_m->insert_data('sppd_honorer',$datainput);
                $pesan = 'Data Honorer baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin//honorer/edit_honorer/'.$post['id_honorer']));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_sppd_honorer($idsppd,$idhonor){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->load->model('admin/Sppd_m');
                $this->load->model('admin/Pegawai_m');
                $detsppdhon = $this->Admin_m->detail_data_order('sppd_honorer','id_sppd_honorer',$idsppd);
                $result = $this->Pegawai_m->detail_pegawai($detsppdhon->id_pegawai);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Admin_m->detail_data_order('sppd_ld','id_sppd_ld',$detsppdhon->id_sppd_ld);
                $data['reshonor'] = $this->Admin_m->detail_data_order('honorer','id_honorer',$idhonor);
                $data['detsppdhon'] = $detsppdhon;
                // echo "<pre>";echo print_r($data['detail']);echo "<pre/>";exit();
                $data['dtgolongan'] = $this->Sppd_m->last_golongan($detsppdhon->id_pegawai);
                $data['dtpangkat'] = $this->Sppd_m->last_pangkat($detsppdhon->id_pegawai);
                $data['provinsi'] = $this->Pegawai_m->select_data('master_provinsi');
                $data['jnsperjadin'] = $this->Pegawai_m->select_data('master_jenis_perjadin');
                $data['tjabatan'] = $this->Pegawai_m->select_data('master_jabatan');
                $data['dteselon'] = $this->Sppd_m->last_eselon($detsppdhon->id_pegawai);
                $data['page'] = 'admin/edit-sppd-honorer-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function proses_edit_sppd_honorer(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_jenis_perjadin' => $post['id_jenis_perjadin'],
                    'id_sppd_ld' => $post['id_sppd_ld'],
                    'id_pegawai' => $post['id_pegawai'],
                    'id_honorer' => $post['id_honorer'],
                    'tahun' => $post['tahun'],
                    'tgl_sppd' => $post['tgl_sppd'],
                    'no_perjadin' => $post['no_perjadin'],
                    'nomor' => $post['nomor'],
                    'tgl_bukti'=>$post['tgl_bukti'],
                    'maksud_perjadin'=>$post['maksud_perjadin'],
                    'tujuan_perjadin'=>$post['tujuan_perjadin'],
                    'kd_anggaran'=>$post['kd_anggaran'],
                    'id_golongan'=>$post['id_golongan'],
                    'id_jabatan'=>$post['fjabatan'],
                    'id_pangkat'=>$post['id_pangkat'],
                    'tujuan'=>$post['tujuan'],
                    'tgl_berangkat'=>$post['tgl_berangkat'],
                    'tgl_kembali'=>$post['tgl_kembali'],
                    'lama_hari'=>$post['lama_hari'],
                    'uraian_kas'=>$post['uraian_kas'],
                    'tempat_berangkat'=>$post['tempat_berangkat'],
                    'pejabat_yang_memerintah'=>$post['pejabat_yang_memerintah'],
                    'id_eselon'=>$post['id_eselon'],
                    'no_rek' => $post['no_rek'],
                    'instansi' => $post['instansi'],
                    'id_bendahara' => $post['id_bendahara'],
                    'nip_bendahara' => $post['nip_bendahara'],
                    'pejabat_mengetahui'=>$post['pejabat_mengetahui'],
                    'biaya_riil'=>$post['biaya_riil'],
                    'dasar_pelaksanaan'=>$post['dasar_pelaksanaan'],
                    'isi_laporan'=>$post['isi_laporan'],
                    'alat_angkutan'=>$post['alat_angkutan'],
                    'biaya_pergi'=>$post['biaya_pergi'],
                    'biaya_pulang'=>$post['biaya_pulang'],
                    'biaya_lain'=>$post['biaya_lain'],
                    'biaya_representasi' =>$post['biaya_representasi'],
                    'nama_hotel' =>$post['nama_hotel'],
                    'tgl_ta_berangkat' =>$post['tgl_ta_berangkat'],
                    'pesawat_berangkat' =>$post['pesawat_berangkat'],
                    'no_tiket_berangkat' =>$post['no_tiket_berangkat'],
                    'kode_book_berangkat' =>$post['kode_book_berangkat'],
                    'harga_berangkat' =>$post['harga_berangkat'],
                    'tgl_ta_kembali' =>$post['tgl_ta_kembali'],
                    'pesawat_kembali' =>$post['pesawat_kembali'],
                    'no_tiket_kembali' =>$post['no_tiket_kembali'],
                    'kode_book_kembali' =>$post['kode_book_kembali'],
                    'harga_kembali' =>$post['harga_kembali'],                        
                    'uang_perhari'=>$post['uang_perhari'],
                    'total_uang_harian'=>$post['total_uang_harian'],
                    'uang_hotel'=>$post['uang_hotel'],
                    'total_uang_hotel'=>$post['total_uang_hotel'],
                    'jumlah_biaya'=>$post['jumlah_biaya'],
                    'jumlah_dibayarkan'=>$post['jumlah_dibayarkan'],
                    'biaya_sisa'=>$post['biaya_sisa']
                );
                $this->honorer_m->update_data('sppd_honorer','id_sppd_honorer',$post['id_sppd_honorer'],$datainput);
                $pesan = 'Data SPPD Honorer berhasil di edit';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin//honorer/edit_honorer/'.$post['id_honorer']));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function cetak_sppd_ld($id,$sppd){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->load->model('admin/Sppd_m');
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = 'Cetak SPPD - '.$result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['hasil2'] = $this->Admin_m->detail_data_order('sppd_ld','id_sppd_ld',$sppd);
                $data['pengikut'] = $this->Admin_m->select_data_order('master_pengikut','id_sppd',$sppd);
                $data['dtgolongan'] = $this->Sppd_m->last_golongan($id);
                $data['dtpangkat'] = $this->Sppd_m->last_pangkat($id);
                $data['dtsatuan'] = $this->Sppd_m->last_satuan_kerja($id);
                $data['provinsi'] = $this->Pegawai_m->select_data('master_provinsi');
                $data['tjabatan'] = $this->Pegawai_m->select_data('master_jabatan');
                // echo "<pre>";print_r($data['hasil2']);echo "<pre/>";exit();
                $data['jnsperjadin'] = $this->Pegawai_m->select_data('master_jenis_perjadin');
                $data['dteselon'] = $this->Sppd_m->last_eselon($id);
                // pagging setting
                $this->load->view('admin/cetak-sppd-ld-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }

}
?>