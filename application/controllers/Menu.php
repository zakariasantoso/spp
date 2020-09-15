<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    /**
     * 
     * Index Page for Menu controller.
     *
     */
    private $_userMenu = "user_menu";
    private $_userSubMenu = "user_sub_menu";
    private $_sekolah = "sekolah";
    public function __construct()
    {
        parent::__construct();
        cekLogin();
        $this->load->library('form_validation');
        $this->load->model('spp_model');
    }
    public function index()
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
        $data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
        $data['title'] = 'Menu Management';
        $data['menu'] = $this->spp_model->getAll($this->_userMenu);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->spp_model->tambahMenu(htmlspecialchars($this->input->post('menu')));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan.</div>');

            redirect('menu');
        }
    }
    public function edit($id = null)
    {
        if ($id) {
            $this->form_validation->set_rules('menu', 'Menu', 'required');
            $data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
            $data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
            $data['title'] = 'Edit Menu';
            $data['menu'] = $this->spp_model->getMenuById($id);
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('menu/edit', $data);
                $this->load->view('templates/footer');
            } else {
                $data = [
                    'menu' => htmlspecialchars($this->input->post('menu')),
                    'id' => $id
                ];
                $this->spp_model->ubahMenu($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data menu berhasil diubah.</div>');

                redirect('menu');
            }
        } else {
            redirect('menu');
        }
    }
    public function hapus($id = null)
    {
        if ($id) {
            $this->spp_model->hapusMenu($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data menu berhasil dihapus.</div>');

            redirect('menu');
        } else {
            redirect('menu');
        }
    }
    public function subMenu()
    {
        $data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
        $data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
        $data['title'] = 'Submenu Management';
        $data['subMenu'] = $this->spp_model->getSubMenu();
        $data['menu'] = $this->spp_model->getAll($this->_userMenu);

        $this->form_validation->set_rules('judul', 'Menu', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu ID', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/subMenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'judul' => htmlspecialchars($this->input->post('judul')),
                'menu_id' => htmlspecialchars($this->input->post('menu_id')),
                'url' => htmlspecialchars($this->input->post('url')),
                'icon' => htmlspecialchars($this->input->post('icon')),
                'is_active' => htmlspecialchars($this->input->post('is_active'))
            ];
            $this->spp_model->insert($this->_userSubMenu, $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data sub menu berhasil ditambahlan.</div>');

            redirect('menu/submenu');
        }
    }
    public function hapusSubMenu($id = null)
    {
        if ($id) {
            $this->spp_model->hapusSubMenu($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data menu berhasil dihapus.</div>');

            redirect('menu/subMenu');
        } else {
            redirect('menu/subMenu');
        }
    }
    public function editSubMenu($id = null)
    {
        if ($id) {
            $data['user'] = $this->spp_model->getUserByEmail($this->session->userdata('email'));
            $data['sekolah'] = $this->spp_model->getAll($this->_sekolah)[0];
            $data['title'] = 'Submenu Management';
            $data['subMenu'] = $this->spp_model->getById($this->_userSubMenu, $id);
            $data['menu'] = $this->spp_model->getAll($this->_userMenu);

            $this->form_validation->set_rules('judul', 'Menu', 'required');
            $this->form_validation->set_rules('menu_id', 'Menu ID', 'required');
            $this->form_validation->set_rules('url', 'URL', 'required');
            $this->form_validation->set_rules('icon', 'Icon', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('menu/editSubMenu', $data);
                $this->load->view('templates/footer');
            } else {
                $data = [
                    'judul' => htmlspecialchars($this->input->post('judul')),
                    'menu_id' => htmlspecialchars($this->input->post('menu_id')),
                    'url' => htmlspecialchars($this->input->post('url')),
                    'icon' => htmlspecialchars($this->input->post('icon')),
                    'is_active' => htmlspecialchars($this->input->post('is_active'))
                ];
                $this->spp_model->editSubMenu($id, $data);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data sub menu berhasil diubah.</div>');

                redirect('menu/submenu');
            }
        } else {
            redirect('menu/subMenu');
        }
    }
}
