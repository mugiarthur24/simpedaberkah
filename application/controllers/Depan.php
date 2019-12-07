<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Depan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/Pegawai_m');
    }
    public function index($offset=0){
        $data['title'] = $this->Admin_m->info_pt(1)->nama_info_pt;
        $data['infopt'] = $this->Admin_m->info_pt(1);
        $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
        $data['users'] = $this->ion_auth->user()->row();
        $megol = $this->Admin_m->select_data('master_golongan');
        $mejab = $this->Admin_m->select_data('master_eselon');
        // echo "<pre>";print_r($this->Pegawai_m->jml());echo "<pre/>";exit();
        $data['mgol'] =$megol;
        $data['mjab'] =$mejab;
        // echo "<pre>";print_r($data['mgol']);echo "<pre/>";exit();
                // pagging setting
        $this->load->view('admin/depan',$data);
    }
}
?>
