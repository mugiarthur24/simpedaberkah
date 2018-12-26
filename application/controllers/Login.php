<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('form');
    }

    function index(){
        $this->load->model('admin/Admin_m');
        if($this->ion_auth->logged_in()){
        //sudah login, redirect ke halaman welcome
        redirect(base_url('index.php/admin/dashboard'));
       }
        //user tidak login, tampilkan halaman login
       $data['title'] = 'log In';
       $data['infopt'] = $this->Admin_m->info_pt(1);
       $this->load->view('admin/login-v', $data);
   }
   function proses_login(){
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->ion_auth->login($this->input->post('username'),$this->input->post('password'))) {
       //jika login sukses, redirect ke halaman admin
        redirect(base_url('index.php/admin/dashboard'));
        }else{
        //jika login gagal, redirect kembali ke halaman login
        //redirect('login','refresh'); //use redirect instead of loading views compatibility with MY_Controller libraries
        $pesan = $this->ion_auth->errors();
        $this->session->set_flashdata('message', $pesan ); 
        redirect(base_url('index.php/login'));
        }
    }
    function logout(){
        //log the user out
        $logout = $this->ion_auth->logout();
        //redirect ke halaman sebelumnya
        redirect(base_url('index.php/login'));
    }
    function forgot_password()
        {
            $this->form_validation->set_rules('email', 'Email Address', 'required');
            if ($this->form_validation->run() == false) {
                //setup the input
                $data['title'] ='Forgot Password';
                $data['email'] = array('name' => 'email','id' => 'email');
                //set any errors and display the form
                $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $this->load->view('forgot-password-v', $data);
            }
            else {
                //run the forgotten password method to email an activation code to the user
                $forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));

                if ($forgotten) { //if there were no errors
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                    redirect(base_url('index.php/login')); //we should display a confirmation page here instead of the login page
                }
                else {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                    redirect(base_url('index.php/login/forgot_password'));
                }
            }
        }
}
?>