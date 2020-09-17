<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spp extends CI_Controller
{
	private $_jurusan = 'jurusan';
	private $_siswa = 'siswa';
	private $_tahunAjaran = 'tahun_ajaran';
	private $_menu = 'user_menu';
	private $_spp = 'spp';
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
	public function index($id = null)
	{
		$data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
		$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
		$data['title'] = 'Pembayaran SPP';
		$data['menu'] = $this->spp_model->getAll($this->_menu);
		$nis  = htmlspecialchars($this->input->get('nis'));
		$data['tahunAjaran'] = $this->spp_model->getAll($this->_tahunAjaran)[0];
		$spp = [
			'nis' => $nis,
			'tahun_ajaran' => $data['tahunAjaran']['tahun_awal'] . '/' . $data['tahunAjaran']['tahun_akhir']
		];
		$data['spp'] = $this->spp_model->getWhereSPP($spp);

		for ($i = 1; $i <= 12; $i++) {
			$this->form_validation->set_rules("ke$i", "Pembayaran ke $i", 'trim|numeric');
		}
		$this->form_validation->set_rules("password", "Password", 'required|trim');
		$message = "
		<div class='alert alert-success' role='alert'>Pembayaran berhasil di verifikasi.</div>";
		if ($this->form_validation->run()) {
			if (password_verify($this->input->post('password'), $data['user']['password'])) {
				for ($i = 1; $i <= 12; $i++) {
					$pembayaranKeN = $this->input->post("ke$i");
					$spp = [
						'nis' => $nis,
						'tahun_ajaran' => $data['tahunAjaran']['tahun_awal'] . '/' . $data['tahunAjaran']['tahun_akhir'],
						'pembayaran_ke' => $pembayaranKeN
					];
					$dataSPP = $this->spp_model->getSpesifikSPP($spp);
					if ($pembayaranKeN) {

						$j = 0;
						if ($dataSPP == null) {
							$insert = [
								'id' => '',
								'nis' => $nis,
								'tahun_ajaran' => $data['tahunAjaran']['tahun_awal'] . '/' . $data['tahunAjaran']['tahun_akhir'],
								'pembayaran_ke' => $pembayaranKeN,
								'tanggal_bayar' => date('d-m-Y')
							];
							$j++;
							$tahunAjaran = $spp['tahun_ajaran'];
							$tanggal = date('d-m-Y');
							$url = base_url("spp/printBayar/?nis=$nis&spp=$tahunAjaran&pembayaran=$pembayaranKeN&tanggal=$tanggal");
							if ($this->spp_model->insert($this->_spp, $insert)) {

								for ($k = 0; $k < $j; $k++) {
									$message .= "
										<script>
											window.open('$url');
										</script>
									";
								}
								$bool = true;
							}
						}
					} else {
					}
				}
				if ($bool) {
					$this->session->set_flashdata('message', $message);
				}
				redirect("spp?nis=$nis");
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Verifikasi password anda salah.</div>');

				redirect("spp?nis=$nis");
			}
		} else {
			if ($this->input->get('nis')) {
				$data['siswa'] = $this->spp_model->getSiswaByNis($nis);
			} else {
				$data['siswa'] = NULL;
			}
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('spp/tagihan', $data);
			$this->load->view('templates/footer');
		}
	}
	public function printFilter()
	{
		$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
		$data['title'] = "Data Siswa";

		$this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|numeric');
		$this->form_validation->set_rules('kelas', 'Kelas', 'trim|numeric');

		if ($this->input->post('id_jurusan') && $this->input->post('kelas')) {
			$data['siswa'] = $this->spp_model->getSiswaFilter($this->input->post('id_jurusan'), $this->input->post('kelas'));
		} elseif ($this->input->post('id_jurusan')) {
			if ($this->input->post('kelas') == null) {
				$data['siswa'] = $this->spp_model->getSiswaByJurusanId($this->input->post('id_jurusan'));
			}
		} elseif ($this->input->post('kelas') && $this->input->post('id_jurusan') == null) {
			$data['siswa'] = $this->spp_model->getSiswaByKelas($this->input->post('kelas'));
		} else {
			$data['siswa'] = $this->spp_model->getSiswa();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('spp/print_siswa', $data);
		$this->load->view('templates/footer');
	}
	public function printSiswaByJurusan($id)
	{
		if ($id) {
			$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
			$data['title'] = "Data Siswa";
			$data['siswa'] = $this->spp_model->getSiswaByJurusanId($id);
			$this->load->view('templates/header', $data);
			$this->load->view('spp/print_siswa', $data);
			$this->load->view('templates/footer');
		} else {
			redirect('spp/siswa');
		}
	}
	public function printSiswaByKelas($kelas)
	{
		if ($kelas) {
			$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
			$data['title'] = "Data Siswa";
			$data['siswa'] = $this->spp_model->getSiswaByKelas($kelas);
			$this->load->view('templates/header', $data);
			$this->load->view('spp/print_siswa', $data);
			$this->load->view('templates/footer');
		} else {
			redirect('spp/siswa');
		}
	}
	public function siswa()
	{
		$data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
		$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
		$data['siswa'] = $this->spp_model->getSiswa();

		$data['jurusan'] = $this->spp_model->getAll($this->_jurusan);
		$data['title'] = 'Data Siswa';
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim|numeric');
		$this->form_validation->set_rules('bulan', 'Bulan', 'required|trim|numeric');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|numeric');
		$this->form_validation->set_rules('id_jurusan', 'Jurusan', 'required|trim');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
		$this->form_validation->set_rules('nis', 'NIS', 'required|trim|numeric|is_unique[siswa.nis]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('spp/siswa', $data);
			$this->load->view('templates/footer');
		} else {
			$tanggalLahir = htmlspecialchars($this->input->post('tanggal') . '-' . $this->input->post('bulan') . '-' . $this->input->post('tahun'));
			$data = [
				'id' => '',
				'nama' => htmlspecialchars($this->input->post('nama')),
				'id_jurusan' => htmlspecialchars($this->input->post('id_jurusan')),
				'kelas' => htmlspecialchars($this->input->post('kelas')),
				'nis' => htmlspecialchars($this->input->post('nis')),
				'tanggal_lahir' => $tanggalLahir
			];
			$this->spp_model->insert($this->_siswa, $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Siswa baru berhasil ditambahkan.</div>');

			redirect('spp/Siswa');
		}
	}
	public function hapusSiswa($id = null)
	{
		if ($id) {
			$this->spp_model->hapusSiswa($id);
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Siswa berhasil dihapus.</div>');

			redirect('spp/Siswa');
		} else {
			redirect('spp/Siswa');
		}
	}
	public function editSiswa($id = null)
	{
		if ($id) {
			$data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
			$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
			$data['title'] = 'Data Siswa';
			$data['kelas'] = [
				1,
				2,
				3
			];
			$data['siswa'] = $this->spp_model->getSiswaById($id);
			$data['tanggal'] = explode('-', $data['siswa']['tanggal_lahir'])[0];
			$data['bulan'] = explode('-', $data['siswa']['tanggal_lahir'])[1];
			$data['tahun'] = explode('-', $data['siswa']['tanggal_lahir'])[2];
			$data['jurusan'] = $this->spp_model->getAll($this->_jurusan);

			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('id_jurusan', 'Jurusan', 'required|trim');
			$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
			$this->form_validation->set_rules('nis', 'NIS', 'required|trim');

			if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('spp/edit_siswa', $data);
				$this->load->view('templates/footer');
			} else {
				$tanggalLahir = htmlspecialchars($this->input->post('tanggal') . '-' . $this->input->post('bulan') . '-' . $this->input->post('tahun'));
				$data = [
					'id' => $id,
					'nama' => htmlspecialchars($this->input->post('nama')),
					'id_jurusan' => htmlspecialchars($this->input->post('id_jurusan')),
					'kelas' => htmlspecialchars($this->input->post('kelas')),
					'nis' => htmlspecialchars($this->input->post('nis')),
					'tanggal_lahir' => $tanggalLahir
				];
				$this->spp_model->ubahSiswa($data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Siswa berhasil diubah.</div>');
				redirect('spp/Siswa');
			}
		} else {
			redirect('spp/Siswa');
		}
	}
	public function jurusan()
	{
		$data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
		$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
		$data['jurusan'] = $this->spp_model->getAll($this->_jurusan);
		$data['title'] = 'Jurusan';
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');
		$this->form_validation->set_rules('tagihan_bulanan', 'Tagihan Bulanan', 'required|trim|numeric');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('spp/jurusan', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'id' => '',
				'nama' => htmlspecialchars($this->input->post('jurusan')),
				'tagihan_bulanan' => htmlspecialchars($this->input->post('tagihan_bulanan')),
			];
			$this->spp_model->insert($this->_jurusan, $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jurusan baru berhasil ditambahkan.</div>');

			redirect('spp/Jurusan');
		}
	}
	public function hapusJurusan($id = null)
	{
		if ($id) {
			$this->spp_model->hapusJurusan($id);
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Jurusan berhasil dihapus.</div>');

			redirect('spp/Jurusan');
		} else {
			redirect('spp/Jurusan');
		}
	}
	public function editJurusan($id = null)
	{
		if ($id) {
			$data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
			$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
			$data['title'] = 'Jurusan Management';
			$data['jurusan'] = $this->spp_model->getJurusanById($id);

			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('tagihan_bulanan', 'Tagihan Bulanan', 'required|trim|numeric', [
				'numeric' => 'Tagihan Bulanan harus berisi angka.'
			]);

			if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('spp/edit_jurusan', $data);
				$this->load->view('templates/footer');
			} else {
				$data = [
					'id' => $id,
					'nama' => htmlspecialchars($this->input->post('nama')),
					'tagihan_bulanan' => htmlspecialchars($this->input->post('tagihan_bulanan')),
				];
				$this->spp_model->ubahJurusan($data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jurusan berhasil diubah.</div>');
				redirect('spp/Jurusan');
			}
		} else {
			redirect('spp/Jurusan');
		}
	}
	public function tahunAjaran()
	{
		$data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
		$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
		$data['tahunAjaran'] = $this->spp_model->getAll($this->_tahunAjaran);
		$data['title'] = 'Tahun Ajaran';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('spp/tahun_ajaran', $data);
		$this->load->view('templates/footer');
	}
	public function hapusTahunAjaran($id = null)
	{
		if ($id) {
			$this->spp_model->hapusTahunAjaran($id);
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data TahunAjaran berhasil dihapus.</div>');

			redirect('spp/TahunAjaran');
		} else {
			redirect('spp/TahunAjaran');
		}
	}
	public function editTahunAjaran($id = null)
	{
		if ($id) {
			$data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
			$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
			$data['title'] = 'Tahun Ajaran';
			$data['tahunAjaran'] = $this->spp_model->getTahunAjaranById($id);
			$data['semester'] = [
				[
					'val' => '1',
					'semester' => 'Ganjil'
				],
				[
					'val' => '2',
					'semester' => 'Genap'
				]
			];

			$this->form_validation->set_rules('tahun_awal', 'Tahun ajaran', 'required|trim');
			$this->form_validation->set_rules('tahun_akhir', 'Tahun ajaran', 'required|trim');

			if ($this->form_validation->run() == false) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('spp/edit_tahun_ajaran', $data);
				$this->load->view('templates/footer');
			} else {
				$tahunAwal = htmlspecialchars($this->input->post('tahun_awal'));
				$tahunAkhir = htmlspecialchars($this->input->post('tahun_akhir'));
				$semesterAktif = htmlspecialchars($this->input->post('semester_aktif'));
				if ($tahunAwal > $tahunAkhir) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data tahun mulai tidak boleh diatas tahun akhir.</div>');

					redirect("spp/editTahunAjaran/$id");
				} elseif ($tahunAkhir - $tahunAwal !== 1) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tahun ajaran tidak boleh lebih dari 1 tahun.</div>');

					redirect("spp/editTahunAjaran/$id");
				} else {
					$data = [
						'id' => $id,
						'tahun_awal' => $tahunAwal,
						'tahun_akhir' => $tahunAkhir
					];
					$this->spp_model->ubahTahunAjaran($data);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Tahun ajaran baru berhasil diubah.</div>');

					redirect('spp/TahunAjaran');
				}
			}
		} else {
			redirect('spp/TahunAjaran');
		}
	}
	public function upload()
	{
		// Load plugin PHPExcel nya
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		$config['upload_path'] = realpath('excel');
		$config['allowed_types'] = 'xlsx|xls|csv';
		$config['max_size'] = '1000000';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload()) {

			//upload gagal
			$this->session->set_flashdata('messege', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> ' . $this->upload->display_errors() . '</div>');
			//redirect halaman
			redirect('spp/siswa');
		} else {

			$data_upload = $this->upload->data();
			var_dump($data_upload);
			die;

			$excelreader     = new PHPExcel_Reader_Excel2007();
			$loadexcel         = $excelreader->load('excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
			$sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

			$data = array();

			$numrow = 1;
			foreach ($sheet as $row) {
				if ($numrow > 1) {
					array_push($data, array(
						'nama' => $row['A'],
						'email'      => $row['B'],
						'alamat'      => $row['C'],
					));
				}
				$numrow++;
			}
			$this->db->insert_batch('dosen', $data);
			//delete file from server
			unlink(realpath('excel/' . $data_upload['file_name']));

			//upload success
			$this->session->set_flashdata('notif', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
			//redirect halaman
			redirect('import/');
		}
	}
	public function pembayaran()
	{
		$data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
		$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
		$data['tahunAjaran'] = $this->spp_model->getAll($this->_tahunAjaran)[0];
		$data['pembayaran'] = $this->spp_model->getSPP();
		$data['title'] = 'Data Pembayaran SPP';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('spp/pembayaran', $data);
		$this->load->view('templates/footer', $data);
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
	public function printBayar()
	{
		$data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
		$data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
		$data['siswa'] = $this->spp_model->getSiswaByNis($this->input->get('nis'));
		// $data['jurusan'] = $this->spp_model->getJurusanById($data['siswa']['id_jurusan']);
		$data['tahunAjaran'] = $this->spp_model->getAll($this->_tahunAjaran)[0];
		$data['title'] = "Data Pembayaran SPP Tahun Ajaran " . $data['tahunAjaran']['tahun_awal'] . '/' . $data['tahunAjaran']['tahun_akhir'];
		$data['spp'] = $this->spp_model->getSPPBulanIni();
		$this->load->view('templates/header', $data);
		$this->load->view('spp/bukti_pembayaran', $data);
		$this->load->view('templates/footer');
	}
}
