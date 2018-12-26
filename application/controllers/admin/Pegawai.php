<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Pegawai_m');
        $this->load->library('resize');
    }
    public function index($offset=0){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
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
                $data['page'] = 'admin/pegawai-v';
                $jumlah = $this->Pegawai_m->jumlah_data(@$post['string'],@$post['skpd']);
                $config['base_url'] = base_url().'/index.php/admin/pegawai/index/';
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
                $data['skpd'] = $this->Pegawai_m->select_data('master_lokasi_kerja');
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['agama'] = $this->Pegawai_m->select_data('master_agama');
                $data['skpd'] = $this->Pegawai_m->select_data('master_satuan_kerja');
                $data['golongan'] = $this->Pegawai_m->select_data('master_golongan');
                $data['eselon'] = $this->Pegawai_m->select_data('master_eselon');
                $data['sjabatan'] = $this->Pegawai_m->select_data('master_status_jabatan');

                // pengaturan searching
                $data['jmldata'] = $jumlah;
                $data['nmr'] = $offset;
                $data['hasil'] = $this->Pegawai_m->searcing_data($config['per_page'],$offset,@$post['string'],@$post['skpd']);
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
    public function detail($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'datadiri';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['skpd'] = $this->Pegawai_m->select_data('master_satuan_kerja');
                $data['agama'] = $this->Pegawai_m->select_data('master_agama');
                $data['eselon'] = $this->Pegawai_m->select_data('master_eselon');
                $data['golongan'] = $this->Pegawai_m->select_data('master_golongan');
                $data['sjabatan'] = $this->Pegawai_m->select_data('master_status_jabatan');
                $data['bagian'] = 'admin/data-pegawai-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_keluarga($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['keluarga'] = $this->Pegawai_m->data_keluarga($id);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['stat_kawin'] = $this->Pegawai_m->select_data('master_status_kawin');
                $data['stat_keluarga'] = $this->Pegawai_m->select_data('master_status_dalam_keluarga');
                $data['bagian'] = 'admin/data-keluarga-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_rgolongan($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'rgol';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['rgolongan'] = $this->Pegawai_m->data_rgolongan($id);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['sjabatan'] = $this->Pegawai_m->select_data('master_status_jabatan');
                $data['golongan'] = $this->Pegawai_m->select_data('master_golongan');
                $data['bagian'] = 'admin/data-rgolongan-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_rpangkat($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                $data['titelbag'] = 'rpang';
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['rpangkat'] = $this->Pegawai_m->data_rpangkat($id);
                $data['pangkat'] = $this->Pegawai_m->select_data('master_pangkat');
                $data['bagian'] = 'admin/data-rpangkat-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_rjabatan($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                $data['titelbag'] = 'rjab';
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['rjabatan'] = $this->Pegawai_m->data_rjabatan($id);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['jnsjabatan'] = $this->Pegawai_m->select_data('master_jenis_jabatan');
                $data['satuankerja'] = $this->Pegawai_m->select_data('master_satuan_kerja');
                $data['eselon'] = $this->Pegawai_m->select_data('master_eselon');
                $data['jabatan'] = $this->Pegawai_m->select_data('master_jabatan');
                $data['bagian'] = 'admin/data-rjabatan-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_reselon($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'eselon';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['reselon'] = $this->Pegawai_m->data_reselon($id);
                $data['eselon'] = $this->Pegawai_m->select_data('master_eselon');
                $data['jnsjabatan'] = $this->Pegawai_m->select_data('master_jenis_jabatan');
                $data['bagian'] = 'admin/data-reselon-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_pendidikan($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['pendidikan'] = $this->Pegawai_m->data_pendidikan($id);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['ipendidikan'] = $this->Pegawai_m->select_data('master_pendidikan');
                $data['bagian'] = 'admin/data-pendidikan-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_pelatihan($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['pelatihan'] = $this->Pegawai_m->data_pelatihan($id);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/data-pelatihan-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_penghargaan($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['penghargaan'] = $this->Pegawai_m->data_penghargaan($id);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/data-penghargaan-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_seminar($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['seminar'] = $this->Pegawai_m->data_seminar($id);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/data-seminar-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_organisasi($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['organisasi'] = $this->Pegawai_m->data_organisasi($id);
                $data['satuankerja'] = $this->Pegawai_m->select_data('master_satuan_kerja');
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/data-organisasi-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_gaji_pokok($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['gaji_pokok'] = $this->Pegawai_m->data_gaji_pokok($id);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/data-gaji_pokok-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_hukuman($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['hukuman'] = $this->Pegawai_m->data_hukuman($id);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/data-hukuman-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function detail_dp3($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['dp3'] = $this->Pegawai_m->data_dp3($id);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/data-dp3-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function daftar_sppd_ld($id,$offset=0){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->load->model('admin/Sppd_m');
                $post = $this->input->get();
                $data['title'] = $this->Admin_m->info_pt(1)->nama_info_pt;
                $data['titelbag'] = 'sppd';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $jumlah = $this->Sppd_m->jumlah_data_detail_pegawai($id,@$post['string']);
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

                $data['detail']=$this->Pegawai_m->detail_pegawai($id);
                $result = $this->Pegawai_m->detail_pegawai($id);
                $data['hasil'] = $result;
                $data['hasil2'] = $this->Sppd_m->searcing_data_detail_pegawai($id,$config['per_page'],$offset,@$post['string']);
                $data['pagging'] = $this->pagination->create_links();
                // pagging setting
                $data['bagian'] = 'admin/detail-sppd-ld-v';
                $data['page'] = 'admin/detail-pegawai-v';
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_sppd_ld($id,$idsppd){
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
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'sppd';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Admin_m->detail_data_order('sppd_ld','id_sppd_ld',$idsppd);
                // echo "<pre>";echo print_r($data['detail']);echo "<pre/>";exit();
                $data['dtgolongan'] = $this->Sppd_m->last_golongan($id);
                $data['dtpangkat'] = $this->Sppd_m->last_pangkat($id);
                $data['provinsi'] = $this->Pegawai_m->select_data('master_provinsi');
                $data['jnsperjadin'] = $this->Pegawai_m->select_data('master_jenis_perjadin');
                $data['tjabatan'] = $this->Pegawai_m->select_data('master_jabatan');
                $data['dteselon'] = $this->Sppd_m->last_eselon($id);
                $data['bagian'] = 'admin/edit-sppd-ld-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_sppd_ld($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_golongan'=>$post['id_golongan'],
                    'nomor_sk'=>$post['nomor_sk'],
                    'tanggal_sk'=>$post['tanggal_sk_thn'].'-'.$post['tanggal_sk_bln'].'-'.$post['tanggal_sk_hr'],
                    'tmt_golongan'=>$post['tmt_golongan_thn'].'-'.$post['tmt_golongan_bln'].'-'.$post['tmt_golongan_hr'],
                    'nomor_bkn'=>$post['nomor_bkn'],
                    'tanggal_bkn'=>$post['tanggal_bkn_thn'].'-'.$post['tanggal_bkn_bln'].'-'.$post['tanggal_bkn_hr'],
                    'masa_kerja' =>$post['masa_kerja']
                );
                $this->Pegawai_m->update_data('data_riwayat_golongan','id_riwayat_golongan',$idr,$datainput);
                $pesan = 'Data riwayat golongan baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_rgolongan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function pengikut_sppd($id,$offset=0){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->load->model('admin/Sppd_m');
                $post = $this->input->get();
                $data['titelbag'] = 'psppd';
                $data['title'] = $this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $jumlah = $this->Sppd_m->jumlah_data_detail_pegawai($id,@$post['string']);
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

                $data['detail']=$this->Pegawai_m->detail_pegawai($id);
                $result = $this->Pegawai_m->detail_pegawai($id);
                $data['hasil'] = $result;
                $data['hasil2'] = $this->Sppd_m->searcing_data_detail_pegawai($id,$config['per_page'],$offset,@$post['string']);
                $data['pagging'] = $this->pagination->create_links();
                // pagging setting
                $data['bagian'] = 'admin/pengikut-sppd-ld-v';
                $data['page'] = 'admin/detail-pegawai-v';
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function tambah_pengikut_sppd_ld($id,$sppd){
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
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'psppd';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['hasil2'] = $this->Admin_m->detail_data_order('sppd_ld','id_sppd_ld',$sppd);
                $data['hasil3'] = $this->Sppd_m->data_pengikut($sppd);
                $data['bagian'] = 'admin/tambah-pengikut-sppd-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function rincian_tiket_sppd($id,$offset=0){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->load->model('admin/Sppd_m');
                $post = $this->input->get();
                $data['title'] = $this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $jumlah = $this->Sppd_m->jumlah_data_detail_pegawai($id,@$post['string']);
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

                $data['detail']=$this->Pegawai_m->detail_pegawai($id);
                $result = $this->Pegawai_m->detail_pegawai($id);
                $data['hasil'] = $result;
                $data['hasil2'] = $this->Sppd_m->searcing_data_detail_pegawai($id,$config['per_page'],$offset,@$post['string']);
                $data['pagging'] = $this->pagination->create_links();
                // pagging setting
                $data['bagian'] = 'admin/data-rincian-tiket-v';
                $data['page'] = 'admin/detail-pegawai-v';
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function tambah_sppd_ld($id){
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
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'sppd';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['dtgolongan'] = $this->Sppd_m->last_golongan($id);
                $data['dtpangkat'] = $this->Sppd_m->last_pangkat($id);
                $data['provinsi'] = $this->Pegawai_m->select_data('master_provinsi');
                $data['jnsperjadin'] = $this->Pegawai_m->select_data('master_jenis_perjadin');
                $data['tjabatan'] = $this->Pegawai_m->select_data('master_jabatan');
                $data['dteselon'] = $this->Sppd_m->last_eselon($id);
                $data['bagian'] = 'admin/tambah-sppd-ld-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
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
    public function srt_tugas($id,$sppd){
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
                $data['title'] = 'Cetak Surat Tugas';
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
                $this->load->view('admin/cetak-srt-tgs-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'nama_pegawai' => $post['nama_pegawai'],
                    'nip'=>$post['nip'],
                    'nip_lama'=>$post['nip_lama'],
                    'no_kartu_pegawai'=>$post['no_kartu_pegawai'],
                    'no_npwp'=>$post['no_npwp'],
                    'kartu_askes_pegawai'=>$post['kartu_askes_pegawai'],
                    'tempat_lahir'=>$post['tempat_lahir'],
                    'tanggal_lahir'=>$post['tanggal_lahir'],
                    'nomor_kk'=>$post['nomor_kk'],
                    'nomor_ktp'=>$post['nomor_ktp'],
                    'jenis_kelamin'=>$post['jenis_kelamin'],
                    'agama'=>$post['agama'],
                    'id_golongan'=>$post['id_golongan'],
                    'status_pegawai'=>$post['status_pegawai'],
                    'tanggal_pengangkatan_cpns'=>$post['tanggal_pengangkatan_cpns_thn'].'-'.$post['tanggal_pengangkatan_cpns_bln'].'-'.$post['tanggal_pengangkatan_cpns_hr'],
                    'alamat'=>$post['alamat'],
                    'gaji_pokok'=>$post['gaji_pokok'],
                    'tmt_pns'=>$post['tmt_pns_thn'].'-'.$post['tmt_pns_bln'].'-'.$post['tmt_pns_hr'],
                    'tmt_cpns'=>$post['tmt_cpns_hr'].'-'.$post['tmt_cpns_bln'].'-'.$post['tmt_cpns_thn'],
                    'gelar_dpn'=>$post['gelar_dpn'],
                    'gelar_belakang'=>$post['gelar_belakang'],
                    'no_hp'=>$post['no_hp'],
                    'email'=>$post['email'],
                    'id_satuan_kerja'=>$post['skpd']
                    
                    
                );
                $this->Pegawai_m->insert_data('data_pegawai',$datainput);
                // Buat Akun User
                $username = $post['nip'];
                $email = $post['email'];
                $password = 'password';
                $group = array('2');

                $additional_data = array(
                    'first_name' => $post['nama_pegawai'],
                    'last_name' => $this->Admin_m->info_pt(1)->nama_info_pt,
                    'company' => $this->Admin_m->info_pt(1)->nama_info_pt,
                    'phone' => '123456789',
                    'repassword' => $password,
                    'id_pegawai' => $this->Admin_m->last_id_p()->id_pegawai,
                    );
                $this->ion_auth->register($username, $password, $email, $additional_data, $group);
                // 
                $pesan = 'Data pegawai baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai'));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_sppd_ld(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->load->model('admin/Sppd_m');
                $post = $this->input->post();
                // $uangperhari = $this->Sppd_m->biaya_harian($post['provinsi'],$post['fjabatan'])->biaya;
                // $totbiayaharian =$uangperhari*$post['lama_hari'];
                $datainput = array(
                    'id_pegawai' => $post['id_pegawai'],
                    'id_jenis_perjadin' => $post['id_jenis_perjadin'],
                    'tgl_sppd' => $post['tgl_sppd'],
                    'tahun' => date('Y'),
                    'no_perjadin' => $post['no_perjadin'],
                    // 'nomor' => $post['nomor'],
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
                    'dasar_pelaksanaan_2'=>$post['dasar_pelaksanaan_2'],
                    'dasar_pelaksanaan_3'=>$post['dasar_pelaksanaan_3'],
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
                    'biaya_sisa'=>$post['biaya_sisa'],

                );
                $this->Sppd_m->insert_data('sppd_ld',$datainput);
                
                $pesan = 'Data SPPD baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/daftar_sppd_ld/'.$post['id_pegawai']));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_keluarga($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'nama_anggota_keluarga' => $post['nama_anggota_keluarga'],
                    'id_pegawai' => $idpegawai,
                    'tanggal_lahir'=>$post['tanggal_lahir_thn'].'-'.$post['tanggal_lahir_bln'].'-'.$post['tanggal_lahir_hr'],
                    'status_keluarga'=>$post['status_keluarga'],
                    'status_kawin'=>$post['status_kawin'],
                    'tanggal_nikah'=>$post['tanggal_nikah_thn'].'-'.$post['tanggal_nikah_bln'].'-'.$post['tanggal_nikah_hr'],
                    'tanggal_cerai_meninggal'=>$post['tanggal_cerai_meninggal_thn'].'-'.$post['tanggal_cerai_meninggal_bln'].'-'.$post['tanggal_cerai_meninggal_hr'],
                    'tanggal_meninggal'=>$post['tanggal_meninggal_thn'].'-'.$post['tanggal_meninggal_bln'].'-'.$post['tanggal_meninggal_hr'],
                    'pekerjaan'=>$post['pekerjaan'],
                    'no_kartu'=>$post['no_kartu']
                );
                $this->Pegawai_m->insert_data('data_keluarga',$datainput);
                $pesan = 'Data kerluarga baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_keluarga/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_rpangkat($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_pegawai' => $idpegawai,
                    'id_pangkat'=>$post['id_pangkat'],
                    'status'=>$post['status'],
                    'nomor_sk'=>$post['nomor_sk'],
                    'tanggal_sk'=>$post['tanggal_sk_thn'].'-'.$post['tanggal_sk_bln'].'-'.$post['tanggal_sk_hr'],
                    'tanggal_mulai'=>$post['tanggal_mulai_thn'].'-'.$post['tanggal_mulai_bln'].'-'.$post['tanggal_mulai_hr'],
                    'tanggal_selesai'=>$post['tanggal_selesai_thn'].'-'.$post['tanggal_selesai_bln'].'-'.$post['tanggal_selesai_hr'],
                    'masa_kerja' =>$post['masa_kerja'],
                    'masa_kerja_bulan' =>$post['masa_kerja_bulan'],
                    'masa_kerja_tahun' =>$post['masa_kerja_tahun']
                );
                $this->Pegawai_m->insert_data('data_riwayat_pangkat',$datainput);
                $pesan = 'Data riwayat pangkat baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_rpangkat/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_reselon($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_pegawai' => $idpegawai,
                    'id_eselon'=>$post['id_eselon'],
                    'id_jenis_jabatan'=>$post['id_jenis_jabatan'],
                    'nm_jabatan'=>$post['nm_jabatan'],
                    'nomor_sk'=>$post['nomor_sk']
                );
                $this->Pegawai_m->insert_data('data_riwayat_eselon',$datainput);
                $pesan = 'Data riwayat esleon baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_reselon/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_reselon($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'eselon';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_riwayat_eselon','id_riwayat_eselon',$idr);
                $data['bagian'] = 'admin/edit-reselon-v';
                $data['reselon'] = $this->Pegawai_m->data_reselon($id);
                $data['eselon'] = $this->Pegawai_m->select_data('master_eselon');
                $data['jnsjabatan'] = $this->Pegawai_m->select_data('master_jenis_jabatan');
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_reselon($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_pegawai' => $idpegawai,
                    'id_eselon'=>$post['id_eselon'],
                    'id_jenis_jabatan'=>$post['id_jenis_jabatan'],
                    'nm_jabatan'=>$post['nm_jabatan'],
                    'nomor_sk'=>$post['nomor_sk']
                );
                $this->Pegawai_m->update_data('data_riwayat_eselon','id_riwayat_eselon',$idr,$datainput);
                $pesan = 'Data riwayat eselon baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_reselon/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_rgolongan($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_pegawai' => $idpegawai,
                    'id_golongan'=>$post['id_golongan'],
                    'nomor_sk'=>$post['nomor_sk'],
                    'tanggal_sk'=>$post['tanggal_sk_thn'].'-'.$post['tanggal_sk_bln'].'-'.$post['tanggal_sk_hr'],
                    'tmt_golongan'=>$post['tmt_golongan_thn'].'-'.$post['tmt_golongan_bln'].'-'.$post['tmt_golongan_hr'],
                    'nomor_bkn'=>$post['nomor_bkn'],
                    'tanggal_bkn'=>$post['tanggal_bkn_thn'].'-'.$post['tanggal_bkn_bln'].'-'.$post['tanggal_bkn_hr'],
                    'masa_kerja' =>$post['masa_kerja']
                );
                $this->Pegawai_m->insert_data('data_riwayat_golongan',$datainput);
                $pesan = 'Data riwayat golongan baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_rgolongan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_rjabatan($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_pegawai' => $idpegawai,
                    'id_jenis_jabatan'=>$post['id_jenis_jabatan'],
                    'nm_jabatan'=>$post['nm_jabatan'],
                    'id_satuan_kerja'=>$post['id_satuan_kerja'],
                    'id_eselon'=>$post['id_eselon'],
                    'tmt_jabatan_rj'=>$post['tmt_jabatan_rj_thn'].'-'.$post['tmt_jabatan_rj_bln'].'-'.$post['tmt_jabatan_rj_hr'],
                    'tanggal_sk_rj'=>$post['tanggal_sk_rj_thn'].'-'.$post['tanggal_sk_rj_bln'].'-'.$post['tanggal_sk_rj_hr'],
                    'tmt_pelantikan_rj'=>$post['tmt_pelantikan_rj_thn'].'-'.$post['tmt_pelantikan_rj_bln'].'-'.$post['tmt_pelantikan_rj_hr'],
                    'nomor_sk'=>$post['nomor_sk']
                );
                $this->Pegawai_m->insert_data('data_riwayat_jabatan',$datainput);
                $pesan = 'Data riwayat jabatan baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_rjabatan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_pendidikan($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'tingkat_pendidikan' => $post['tingkat_pendidikan'],
                    'id_pegawai' => $idpegawai,
                    'jurusan'=>$post['jurusan'],
                    'sekolah'=>$post['sekolah'],
                    'tempat_sekolah'=>$post['tempat_sekolah'],
                    'tanggal_lulus'=>$post['tanggal_lulus_thn'].'-'.$post['tanggal_lulus_bln'].'-'.$post['tanggal_lulus_hr'],
                    'nomor_ijazah'=>$post['nomor_ijazah']
                );
                // echo "<pre>";print_r($datainput);echo "<pre/>";exit();
                $this->Pegawai_m->insert_data('data_pendidikan',$datainput);
                $pesan = 'Data pendidikan baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_pendidikan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_pelatihan($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'nama_kursus' => $post['nama_kursus'],
                    'id_pegawai' => $idpegawai,
                    'lama_kursus'=>$post['lama_kursus'],
                    'nomor'=>$post['nomor'],
                    'tanggal'=>$post['tanggal_hr'].'-'.$post['tanggal_bln'],
                    'tahun'=>$post['tahun'],
                    'tanggal'=>$post['tanggal_thn'].'-'.$post['tanggal_bln'].'-'.$post['tanggal_hr'],
                    'no_sertifikat'=>$post['no_sertifikat'],
                    'instansi'=>$post['instansi'],
                    'instansi_penyelenggara'=>$post['instansi_penyelenggara']
                );
                $this->Pegawai_m->insert_data('data_pelatihan',$datainput);
                $pesan = 'Data pelatihan baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_pelatihan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_penghargaan($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'jenis_penghargaan' => $post['jenis_penghargaan'],
                    'id_pegawai' => $idpegawai,
                    'no_keputusan' => $post['no_keputusan'],
                    'tanggal'=>$post['tanggal_thn'].'-'.$post['tanggal_bln'].'-'.$post['tanggal_hr'],
                    'tahun' => $post['tahun']
                );
                $this->Pegawai_m->insert_data('data_penghargaan',$datainput);
                $pesan = 'Data Penghargaan baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_penghargaan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_seminar($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'uraian' => $post['uraian'],
                    'id_pegawai' => $idpegawai,
                    'lokasi'=>$post['lokasi'],
                    'tanggal'=>$post['tanggal_thn'].'-'.$post['tanggal_bln'].'-'.$post['tanggal_hr']
                );
                $this->Pegawai_m->insert_data('data_seminar',$datainput);
                $pesan = 'Data seminar baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_seminar/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_organisasi($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_satuan_kerja'=>$post['id_satuan_kerja'],
                    'id_pegawai' => $idpegawai,
                    'nomor'=>$post['nomor'],
                    'tanggal'=>$post['tanggal_thn'].'-'.$post['tanggal_bln'].'-'.$post['tanggal_hr']
                );
                $this->Pegawai_m->insert_data('data_organisasi',$datainput);
                $pesan = 'Data organisasi baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_organisasi/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_gaji_pokok($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'nomor_sk' => $post['nomor_sk'],
                    'id_pegawai' => $idpegawai,
                    'tanggal_sk'=>$post['tanggal_sk_thn'].'-'.$post['tanggal_sk_bln'].'-'.$post['tanggal_sk_hr'],
                    'dasar_perubahan'=>$post['dasar_perubahan'],
                    'gaji_pokok'=>$post['gaji_pokok'],
                    'tanggal_mulai'=>$post['tanggal_mulai_thn'].'-'.$post['tanggal_mulai_bln'].'-'.$post['tanggal_mulai_hr'],
                    'tanggal_selesai'=>$post['tanggal_selesai_thn'].'-'.$post['tanggal_selesai_bln'].'-'.$post['tanggal_selesai_hr'],
                    'masa_kerja'=>$post['masa_kerja'],
                    'pejabat_menetapkan'=>$post['pejabat_menetapkan']
                );
                $this->Pegawai_m->insert_data('data_gaji_pokok',$datainput);
                $pesan = 'Data gaji pokok baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_gaji_pokok/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_hukuman($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'uraian' => $post['uraian'],
                    'id_pegawai' => $idpegawai,
                    'nomor_sk'=>$post['nomor_sk'],
                    'tanggal_sk'=>$post['tanggal_sk_thn'].'-'.$post['tanggal_sk_bln'].'-'.$post['tanggal_sk_hr'],
                    'tanggal_mulai'=>$post['tanggal_mulai_thn'].'-'.$post['tanggal_mulai_bln'].'-'.$post['tanggal_mulai_hr'],
                    'tanggal_selesai'=>$post['tanggal_selesai_thn'].'-'.$post['tanggal_selesai_bln'].'-'.$post['tanggal_selesai_hr'],

                    'no_sk_pembatalan' =>$post['no_sk_pembatalan']

                  
                );
                $this->Pegawai_m->insert_data('data_hukuman',$datainput);
                $pesan = 'Data hukuman baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_hukuman/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_dp3($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'tahun' => $post['tahun'],
                    'id_pegawai' => $idpegawai,
                    'kesetiaan'=>$post['kesetiaan'],
                    'prestasi'=>$post['prestasi'],
                    'tanggung_jawab'=>$post['tanggung_jawab'],
                    'ketaatan'=>$post['ketaatan'],
                    'kejujuran'=>$post['kejujuran'],
                    'kerjasama'=>$post['kerjasama'],
                    'prakarsa'=>$post['prakarsa'],
                    'kepemimpinan'=>$post['kepemimpinan'],
                    'rata_rata'=>$post['rata_rata'],
                    'atasan_pejabat_penilai'=>$post['atasan_pejabat_penilai'],
                    'pejabat_penilai'=>$post['pejabat_penilai'],
                    'atasan_pejabat_penilai'=>$post['atasan_pejabat_penilai'],
                    'mengetahui'=>$post['mengetahui']
                );
                $this->Pegawai_m->insert_data('data_dp3',$datainput);
                $pesan = 'Data riwayat jabatan baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_dp3/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_rpangkat($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'rpang';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_riwayat_pangkat','id_riwayat_pangkat',$idr);
                $data['bagian'] = 'admin/edit-rpangkat-v';
                $data['rpangkat'] = $this->Pegawai_m->data_rpangkat($id);
                $data['pangkat'] = $this->Pegawai_m->select_data('master_pangkat');
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_rpangkat($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_pangkat'=>$post['id_pangkat'],
                    'status'=>$post['status'],
                    'nomor_sk'=>$post['nomor_sk'],
                    'tanggal_sk'=>$post['tanggal_sk_thn'].'-'.$post['tanggal_sk_bln'].'-'.$post['tanggal_sk_hr'],
                    'tanggal_mulai'=>$post['tanggal_mulai_thn'].'-'.$post['tanggal_mulai_bln'].'-'.$post['tanggal_mulai_hr'],
                    'tanggal_selesai'=>$post['tanggal_selesai_thn'].'-'.$post['tanggal_selesai_bln'].'-'.$post['tanggal_selesai_hr'],
                    'masa_kerja' =>$post['masa_kerja'],
                    'masa_kerja_bulan' =>$post['masa_kerja_bulan'],
                    'masa_kerja_tahun' =>$post['masa_kerja_tahun']
                );
                $this->Pegawai_m->update_data('data_riwayat_pangkat','id_riwayat_pangkat',$idr,$datainput);
                $pesan = 'Data riwayat pangkat baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_rpangkat/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_rgolongan($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['titelbag'] = 'rgol';
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_riwayat_golongan','id_riwayat_golongan',$idr);
                $data['bagian'] = 'admin/edit-rgolongan-v';
                $data['jeniskp'] = $this->Admin_m->select_data('master_status_jabatan');
                $data['golongan'] = $this->Admin_m->select_data('master_golongan');
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_rgolongan($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_golongan'=>$post['id_golongan'],
                    'nomor_sk'=>$post['nomor_sk'],
                    'tanggal_sk'=>$post['tanggal_sk_thn'].'-'.$post['tanggal_sk_bln'].'-'.$post['tanggal_sk_hr'],
                    'tmt_golongan'=>$post['tmt_golongan_thn'].'-'.$post['tmt_golongan_bln'].'-'.$post['tmt_golongan_hr'],
                    'nomor_bkn'=>$post['nomor_bkn'],
                    'tanggal_bkn'=>$post['tanggal_bkn_thn'].'-'.$post['tanggal_bkn_bln'].'-'.$post['tanggal_bkn_hr'],
                    'masa_kerja' =>$post['masa_kerja']
                );
                $this->Pegawai_m->update_data('data_riwayat_golongan','id_riwayat_golongan',$idr,$datainput);
                $pesan = 'Data riwayat golongan baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_rgolongan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_rjabatan($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                $data['titelbag'] = 'rjab';
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_riwayat_jabatan','id_riwayat_jabatan',$idr);
                // echo "<pre/>";print_r($data['detail']);echo "<pre/>";exit();
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['golongan'] = $this->Pegawai_m->select_data('master_golongan');
                $data['sjabatan'] = $this->Pegawai_m->select_data('master_status_jabatan');
                $data['jnsjabatan'] = $this->Pegawai_m->select_data('master_jenis_jabatan');
                $data['satuankerja'] = $this->Pegawai_m->select_data('master_satuan_kerja');
                $data['eselon'] = $this->Pegawai_m->select_data('master_eselon');
                $data['jabatan'] = $this->Pegawai_m->select_data('master_jabatan');
                $data['bagian'] = 'admin/edit-rjabatan-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_rjabatan($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'id_pegawai' => $idpegawai,
                    'id_jenis_jabatan'=>$post['id_jenis_jabatan'],
                    'nm_jabatan'=>$post['nm_jabatan'],
                    'id_satuan_kerja'=>$post['id_satuan_kerja'],
                    'id_eselon'=>$post['id_eselon'],
                    'tmt_jabatan_rj'=>$post['tmt_jabatan_rj_thn'].'-'.$post['tmt_jabatan_rj_bln'].'-'.$post['tmt_jabatan_rj_hr'],
                    'nomor_sk'=>$post['nomor_sk'],
                    'tanggal_sk_rj'=>$post['tanggal_sk_rj_thn'].'-'.$post['tanggal_sk_rj_bln'].'-'.$post['tanggal_sk_rj_hr'],
                    'tmt_pelantikan_rj'=>$post['tmt_pelantikan_rj_thn'].'-'.$post['tmt_pelantikan_rj_bln'].'-'.$post['tmt_pelantikan_rj_hr'],
                    'nomor_sk'=>$post['nomor_sk']
                );
                $this->Pegawai_m->update_data('data_riwayat_jabatan','id_riwayat_jabatan',$idr,$datainput);
                $pesan = 'Data riwayat jabatan baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_rjabatan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_pendidikan($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_pendidikan','id_pendidikan',$idr);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['ipendidikan'] = $this->Pegawai_m->select_data('master_pendidikan');
                $data['bagian'] = 'admin/edit-pendidikan-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_pendidikan($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                // echo "<pre>";print_r($post) ;echo "<pre/>";exit();
                $datainput = array(
                    'tingkat_pendidikan' => $post['tingkat_pendidikan'],
                    'id_pegawai' => $idpegawai,
                    'jurusan'=>$post['jurusan'],
                    'sekolah'=>$post['sekolah'],
                    'tempat_sekolah'=>$post['tempat_sekolah'],
                    'tanggal_lulus'=>$post['tanggal_lulus_thn'].'-'.$post['tanggal_lulus_bln'].'-'.$post['tanggal_lulus_hr'],
                    'nomor_ijazah'=>$post['nomor_ijazah']
                );
                $this->Pegawai_m->update_data('data_pendidikan','id_pendidikan',$idr,$datainput);
                $pesan = 'Data riwayat pendidikan baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_pendidikan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_pegawai($idpegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                // echo "<pre>";print_r($post) ;echo "<pre/>";exit();
                $datainput = array(
                    'nama_pegawai' => $post['nama_pegawai'],
                    'nip'=>$post['nip'],
                    'nip_lama'=>$post['nip_lama'],
                    'no_kartu_pegawai'=>$post['no_kartu_pegawai'],
                    'no_npwp'=>$post['no_npwp'],
                    'kartu_askes_pegawai'=>$post['kartu_askes_pegawai'],
                    'tempat_lahir'=>$post['tempat_lahir'],
                    'tanggal_lahir'=>$post['tanggal_lahir'],
                    'nomor_kk'=>$post['nomor_kk'],
                    'nomor_ktp'=>$post['nomor_ktp'],
                    'jenis_kelamin'=>$post['jenis_kelamin'],
                    'agama'=>$post['agama'],
                    'status_pegawai'=>$post['status_pegawai'],
                    'tanggal_pengangkatan_cpns'=>$post['tanggal_pengangkatan_cpns_thn'].'-'.$post['tanggal_pengangkatan_cpns_bln'].'-'.$post['tanggal_pengangkatan_cpns_hr'],
                    'alamat'=>$post['alamat'],
                    'gaji_pokok'=>$post['gaji_pokok'],
                    'tmt_pns'=>$post['tmt_pns_thn'].'-'.$post['tmt_pns_bln'].'-'.$post['tmt_pns_hr'],
                    'tmt_cpns'=>$post['tmt_cpns_thn'].'-'.$post['tmt_cpns_bln'].'-'.$post['tmt_cpns_hr'],
                    'gelar_dpn'=>$post['gelar_dpn'],
                    'gelar_belakang'=>$post['gelar_belakang'],
                    'no_hp'=>$post['no_hp'],
                    'email'=>$post['email'],
                    'id_satuan_kerja'=>$post['skpd']
                );
                $this->Pegawai_m->update_data('data_pegawai','id_pegawai',$idpegawai,$datainput);
                $pesan = 'Data riwayat pendidikan baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_foto_pegawai(){
        $post = $this->input->post();
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                if (!empty($_FILES["fotop"])) {
                    $config['file_name'] = strtolower(url_title('pegawai'.'-'.$post['id_pegawai'].'-'.date('ymd').'-'.time('hms')));
                    $config['upload_path'] = './asset/img/pegawai/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = 2048;
                    $config['max_width'] = '';
                    $config['max_height'] = '';

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('fotop')){
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('eror', $error );
                        redirect(base_url('index.php/admin/pegawai/detail/'.$post['id_pegawai']));
                    }
                    else{
                        $file = $this->Admin_m->detail_data_order('data_pegawai','id_pegawai',$post['id_pegawai'])->foto;
                        if ($file != "avatar.png") {
                            unlink("asset/img/pegawai/$file");
                        }
                        $img = $this->upload->data('file_name');
                        $data['foto'] = $img;
                        $this->Admin_m->update('data_pegawai','id_pegawai',$post['id_pegawai'],$data);
                        $file = "asset/img/pegawai/$img";
                        //output resize (bisa juga di ubah ke format yang berbeda ex: jpg, png dll)
                        $resizedFile = "asset/img/pegawai/$img";
                        $this->resize->smart_resize_image(null , file_get_contents($file), 250 , 250 , false , $resizedFile , true , false ,100 );
                        $pesan = 'Foto Pegawai Berhasil diubah';
                        $this->session->set_flashdata('message', $pesan );
                        redirect(base_url('index.php/admin/pegawai/detail/'.$post['id_pegawai']));
                    }
                }
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_pelatihan($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_pelatihan','id_pelatihan',$idr);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/edit-pelatihan-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_pelatihan($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                 'uraian' => $post['uraian'],
                 'lokasi'=>$post['lokasi'],
                 'nomor'=>$post['nomor'],
                 'tanggal'=>$post['tanggal_hr'].'-'.$post['tanggal_bln'],
                 'tahun'=>$post['tahun'],
                    'nama_kursus' => $post['nama_kursus'],
                    'lama_kursus'=>$post['lama_kursus'],
                    'nomor'=>$post['nomor'],
                    'tanggal'=>$post['tanggal_thn'].'-'.$post['tanggal_bln'].'-'.$post['tanggal_hr'],
                    'no_sertifikat'=>$post['no_sertifikat'],
                    'instansi'=>$post['instansi'],
                    'instansi_penyelenggara'=>$post['instansi_penyelenggara']
                );
                $this->Pegawai_m->update_data('data_pelatihan','id_pelatihan',$idr,$datainput);
                $pesan = 'Data riwayat pelatihan baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_pelatihan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_penghargaan($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_penghargaan','id_penghargaan',$idr);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/edit-penghargaan-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_penghargaan($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(


                 'jenis_penghargaan' => $post['jenis_penghargaan'],
                 'no_keputusan' => $post['no_keputusan'],
                 'tanggal'=>$post['tanggal_hr'].'-'.$post['tanggal_bln'],
                 'tahun' => $post['tahun'],
   

                   'jenis_penghargaan' => $post['jenis_penghargaan'],
                   'no_keputusan' => $post['no_keputusan'],
                   'tanggal'=>$post['tanggal_thn'].'-'.$post['tanggal_bln'].'-'.$post['tanggal_hr'],
                   'tahun' => $post['tahun']
               );

                $this->Pegawai_m->update_data('data_penghargaan','id_penghargaan',$idr,$datainput);
                $pesan = 'Data riwayat penghargaan baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_penghargaan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_seminar($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_seminar','id_seminar',$idr);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/edit-seminar-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_seminar($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                   'uraian' => $post['uraian'],
                   'lokasi'=>$post['lokasi'],
                   'tanggal'=>$post['tanggal_thn'].'-'.$post['tanggal_bln'].'-'.$post['tanggal_hr']
               );
                $this->Pegawai_m->update_data('data_seminar','id_seminar',$idr,$datainput);
                $pesan = 'Data riwayat seminar baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_seminar/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_organisasi($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_organisasi','id_organisasi',$idr);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/edit-organisasi-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_organisasi($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                   'id_satuan_kerja'=>$post['id_satuan_kerja'],
                   'nomor'=>$post['nomor'],
                   'tanggal'=>$post['tanggal_thn'].'-'.$post['tanggal_bln'].'-'.$post['tanggal_hr']
               );
                $this->Pegawai_m->update_data('data_organisasi','id_organisasi',$idr,$datainput);
                $pesan = 'Data riwayat organisasi baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_organisasi/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_gaji_pokok($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_gaji_pokok','id_gaji_pokok',$idr);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/edit-gaji_pokok-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_gaji_pokok($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                   'nomor_sk' => $post['nomor_sk'],
                   'tanggal_sk'=>$post['tanggal_sk_thn'].'-'.$post['tanggal_sk_bln'].'-'.$post['tanggal_sk_hr'],
                   'dasar_perubahan'=>$post['dasar_perubahan'],
                   'gaji_pokok'=>$post['gaji_pokok'],
                   'tanggal_mulai'=>$post['tanggal_mulai_thn'].'-'.$post['tanggal_mulai_bln'].'-'.$post['tanggal_mulai_hr'],
                   'tanggal_selesai'=>$post['tanggal_selesai_thn'].'-'.$post['tanggal_selesai_bln'].'-'.$post['tanggal_selesai_hr'],
                   'masa_kerja'=>$post['masa_kerja'],
                   'pejabat_menetapkan'=>$post['pejabat_menetapkan']
               );
                $this->Pegawai_m->update_data('data_gaji_pokok','id_gaji_pokok',$idr,$datainput);
                $pesan = 'Data riwayat gaji pokok baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_gaji_pokok/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_hukuman($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_hukuman','id_hukuman',$idr);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/edit-hukuman-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_hukuman($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(

                 'uraian' => $post['uraian'],
                 'nomor_sk'=>$post['nomor_sk'],
                 'tanggal_sk'=>$post['tanggal_sk_thn'].'-'.$post['tanggal_sk_bln'].'-'.$post['tanggal_sk_hr'],
                 'tanggal_mulai'=>$post['tanggal_mulai_thn'].'-'.$post['tanggal_mulai_bln'].'-'.$post['tanggal_mulai_hr'],
                 'tanggal_selesai'=>$post['tanggal_selesai_thn'].'-'.$post['tanggal_selesai_bln'].'-'.$post['tanggal_selesai_hr'],
                 'no_sk_pembatalan' =>$post['no_sk_pembatalan'],
                   'uraian' => $post['uraian'],
                   'nomor_sk'=>$post['nomor_sk'],
                   'tanggal_sk'=>$post['tanggal_sk_thn'].'-'.$post['tanggal_sk_bln'].'-'.$post['tanggal_sk_hr'],
                   'tanggal_mulai'=>$post['tanggal_mulai_thn'].'-'.$post['tanggal_mulai_bln'].'-'.$post['tanggal_mulai_hr'],
                   'tanggal_selesai'=>$post['tanggal_selesai_thn'].'-'.$post['tanggal_selesai_bln'].'-'.$post['tanggal_selesai_hr'],
                   'no_sk_pembatalan'=>$post['no_sk_pembatalan']
               );
                $this->Pegawai_m->update_data('data_hukuman','id_hukuman',$idr,$datainput);
                $pesan = 'Data riwayat hukuman baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_hukuman/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_dp3($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_dp3','id_dp3',$idr);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['bagian'] = 'admin/edit-dp3-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function update_dp3($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                 'tahun' => $post['tahun'],
                 'id_pegawai' => $idpegawai,
                 'rata_rata'=>$post['rata_rata'],
                 'atasan_pejabat_penilai'=>$post['atasan_pejabat_penilai'],
                 'pejabat_penilai'=>$post['pejabat_penilai'],
                 
                   'tahun' => $post['tahun'],
                   'kesetiaan'=>$post['kesetiaan'],
                   'prestasi'=>$post['prestasi'],
                   'tanggung_jawab'=>$post['tanggung_jawab'],
                   'ketaatan'=>$post['ketaatan'],
                   'kejujuran'=>$post['kejujuran'],
                   'kerjasama'=>$post['kerjasama'],
                   'prakarsa'=>$post['prakarsa'],
                   'kepemimpinan'=>$post['kepemimpinan'],
                   'rata_rata'=>$post['rata_rata'],
                   'pejabat_penilai'=>$post['pejabat_penilai'],
                   'atasan_pejabat_penilai'=>$post['atasan_pejabat_penilai'],
                   'mengetahui'=>$post['mengetahui']
               );
                $this->Pegawai_m->update_data('data_dp3','id_dp3',$idr,$datainput);
                $pesan = 'Data riwayat dp3 baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_dp3/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_keluarga($id,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->Pegawai_m->detail_pegawai($id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama_pegawai;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['hasil'] = $result;
                $data['detail'] = $this->Pegawai_m->detail_data('data_keluarga','id_data_keluarga',$idr);
                $data['status'] = $this->Pegawai_m->select_data('master_status_pegawai');
                $data['stat_kawin'] = $this->Pegawai_m->select_data('master_status_kawin');
                $data['stat_keluarga'] = $this->Pegawai_m->select_data('master_status_dalam_keluarga');
                $data['bagian'] = 'admin/edit-keluarga-v';
                $data['page'] = 'admin/detail-pegawai-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function update_keluarga($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'nama_anggota_keluarga' => $post['nama_anggota_keluarga'],
                    'tanggal_lahir'=>$post['tanggal_lahir_thn'].'-'.$post['tanggal_lahir_bln'].'-'.$post['tanggal_lahir_hr'],
                    'status_keluarga'=>$post['status_keluarga'],
                    'status_kawin'=>$post['status_kawin'],
                    'tanggal_nikah'=>$post['tanggal_nikah_thn'].'-'.$post['tanggal_nikah_bln'].'-'.$post['tanggal_nikah_hr'],
                    'tanggal_cerai_meninggal'=>$post['tanggal_cerai_meninggal_thn'].'-'.$post['tanggal_cerai_meninggal_bln'].'-'.$post['tanggal_cerai_meninggal_hr'],
                    'tanggal_meninggal'=>$post['tanggal_meninggal_thn'].'-'.$post['tanggal_meninggal_bln'].'-'.$post['tanggal_meninggal_hr'],
                    'pekerjaan'=>$post['pekerjaan'],
                    'no_kartu'=>$post['no_kartu']
                );
                $this->Pegawai_m->update_data('data_keluarga','id_data_keluarga',$idr,$datainput);
                $pesan = 'Data riwayat keluarga baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_keluarga/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_dp3($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_dp3','id_dp3',$idr);
                $pesan = 'Data riwayat dp3 baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_dp3/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_keluarga($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_keluarga','id_data_keluarga',$idr);
                $pesan = 'Data riwayat keluarga baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_keluarga/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_rpangkat($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_riwayat_pangkat','id_riwayat_pangkat',$idr);
                $pesan = 'Data riwayat pangkat baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_rpangkat/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_reselon($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_riwayat_eselon','id_riwayat_eselon',$idr);
                $pesan = 'Data riwayat eselon baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_reselon/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }

    public function delete_rgolongan($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_riwayat_golongan','id_riwayat_golongan',$idr);
                $pesan = 'Data riwayat golongan baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_rgolongan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_rjabatan($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_riwayat_jabatan','id_riwayat_jabatan',$idr);
                $pesan = 'Data riwayat jabatan baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_rjabatan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_pendidikan($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_pendidikan','id_pendidikan',$idr);
                $pesan = 'Data riwayat pendidikan baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_pendidikan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_pelatihan($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_pelatihan','id_pelatihan',$idr);
                $pesan = 'Data riwayat pelatihan baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_pelatihan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_penghargaan($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_penghargaan','id_penghargaan',$idr);
                $pesan = 'Data riwayat penghargaan baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_penghargaan/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_seminar($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_seminar','id_seminar',$idr);
                $pesan = 'Data riwayat seminar baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_seminar/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_organisasi($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_organisasi','id_organisasi',$idr);
                $pesan = 'Data riwayat organisasi baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_organisasi/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_gaji_pokok($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_gaji_pokok','id_gaji_pokok',$idr);
                $pesan = 'Data riwayat gaji baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_gaji_pokok/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_hukuman($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_hukuman','id_hukuman',$idr);
                $pesan = 'Data riwayat hukuman baru berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/detail_hukuman/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_sppd_ld($idpegawai,$idr){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('sppd_ld','id_sppd_ld',$idr);
                $pesan = 'Data riwayat sppd berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/daftar_sppd_ld/'.$idpegawai));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function delete_pegawai($id_pegawai){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->Pegawai_m->delete_data('data_pegawai','id_pegawai',$id_pegawai);
                $pesan = 'Data Pegawai berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/'));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    public function uploadImage() {
        $this->load->helper(array('form', 'url'));  
        $config['upload_path'] = 'assets/images/pegawai';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width'] = '';
        $config['max_height'] = '';
        $config['width'] = 75;
        $config['height'] = 50;
        if (isset($_FILES['foto']['nama_pegawai'])) {
            $filename = "-" . $_FILES['foto']['nama_pegawai'];
            $config['file_name'] = substr(md5(time()), 0, 28) . $filename;
        }
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $field_name = "foto";
        $this->load->library('upload', $config);
        if ($this->input->post('selsub')) {
            if (!$this->upload->do_upload('foto')) {
                //no file uploaded or failed upload
                $error = array('error' => $this->upload->display_errors());
            } else {
                $dat = array('upload_data' => $this->upload->data());
                $this->resize($dat['upload_data']['full_path'],           $dat['upload_data']['file_name']);
            }
            $ip = $_SERVER['REMOTE_ADDR'];
            if (empty($dat['upload_data']['file_name'])) {
                $catimage = '';
            } else {
                $catimage = $dat['upload_data']['file_name'];
            }
            $data = array(            
                'ctg_image' => $catimage,
                'ctg_dated' => time()
            );
            $this->b2bcategory_model->form_insert($data);

        }
    }
    public function cetak_data_pegawai($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->load->model('admin/Sppd_m');
                $result = $this->Pegawai_m->detail_pegawai($id);
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['title'] = $result->nama_pegawai;
                $data['hasil'] = $result;
                $data['hasil2'] = $this->Admin_m->select_data_order('sppd_ld','id_pegawai',$id);
                $data['pelatihan'] = $this->Pegawai_m->data_pelatihan($id);
                $data['dtgolongan'] = $this->Sppd_m->last_golongan($id);
                $data['dtpangkat'] = $this->Sppd_m->last_pangkat($id);
                $data['statpeg'] = $this->Admin_m->detail_data_order('master_status_pegawai','id_status_pegawai',$result->id_status_pegawai);
                $data['agama'] = $this->Admin_m->detail_data_order('master_agama','id_agama',$result->agama);
                $data['unit_org'] = $this->Admin_m->detail_data_order('master_satuan_kerja','id_satuan_kerja',$result->id_satuan_kerja);
                $data['keluarga'] = $this->Admin_m->select_data_order('data_keluarga','id_pegawai',$id);
                $data['golongan'] = $this->Admin_m->select_data_order('data_riwayat_golongan','id_pegawai',$id);
                $data['jabatan'] = $this->Admin_m->select_data_order('data_riwayat_jabatan','id_pegawai',$id);
                $data['pendidikan'] = $this->Admin_m->select_data_order('data_pendidikan','id_pegawai',$id);
                $data['pelatihan'] = $this->Admin_m->select_data_order('data_pelatihan','id_pegawai',$id);
                $data['penghargaan'] = $this->Admin_m->select_data_order('data_penghargaan','id_pegawai',$id);
                $data['seminar'] = $this->Admin_m->select_data_order('data_seminar','id_pegawai',$id);
                $data['organisasi'] = $this->Admin_m->select_data_order('data_organisasi','id_pegawai',$id);
                $data['gaji_pokok'] = $this->Admin_m->select_data_order('data_gaji_pokok','id_pegawai',$id);
                $data['hukuman'] = $this->Admin_m->select_data_order('data_hukuman','id_pegawai',$id);
                $data['data_dp3'] = $this->Admin_m->select_data_order('data_dp3','id_pegawai',$id);
                // pagging setting
                $this->load->view('admin/cetak-detail-pegawai-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function caripengikut(){
        $this->load->model('admin/Sppd_m');
        $post = $this->input->post();
        $cari = $post['string'];
        $id_sppd = $post['idsppd'];
        // echo $post['string'];
        $hasil = $this->Sppd_m->cari_pengikut($cari);
        if ($hasil == TRUE) {
            foreach ($hasil as $data) {
                echo '<tr><td>'.$data->nama_pegawai.'</td><td>'.$data->nip.'</td><td><a href="'.base_url('index.php/admin/pegawai/create_pengikut_sppd/'.$data->id_pegawai.'/'.$id_sppd).'">Tambahkan</a></td>';
            }

        }else{
            echo "Pegawai tidak ditemukan";
        }
    }
    public function caripengikuth(){
        $this->load->model('admin/Sppd_m');
        $post = $this->input->post();
        $cari = $post['string'];
        $id_sppd = $post['idsppd'];
        // echo $post['string'];
        $hasil = $this->Sppd_m->cari_pengikuth($cari);
        if ($hasil == TRUE) {
            foreach ($hasil as $data) {
                echo '<tr><td>'.$data->nama.'</td><td><a href="'.base_url('index.php/admin/pegawai/create_pengikuth_sppd/'.$data->id_honorer.'/'.$id_sppd).'">Tambahkan</a></td>';
            }

        }else{
            echo "Pegawai tidak ditemukan";
        }
    }
    public function caripengikutp(){
        $this->load->model('admin/Sppd_m');
        $post = $this->input->get();
        $cari = $post['string'];
        $id_sppd = $post['idsppd'];
        // echo $post['string'];
        $hasil = $this->Sppd_m->cari_pengikut($cari);
        if ($hasil == TRUE) {
            foreach ($hasil as $data) {
                echo '<tr><td>'.$data->nama_pegawai.'</td><td><a href="'.base_url('index.php/admin/pegawai/create_pengikuth_sppd/'.$data->id_pegawai.'/'.$id_sppd).'">Tambahkan</a></td>';
            }

        }else{
            echo "Pegawai tidak ditemukan";
        }
    }
     public function create_pengikut_sppd($idpegawai,$idsppd){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array('id_pegawai'=>$idpegawai,'id_sppd' => $idsppd,'lvl'=>'pegawai');
                $this->Pegawai_m->insert_data('master_pengikut',$datainput);
                $pesan = 'Data pengikut baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/tambah_pengikut_sppd_ld/'.$idpegawai.'/'.$idsppd));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function create_pengikuth_sppd($idpegawai,$idsppd){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array('id_pegawai'=>$idpegawai,'id_sppd' => $idsppd,'lvl'=>'honorer');
                $this->Pegawai_m->insert_data('master_pengikut',$datainput);
                $pesan = 'Data pengikut baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/pegawai/tambah_pengikut_sppd_ld/'.$idpegawai.'/'.$idsppd));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function biayaharian(){
        $post = $this->input->post();
        $prov = $post['id_provinsi'];
        $jab = $post['id_jabatan'];
        $biaya = $this->Pegawai_m->gtdataharian($prov,$jab)->biaya;
        if ($biaya == TRUE) {
            echo $biaya;
        }else{
            echo "Provinsi atau Jabatan belum di pilih";
        }
    }
    public function biayahotel(){
        $post = $this->input->post();
        $prov = $post['id_provinsi'];
        $jab = $post['id_jabatan'];
        $biaya = $this->Pegawai_m->gtdatahotel($prov,$jab)->biaya;
        if ($biaya == TRUE) {
            echo $biaya;
        }else{
            echo "Provinsi atau Jabatan belum di pilih";
        }
    }
    public function ttlbiayaharian(){
        $post = $this->input->post();
        $prov = $post['id_provinsi'];
        $jab = $post['id_jabatan'];
        $lh = $post['lama_hari'];
        $biaya = $this->Pegawai_m->gtdatahotel($prov,$jab)->biaya;
        if ($biaya == TRUE) {
            echo $biaya*$lh;
        }else{
            echo "Beberapa data belum diisi";
        }
    }
    public function ttlbiayahotel(){
        $post = $this->input->post();
        $prov = $post['id_provinsi'];
        $jab = $post['id_jabatan'];
        $lh = $post['lama_hari'];
        $biaya = $this->Pegawai_m->gtdatahotel($prov,$jab)->biaya;
        if ($biaya == TRUE) {
            echo $biaya*$lh;
        }else{
            echo "Beberapa data belum diisi";
        }
    }
}
?>