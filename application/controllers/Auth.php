<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	private $_sekolah = 'sekolah';
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('spp_model');
	}
	private function _login()
	{
		$email = htmlspecialchars($this->input->post('email'));
		$password = $this->input->post('password');

		$user = $this->spp_model->getUserByEmail($email);

		// usernya ada
		if ($user) {
			// cek password
			if (password_verify($password, $user['password'])) {
				$data = [
					'email' => $user['email'],
					'role_id' => $user['role_id']
				];
				$this->session->set_userdata($data);
				if ($user['role_id'] == 1) {
					redirect('admin');
				} else {
					redirect('user');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');

				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email anda tidak terdaftar.</div>');

			redirect('auth');
		}
	}
	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'LOGIN SPP ONLINE';
			$data['logo'] = $this->spp_model->getAll($this->_sekolah)[0];
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout!</div>');

		redirect('auth');
	}
	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
