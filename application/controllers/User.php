<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	private $_user = 'user';
	private $_sekolah = 'sekolah';

	/**
	 * 
	 * Index Page for this controller.
	 *
	 */
	public function __construct()
	{
		parent::__construct();
		cekLogin();
		$this->load->library('form_validation');
		$this->load->model('spp_model');
	}
	public function index()
	{
		$data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
		$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
		$data['title'] = 'My Profile';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}
	public function edit()
	{
		$data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
		$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
		$data['title'] = 'Edit Profile';
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$nama = htmlspecialchars($this->input->post('nama'));

			// cek kalo ada gambar yg di upload
			$uploadGambar = $_FILES['gambar']['name'];
			if ($uploadGambar) {
				$config['upload_path']          = './assets/img/profile';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 10000;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {
					$gambarLama = $data['user']['gambar'];
					if ($gambarLama != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $gambarLama);
					}

					$gambarBaru = $this->upload->data('file_name');
					$this->db->set('gambar', $gambarBaru);
				} else {
					$this->upload->display_errors();
				}
			}

			$this->db->set('nama', $nama);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update($this->_user);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile anda berhasil diubah.</div>');

			redirect('user');
		}
	}
	public function ubahPassword()
	{
		$data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
		$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
		$data['title'] = 'Ubah Password';

		$this->form_validation->set_rules('passwordLama', 'Password lama', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password baru', 'required|trim|min_length[6]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password konfirmasi', 'required|trim|matches[password2]');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/ubah_password', $data);
			$this->load->view('templates/footer');
		} else {
			$passwordLama = $this->input->post('passwordLama');
			$passwordBaru = $this->input->post('password1');
			if (!password_verify($passwordLama, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama anda salah</div>');

				redirect('user/ubahPassword');
			} else {
				if ($passwordLama) {
					// password sudah lolos validasi
					$passwordHash = password_hash($passwordBaru, PASSWORD_BCRYPT);
					$this->spp_model->ubahPassword($passwordHash);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');

					redirect('user/ubahPassword');
				}
			}
		}
	}
}
