<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_barang extends CI_Controller
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
        $title['title'] = 'Data Barang';
        $data['barang'] = $this->M_Barang->getBarang();
        $data['kt'] = $this->M_Barang->getKategori();

        $this->load->view('template/header', $title);
        $this->load->view('layouts/admin/sidebar');
        $this->load->view('layouts/admin/v_databarang', $data);
        $this->load->view('template/footer');
    }
    public function tambah_aksi()
    {
        $input = (object) $this->input->post(null, true);
        $gambar = $_FILES['gambar'];
        $tambah = $this->M_Barang->tambah_barang($input, $gambar);
        if ($tambah > 0) {
            $this->session->set_flashdata('success', 'data berhasil ditambah');
            redirect('admin/Data_barang');
        } else {
            $this->session->set_flashdata('error', 'data gagal ditambah');
            redirect('admin/Data_barang');
        }
    }
    public function edit()
    {
        $input = (object) $this->input->post(null, true);
        $gambar = $_FILES['gambar'];
        $edit = $this->M_Barang->edit_data($input, $gambar);

        if ($edit > 0) {
            $this->session->set_flashdata('success', 'data berhasil diubah');
            redirect('admin/Data_barang');
        } else {
            $this->session->set_flashdata('error', 'data gagal diubah');
            redirect('admin/Data_barang');
        }
    }
    public function delete($id)
    {
        $delete = $this->M_Barang->hapusBarang($id);
        if ($delete) {
            $this->session->set_flashdata('success', 'data berhasil dihapus');
            redirect('admin/Data_barang');
        } else {
            $this->session->set_flashdata('error', 'data gagal diubah');
            redirect('admin/Data_barang');
        }
    }
}
