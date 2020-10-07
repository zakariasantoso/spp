<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	private $_role = 'user_role';
	private $_menu = 'user_menu';
	private $_sekolah = 'sekolah';
	private $_tahunAjaran = 'tahun_ajaran';
	private $_user = 'user';
	private $_spp = 'spp';
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
		$data['title'] = 'Dashboard';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer', $data);
	}
	public function role()
	{
		$data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
		$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
		$data['title'] = 'Role';
		$data['role'] = $this->spp_model->getAll($this->_role);
		$this->form_validation->set_rules('role', 'Role', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$data = [
				'id' => '',
				'role' => htmlspecialchars($this->input->post('role'))
			];
			$this->spp_model->insert($this->_role, $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">role baru berhasil ditambahkan.</div>');

			redirect('admin/role');
		}
	}
	public function editRole($id = null)
	{
		if ($id) {
			$data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
			$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
			$data['title'] = 'Edit Role';
			$data['role'] = $this->spp_model->getRoleById($id);
			$this->form_validation->set_rules('role', 'Role', 'required|trim');
			if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('admin/edit_role', $data);
				$this->load->view('templates/footer', $data);
			} else {
				$data = [
					'role' => htmlspecialchars($this->input->post('role')),
					'id' => $id
				];
				$this->spp_model->ubahRole($data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data menu berhasil diubah.</div>');

				redirect('admin/role');
			}
		} else {
			redirect('admin/role');
		}
	}
	public function roleAkses($roleId = null)
	{
		if ($roleId) {
			$data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
			$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
			$data['title'] = 'Role Akses';
			$data['role'] = $this->spp_model->getRoleById($roleId);
			$this->db->where('id !=', 1);
			$data['menu'] = $this->spp_model->getAll($this->_menu);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/role_akses', $data);
			$this->load->view('templates/footer', $data);
		} else {
			redirect('admin/role');
		}
	}
	public function ubahAkses()
	{
		$menuId = $this->input->post('menuId');
		$roleId = $this->input->post('roleId');

		$data = [
			'role_id' => $roleId,
			'menu_id' => $menuId
		];

		$this->spp_model->cekAkses($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akses diubah!</div>');
	}
	public function hapusRole($id = null)
	{
		if ($id) {
			$this->spp_model->hapusRole($id);
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data role berhasil dihapus.</div>');

			redirect('admin/Role');
		} else {
			redirect('admin/Role');
		}
	}
	public function operator()
	{
		$data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
		$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
		$data['operator'] = $this->spp_model->getOperator();
		$data['title'] = 'Operator Management';
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/operator', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$data = [
				'id' => '',
				'nama' => htmlspecialchars($this->input->post('nama')),
				'email' => htmlspecialchars($this->input->post('email')),
				'gambar' => 'default.jpg',
				'password' => password_hash($this->input->post('email'), PASSWORD_BCRYPT),
				'role_id' => '2',
				'is_active' => '1',
				'date_created' => time()
			];
			$this->spp_model->insert($this->_user, $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data operator baru berhasil ditambahkan.</div>');

			redirect('admin/operator');
		}
	}
	public function hapusOperator($id = null)
	{
		if ($id) {
			$this->spp_model->hapusOperator($id);
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data operator berhasil dihapus.</div>');

			redirect('admin/operator');
		} else {
			redirect('admin/operator');
		}
	}
	public function editOperator($id = null)
	{
		if ($id) {
			$data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
			$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
			$data['title'] = 'Operator Management';
			$data['operator'] = $this->spp_model->getOperatorById($id);

			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

			if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('admin/edit_operator', $data);
				$this->load->view('templates/footer', $data);
			} else {
				$data = [
					'id' => $id,
					'nama' => htmlspecialchars($this->input->post('nama')),
					'email' => htmlspecialchars($this->input->post('email'))
				];
				$this->spp_model->ubahOperator($data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data operator berhasil diubah.</div>');
				redirect('admin/operator');
			}
		} else {
			redirect('admin/operator');
		}
	}
	public function pembayaran()
	{
		$data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
		$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
		$data['tahunAjaran'] = $this->spp_model->getAll($this->_tahunAjaran)[0];
		$data['pembayaran'] = $this->spp_model->getSPP();
		$data['title'] = 'Data Pembayaran';
		$keyword  = $this->input->get('keyword');
		if ($keyword) {
			$data['pembayaran'] = $this->spp_model->cariPembayaran($keyword);
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/pembayaran', $data);
		$this->load->view('templates/footer', $data);
	}
	public function hapusPembayaran($id = null)
	{
		if ($id) {
			$this->spp_model->hapusSPP($id);
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data pembayaran berhasil dibatalkan.</div>');

			redirect('spp/pembayaran');
		} else {
			redirect('spp/pembayaran');
		}
	}
	public function sekolah()
	{
		$data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
		$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
		$data['title'] = 'Data Sekolah';
		$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];

		// cek kalo ada gambar yg di upload
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/sekolah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$nama = htmlspecialchars($this->input->post('nama'));
			$this->db->set('nama', $nama);
			if (isset($_FILES['gambar'])) {
				$uploadGambar = $_FILES['gambar']['name'];
				if ($uploadGambar) {
					$config['upload_path']          = './assets/img/profile';
					$config['allowed_types']        = 'gif|jpg|png|jpeg';
					$config['max_size']             = 1000000;

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('gambar')) {
						$gambarLama = $data['logo']['gambar'];
						if ($gambarLama != 'default.jpg') {
							unlink(FCPATH . 'assets/img/profile/' . $gambarLama);
						}

						$gambarBaru = $this->upload->data('file_name');
						$this->db->set('gambar', $gambarBaru);
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					}
				}
			}
			$this->db->where('id', $data['sekolah']['id']);
			$this->db->update($this->_sekolah);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data sekolah berhasil diubah.</div>');
			redirect('admin/sekolah');
		}
	}
	public function printPembayaran()
	{
		$data['tahunAjaran'] = $this->spp_model->getAll($this->_tahunAjaran)[0];
		$data['spp'] = $this->spp_model->getSPPHariIni();
		$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
		$data['title'] = "Data Pembayaran SPP Hari Ini";
		$this->load->view('templates/header', $data);
		$this->load->view('admin/print_pembayaran', $data);
		$this->load->view('templates/footer');
	}
	public function printPembayaranBulan()
	{
		$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
		$data['title'] = "Data Pembayaran SPP Bulan Ini";
		$data['tahunAjaran'] = $this->spp_model->getAll($this->_tahunAjaran)[0];
		$data['spp'] = $this->spp_model->getSPPBulanIni();
		$this->load->view('templates/header', $data);
		$this->load->view('admin/print_pembayaran', $data);
		$this->load->view('templates/footer');
	}
	public function printPembayaranTahunAjaran()
	{
		$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
		$data['tahunAjaran'] = $this->spp_model->getAll($this->_tahunAjaran)[0];
		$data['title'] = "Data Pembayaran SPP Tahun Ajaran " . $data['tahunAjaran']['tahun_awal'] . '/' . $data['tahunAjaran']['tahun_akhir'];
		$data['spp'] = $this->spp_model->getSPPBulanIni();
		$this->load->view('templates/header', $data);
		$this->load->view('admin/print_pembayaran', $data);
		$this->load->view('templates/footer');
	}
}
