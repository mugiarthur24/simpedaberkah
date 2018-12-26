<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sppd_ld extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Sppd_m');
    }
    public function index($offset=0){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->get();
                $data['title'] = $this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/sppd-ld-v';
                $jumlah = $this->Sppd_m->jumlah_data(@$post['string'],@$post['skpd']);
                $config['base_url'] = base_url().'/index.php/admin/sppd_ld/index/';
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
               
                $data['golongan'] = $this->Sppd_m->select_data('master_golongan');
                
                // pengaturan searching
                $data['jmldata'] = $jumlah;
                $data['nmr'] = $offset;
                $data['hasil2'] = $this->Sppd_m->searcing_data($config['per_page'],$offset,@$post['string'],@$post['skpd']);
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
    public function create(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = 'Tambah SPPD Luar Daerah';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/tambah-sppd-ld-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function proses_create(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_pegawai' => $post['id_pegawai'],
                    'tahun' => $post['tahun'],
                    'no_bukti'=>$post['no_bukti'],
                    'tgl_bukti'=>$post['tgl_bukti_thn'].'-'.$post['tgl_bukti_bln'].'-'.$post['tgl_bukti_hr'],
                    'keperluan'=>$post['keperluan'],
                    'kd_anggaran'=>$post['kd_anggaran_thn'].'-'.$post['kd_anggaran_bln'].'-'.$post['kd_anggaran_hr'],
                    'jml_bayar'=>$post['jml_bayar'],
                    'id_golongan'=>$post['id_golongan'],
                    'tujuan'=>$post['tujuan'],
                    'tgl_berangkat'=>$post['tmt_thn'].'-'.$post['tmt_bln'].'-'.$post['tmt_hr'],
                    'tgl_kembali'=>$post['tgl_kembali_thn'].'-'.$post['tgl_kembali_bln'].'-'.$post['tgl_kembali_hr'],
                    'lama_hari'=>$post['lama_hari'],
                    'uang_perhari'=>$post['uang_perhari'],
                    'total_uang'=>$post['total_uang'],
                    'akomodasi_hotel'=>$post['akomodasi_hotel'],
                    'biaya_representasi'=>$post['biaya_representasi'],
                    'biaya_lain'=>$post['biaya_lain'],
                    'biaya_tiket_pp'=>$post['biaya_tiket_pp'],
                    'jumlah'=>$post['jumlah'],
                    'nama_penginapan'=>$post['nama_penginapan'],
                    'tujuan_ta'=>$post['tujuan_ta'],
                    'tgl_ta_berangkat'=>$post['tgl_ta_berangkat_thn'].'-'.$post['tgl_ta_berangkat_bln'].'-'.$post['tgl_ta_berangkat_hr'],
                    'pesawat_berangkat'=>$post['pesawat_berangkat'],
                    'no_tiket_berangkat'=>$post['no_tiket_berangkat'],
                    'kd_book_berangkat'=>$post['kd_book_berangkat'],
                    'harga_berangkat'=>$post['harga_berangkat'],
                    'tgl_ta_kembali'=>$post['tgl_ta_kembali_thn'].'-'.$post['tgl_ta_kembali_bln'].'-'.$post['tgl_ta_kembali_hr'],
                    'pesawat_kembali'=>$post['pesawat_kembali'],
                    'no_tiket_kembali'=>$post['no_tiket_kembali'],
                    'kd_book_kembali'=>$post['kd_book_kembali'],
                    'harga_kembali'=>$post['harga_kembali'],
                    'nip_pejabat_mengetahui'=>$post['nip_pejabat_mengetahui'],
                    'keterangan'=>$post['keterangan']
                );
                $this->Sppd_m->insert_data('sppd_ld',$datainput);
                $pesan = 'Data Honorer baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/sppd_ld'));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Sppd_m->detail_data('sppd_ld','id_sppd_ld',$id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $this->Sppd_m->detail_data('data_pegawai','id_pegawai',$id)->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['detail'] = $result;
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
public function update(){
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
                    'nip_pejabat_mengetahui'=>$post['nip_pejabat_mengetahui'],
                    'total_uang_harian'=>$post['total_uang_harian'],
                    'uang_hotel'=>$post['uang_hotel'],
                    'total_uang_hotel'=>$post['total_uang_hotel'],
                    'jumlah_biaya'=>$post['jumlah_biaya'],
                    'jumlah_dibayarkan'=>$post['jumlah_dibayarkan'],
                    'biaya_sisa'=>$post['biaya_sisa']
                    );
                // echo "<pre>";print_r($datainput);echo "<pre/>";exit();
                $this->Sppd_m->update_data('sppd_ld','id_sppd_ld',$post['id_sppd_ld'],$datainput);
                $pesan = 'Data SPPD Luar Daerah berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/edit_sppd_ld/'.$post['id_pegawai'].'/'.$post['id_sppd_ld']));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    
    public function delete($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Sppd_m->delete_data('sppd_ld','id_sppd_ld',$id);
                $pesan = 'Data SPPD Luar Daerah berhasil di dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/sppd_ld/'));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
}
?>
