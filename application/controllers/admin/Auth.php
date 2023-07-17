<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();	
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login(){
		if($this->session->has_userdata('is_admin')) {
			redirect(base_url('admin-dashboard'));
		}

		$islogin = false;
		if(isset($_POST['admin_login'])){
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == FALSE) {
				if (strlen(validation_errors()) > 0) {
					$data['alert'] = $this->session->userdata("alert");
					$data['alert']['error'] = trim(validation_errors());
					if (! $data['alert']['error']) {
						$data['alert']['error'] = explode("\n", trim(validation_errors()));
					}
					$this->session->set_userdata($data);
				}
			}
			if ($this->form_validation->run() == True){
				$data = [
					'username'    => $this->input->post('username'),
					'password' => $this->input->post('password'),
				];

				$this->db->select('*');
				$this->db->from('users');
				$where = "(`username`='".$data['username']."'  ) AND password='".md5($data['password'])."' AND status = 'Active'";
				$this->db->where($where);
				$query = $this->db->get();
				
				$islogin = $query->row_array();
				
				$successData = 	['is_admin' => $islogin];
				$this->session->set_userdata($successData);
				
				if($islogin){
					$this->session->set_flashdata('verify_msg','<div class="alert alert-success text-center"><strong>Success!</strong> Redirecting...</div>');
					redirect(base_url('admin-dashboard'));
				}else{
				
					$this->session->set_flashdata('verify_msg','<div class="alert alert-danger text-center"><strong>Error!</strong> Invalid username or password. </div>');
					redirect(base_url('admin'));
				}

			}
		}
		
		$this->data['title']    = 'Login Page';
		$this->data['title_lg'] = 'Eng';
		$this->data['data']     = $islogin;
		
		$this->load->view('admin/login' , $this->data);
		 
	}

	public function logout(){
		if($this->session->has_userdata('is_admin')) {
			$this->session->unset_userdata('is_admin');
		}
		$this->session->sess_destroy();
	   	redirect(base_url('admin'));   			
	}
}
