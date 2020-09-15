<?php
defined('BASEPATH') or exit('No direct script access allowed');

class View extends CI_Controller
{
    private $_tahunAjaran = 'tahun_ajaran';
    private $_sekolah = 'sekolah';
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('spp_model');
    }
    public function index()
    {
        $data['title'] = 'Pembayaran SPP';
        $data['nis']  = htmlspecialchars($this->input->post('nis'));
        $data['tahunAjaran'] = $this->spp_model->getAll($this->_tahunAjaran)[0];
        $data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
        $data['siswa'] = NULL;
        $spp = [
            'nis' => $data['nis'],
            'tahun_ajaran' => $data['tahunAjaran']['tahun_awal'] . '/' . $data['tahunAjaran']['tahun_akhir']
        ];
        $data['spp'] = $this->spp_model->getWhereSPP($spp);

        $this->form_validation->set_rules('nis', 'NIS Siswa', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal lahir', 'required|trim');
        $this->form_validation->set_rules('bulan', 'Bulan lahir', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun lahir', 'required|trim');

        if ($this->form_validation->run()) {
            $siswa = $this->spp_model->getSiswaByNis($data['nis']);
            $tanggalLahir = htmlspecialchars($this->input->post('tanggal') . '-' . $this->input->post('bulan') . '-' . $this->input->post('tahun'));
            if ($siswa) {
                if ($siswa['tanggal_lahir'] == $tanggalLahir) {
                    $data['siswa'] = $siswa;
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tanggal lahir siswa salah.</div>');
                    redirect('view');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIS yang di inputkan salah.</div>');
                redirect('view');
            }
        }
        $this->load->view('templates/header', $data);
        $this->load->view('pages/index', $data);
        $this->load->view('templates/footer');
    }
}
