<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
         $this->load->model('admin/Mread');
    }
    public function index($offset=0){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members','skpd','honorer');
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
                $data['chart'] = $this->Mread->chart();
                // echo "<pre>";print_r($data['skpd']);echo "<pre/>";exit();
                $data['page'] = 'admin/beranda-v';
                $nskpd = $this->Admin_m->select_data_s_k();
        // echo "<pre>";print_r($nskpd);echo "<pre/>";exit();
                $namagol = array();
                foreach ($nskpd as $gol) {
                    $namagol[] = $gol->nama_satuan_kerja.','.'19.2';
                }
                $data['mgol'] = $namagol;
                $data['fmgol'] = $nskpd;
        // echo "<pre>";print_r( $data['mgol']);echo "<pre/>";exit();

                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function dataskpd(){
    $queryResult = $this->Admin_m->select_data('master_satuan_kerja');
    $result  = array();
    while($fethData = $queryResult->fetch_assoc()){
        $result[] = $fethData;
    }
    echo json_encode($result);
}
}


?>
