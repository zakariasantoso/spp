<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spp_model extends CI_Model
{
    private $_user = 'user';
    private $_jurusan = 'jurusan';
    private $_menu = 'user_menu';
    private $_subMenu = 'user_sub_menu';
    private $_role = 'user_role';
    private $_siswa = 'siswa';
    private $_aksesMenu = 'user_access_menu';
    private $_tahunAjaran = 'tahun_ajaran';
    private $_spp = 'spp';
    public function __construct()
    {
        parent::__construct();
    }
    public function daftar($data)
    {
        return $this->db->insert($this->_user, $data);
    }
    public function getUserByEmail($email)
    {
        return $this->db->get_where($this->_user, ['email' => $email])->row_array();
    }
    public function getAll($table)
    {
        return $this->db->order_by('id', 'DESC')->get($table)->result_array();
    }
    public function tambahMenu($menu)
    {
        $this->db->insert($this->_menu, ['menu' => $menu]);
    }
    public function getMenuById($id)
    {
        return $this->db->get_where($this->_menu, ['id' => $id])->row_array();
    }
    public function ubahMenu($data)
    {
        $this->db->set('menu', $data['menu']);
        $this->db->where('id', $data['id']);
        return $this->db->update($this->_menu);
    }
    public function hapusMenu($id)
    {
        return $this->db->delete($this->_menu, ['id' => $id]);
    }
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
            FROM `user_sub_menu` JOIN `user_menu`
            ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
            ";
        return $this->db->query($query)->result_array();
    }
    public function getSPP()
    {
        $query = "SELECT `spp`.*, `siswa`.*, `jurusan`.*, spp.id
            FROM `spp` JOIN `siswa`
            ON `spp`.`nis` = `siswa`.`nis` 
            JOIN `jurusan` ON `jurusan`.`id` = `siswa`.`id_jurusan`
            ";
        return $this->db->query($query)->result_array();
    }
    public function getSPPHariIni()
    {
        $tanggal = date('d-m-Y');
        $query = "SELECT `spp`.*, `siswa`.*, `jurusan`.*
            FROM `spp` JOIN `siswa`
            ON `spp`.`nis` = `siswa`.`nis` 
            JOIN `jurusan` ON `jurusan`.`id` = `siswa`.`id_jurusan`
            AND `spp`.`tanggal_bayar` = '$tanggal'
            ";
        return $this->db->query($query)->result_array();
    }
    public function getSPPBulanIni()
    {
        $tanggal = date('-m-Y');
        $query = "SELECT `spp`.*, `siswa`.*, `jurusan`.*
            FROM `spp` JOIN `siswa`
            ON `spp`.`nis` = `siswa`.`nis` 
            JOIN `jurusan` ON `jurusan`.`id` = `siswa`.`id_jurusan`
            AND `spp`.`tanggal_bayar` LIKE '%$tanggal'
            ";
        return $this->db->query($query)->result_array();
    }
    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    public function hapusSubMenu($id)
    {
        return $this->db->delete($this->_subMenu, ['id' => $id]);
    }
    public function getById($table, $id)
    {
        return $this->db->get_where($table, ['id' => $id])->row_array();
    }
    public function editSubMenu($id, $data)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        return $this->db->update($this->_subMenu);
    }
    public function getRoleById($id)
    {
        return $this->db->get_where($this->_role, ['id' => $id])->row_array();
    }
    public function cekAkses($data)
    {
        $result = $this->db->get_where($this->_aksesMenu, $data);

        if ($result->num_rows() < 1) {
            $this->db->insert($this->_aksesMenu, $data);
        } else {
            $this->db->delete($this->_aksesMenu, $data);
        }
    }
    public function ubahPassword($password)
    {
        $this->db->set('password', $password);
        $this->db->where('email', $this->session->userdata('email'));
        return $this->db->update($this->_user);
    }
    public function getOperator()
    {
        return $this->db->get_where($this->_user, ['role_id' => 2])->result_array();
    }
    public function hapusOperator($id)
    {
        return $this->db->delete($this->_user, ['id' => $id]);
    }
    public function getOperatorById($id)
    {
        return $this->db->get_where($this->_user, [
            'id' => $id,
            'role_id' => 2
        ])->row_array();
    }
    public function ubahOperator($data)
    {
        $this->db->set('nama', $data['nama']);
        $this->db->set('email', $data['email']);
        $this->db->where('id', $data['id']);
        return $this->db->update($this->_user);
    }
    public function getSiswa()
    {
        return $this->db->query("SELECT 
            `siswa`.`id` AS `id`, 
            `siswa`.`nis` AS `nis`, 
            `siswa`.`nama` AS `nama`, 
            `siswa`.`kelas` AS `kelas`, 
            `siswa`.`tanggal_lahir` AS `tanggal_lahir`, 
            `jurusan`.`nama` AS `jurusan`
            FROM siswa JOIN jurusan 
            ON `siswa`.`id_jurusan` = `jurusan`.`id` ORDER BY siswa.id DESC")->result_array();
    }
    public function getSiswaFilter($jurusan, $kelas)
    {
        return $this->db->query("SELECT 
            `siswa`.`id` AS `id`, 
            `siswa`.`nis` AS `nis`, 
            `siswa`.`nama` AS `nama`, 
            `siswa`.`kelas` AS `kelas`, 
            `siswa`.`tanggal_lahir` AS `tanggal_lahir`, 
            `jurusan`.`nama` AS `jurusan`
            FROM siswa JOIN jurusan 
            ON `siswa`.`id_jurusan` = `jurusan`.`id` WHERE id_jurusan = '$jurusan' AND kelas = '$kelas' ORDER BY siswa.id DESC")->result_array();
    }
    public function getSiswaByJurusanId($id)
    {
        return $this->db->query("SELECT 
            `siswa`.`id` AS `id`, 
            `siswa`.`nis` AS `nis`, 
            `siswa`.`nama` AS `nama`, 
            `siswa`.`kelas` AS `kelas`, 
            `jurusan`.`nama` AS `jurusan`
            FROM siswa JOIN jurusan 
            ON `siswa`.`id_jurusan` = `jurusan`.`id` WHERE id_jurusan = '$id' ORDER BY siswa.id DESC")->result_array();
    }
    public function getSiswaByKelas($kelas)
    {
        return $this->db->query("SELECT 
            `siswa`.`id` AS `id`, 
            `siswa`.`nis` AS `nis`, 
            `siswa`.`nama` AS `nama`, 
            `siswa`.`kelas` AS `kelas`, 
            `jurusan`.`nama` AS `jurusan`
            FROM siswa JOIN jurusan 
            ON `siswa`.`id_jurusan` = `jurusan`.`id` WHERE kelas = '$kelas' ORDER BY siswa.id DESC")->result_array();
    }
    public function hapusSiswa($id)
    {
        return $this->db->delete($this->_siswa, ['id' => $id]);
    }
    public function getSiswaById($id)
    {
        return $this->db->get_where($this->_siswa, [
            'id' => $id
        ])->row_array();
    }
    public function ubahSiswa($data)
    {
        $this->db->set('nama', $data['nama']);
        $this->db->set('id_jurusan', $data['id_jurusan']);
        $this->db->set('nis', $data['nis']);
        $this->db->set('kelas', $data['kelas']);
        $this->db->set('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->where('id', $data['id']);
        return $this->db->update($this->_siswa);
    }
    public function ubahRole($data)
    {
        $this->db->set('role', $data['role']);
        $this->db->where('id', $data['id']);
        return $this->db->update($this->_role);
    }
    public function hapusRole($id)
    {
        return $this->db->delete($this->_role, ['id' => $id]);
    }
    public function getSiswaByNis($nis)
    {
        return $this->db->query("SELECT 
            `siswa`.`id` AS `id`, 
            `siswa`.`nis` AS `nis`, 
            `siswa`.`nama` AS `nama`, 
            `siswa`.`kelas` AS `kelas`, 
            `siswa`.`tanggal_lahir` AS `tanggal_lahir`, 
            `jurusan`.`nama` AS `jurusan`,
            `jurusan`.`tagihan_bulanan` AS `tagihan`
            FROM siswa JOIN jurusan 
            ON `siswa`.`id_jurusan` = `jurusan`.`id`
            WHERE nis = '$nis'")->row_array();
    }
    public function getJurusanById($id)
    {
        return $this->db->get_where($this->_jurusan, [
            'id' => $id
        ])->row_array();
    }
    public function hapusJurusan($id)
    {
        return $this->db->delete($this->_jurusan, ['id' => $id]);
    }
    public function ubahJurusan($data)
    {
        $this->db->set('nama', $data['nama']);
        $this->db->set('tagihan_bulanan', $data['tagihan_bulanan']);
        $this->db->where('id', $data['id']);
        return $this->db->update($this->_jurusan);
    }
    public function hapusTahunAjaran($id)
    {
        return $this->db->delete($this->_tahunAjaran, ['id' => $id]);
    }
    public function getTahunAjaranById($id)
    {
        return $this->db->get_where($this->_tahunAjaran, [
            'id' => $id
        ])->row_array();
    }
    public function ubahTahunAjaran($data)
    {
        $this->db->set('tahun_awal', $data['tahun_awal']);
        $this->db->set('tahun_akhir', $data['tahun_akhir']);
        $this->db->where('id', $data['id']);
        return $this->db->update($this->_tahunAjaran);
    }
    public function getWhereSPP($data)
    {
        return $this->db->get_where($this->_spp, [
            'nis' => $data['nis'],
            'tahun_ajaran' => $data['tahun_ajaran']
        ])->result_array();
    }
    public function getSpesifikSPP($data)
    {
        return $this->db->get_where($this->_spp, [
            'nis' => $data['nis'],
            'tahun_ajaran' => $data['tahun_ajaran'],
            'pembayaran_ke' => $data['pembayaran_ke']
        ])->row_array();
    }
    public function hapusSPP($id)
    {
        return $this->db->delete($this->_spp, ['id' => $id]);
    }
    public function cariPembayaran($keyword)
    {
        $this->db->like('nis', $keyword);
        $this->db->or_like('tahun_ajaran', $keyword);
        $this->db->or_like('tanggal_bayar', $keyword);
        return $this->db->get($this->_spp)->result_array();
    }
    public function getSPPByNis($nis)
    {
        return $this->db->get_where($this->_spp, [
            'nis' => $nis
        ])->result_array();
    }
}
