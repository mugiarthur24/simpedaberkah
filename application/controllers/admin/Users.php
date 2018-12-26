<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('admin/Admin_m');
		$this->load->library('resize');
	}
	public function index(){
		if ($this->ion_auth->logged_in()) {
			$level = array('admin');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/admin/dashboard'));
			}else{
				$post = $this->input->get();
				$data['title'] = 'Daftar users - '.$this->Admin_m->info_pt(1)->nama_info_pt;
				$data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
				$data['users'] = $this->ion_auth->user()->row();
				$data['aside'] = 'nav/nav';
				$data['page'] = 'admin/daftar-users-v';
				$data['groups'] = $this->ion_auth->groups()->result();
				$data['hasil'] = $this->ion_auth->users()->result();
				$this->load->view('admin/dashboard-v',$data);
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/admin//login'));
		}
	}
	public function proses_create(){
		if ($this->ion_auth->logged_in()) {
			$level=array('admin');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/admin/dashboard'));
			}else{
				$username = $this->input->post('username');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$group = array($this->input->post('groups'));

				$additional_data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'company' => $this->Admin_m->info_pt(1)->nama_info_pt,
					'phone' => '123456789',
					'repassword' => $this->input->post('password'),
					);
				$this->ion_auth->register($username, $password, $email, $additional_data, $group);
				$pesan = 'user '.$username.' Berhasil dibuat';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/admin/users'));
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/admin/login'));
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
				$data['title'] = 'Edit - '.$this->ion_auth->user($id)->row()->username;
				$data['infopt'] = $this->Admin_m->info_pt(1);
				$data['users'] = $this->ion_auth->user()->row();
				$data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
				$data['aside'] = 'nav/nav';
				$data['groups'] = $this->ion_auth->groups()->result();
				$data['usergroups'] = array();
				if($usergroups = $this->ion_auth->get_users_groups($id)->result()){
					foreach($usergroups as $group)
					{
						$data['usergroups'][] = $group->id;
					}
				}
				$data['skpd'] = $this->Admin_m->select_data('master_satuan_kerja');
				$data['detail'] = $this->ion_auth->user($id)->row();
				$data['page'] = 'admin/edit-users-v';
				$this->load->view('admin/dashboard-v',$data);
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/admin//login'));
		}
	}
	public function proses_edit(){
		if ($this->ion_auth->logged_in()) {
			$level=array('admin','members');
			if (!$this->ion_auth->in_group($level)) {
				$pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/admin/dashboard'));
			}else{
				$id = $this->input->post('id');
				if ($this->input->post('password') == TRUE) {
					$additional_data = array(
					'email' => $this->input->post('email'),
					'username' => $this->input->post('username'),
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'password' => $this->input->post('password'),
					'repassword' =>$this->input->post('password'),
					);
				}else{
					$additional_data = array(
					'email' => $this->input->post('email'),
					'username' => $this->input->post('username'),
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					);
				}
				$groups = $this->input->post('groups');
                $this->ion_auth->remove_from_group(NULL, $id);
                $this->ion_auth->add_to_group($groups, $id);
                $this->ion_auth->update($id, $additional_data);

                if ($this->input->post('id_skpd') == TRUE) {
                	$dtskpd = array(
                		'id_mhs_pt' => $this->input->post('id_skpd'),
                	);
                	$this->Admin_m->update_data('users','id',$id,$dtskpd);
                }

				$pesan = 'user '.$this->input->post('username').' Berhasil di edit';
				$this->session->set_flashdata('message', $pesan );
				redirect(base_url('index.php/admin/users'));
			}
		}else{
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/admin/login'));
		}
	}
	public function delete($id){
		if(!$this->ion_auth->logged_in()){
			$pesan = 'Login terlebih dahulu';
			$this->session->set_flashdata('message', $pesan );
			redirect(base_url('index.php/admin/login'));
		}else{
			$this->ion_auth->delete_user($id);
			$this->session->set_flashdata('message', 'users berhasil di hapus');
			redirect(base_url('index.php/admin/users'));
		}
	}
}
