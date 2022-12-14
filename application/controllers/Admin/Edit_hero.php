<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edit_Hero extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['is_login'])) {
            redirect('login');
        }
    }
    public function index()
    {
        $title['title'] = 'Edit Hero';
        $data['hero'] = $this->M_heroUnit->getData();
        $this->load->view('template/header', $title);
        $this->load->view('layouts/admin/sidebar');
        $this->load->view('layouts/admin/v_edithero', $data);
        $this->load->view('template/footer');
    }
    public function tambah_data()
    {
        $input = (object) $this->input->post(null, true);
        $gambar = $_FILES['file_foto'];
        $tambah = $this->M_heroUnit->tambah_hero($input, $gambar);
        if ($tambah > 0) {
            $this->session->set_flashdata('success', 'data berhasil ditambah');
            redirect('admin/edit_hero');
        } else {
            $this->session->set_flashdata('error', 'data gagal ditambah');
            redirect('admin/edit_hero');
        }
    }
    public function edit()
    {
        $input = (object) $this->input->post(null, true);
        $gambar = $_FILES['file_foto'];
        $edit = $this->M_heroUnit->edit_data($input, $gambar);

        if ($edit > 0) {
            $this->session->set_flashdata('success', 'data berhasil diubah');
            redirect('admin/edit_hero');
        } else {
            $this->session->set_flashdata('error', 'data gagal diubah');
            redirect('admin/edit_hero');
        }
    }
    public function delete($id)
    {
        $delete = $this->M_heroUnit->hapusHero($id);
        if ($delete) {
            $this->session->set_flashdata('success', 'data berhasil dihapus');
            redirect('admin/edit_hero');
        } else {
            $this->session->set_flashdata('error', 'data gagal diubah');
            redirect('admin/edit_hero');
        }
    }
}
