<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function index()
    {
        $title['title'] = 'Product';
        $data['barang'] = $this->M_Barang->tampil_data();
        $this->load->view('template/header.php', $title);
        $this->load->view('template/sidebar.php');
        $this->load->view('layouts/v_product', $data);
        $this->load->view('template/footer.php');
    }
    public function Kategori1()
    {
        $title['title'] = 'Elektronik';
        $data['barang'] = $this->M_Barang->Kategori1();
        $this->load->view('template/header.php', $title);
        $this->load->view('template/sidebar.php');
        $this->load->view('layouts/v_product', $data);
        $this->load->view('template/footer.php');
    }
    public function Kategori2()
    {
        $title['title'] = 'Perabotan';
        $data['barang'] = $this->M_Barang->Kategori2();
        $this->load->view('template/header.php', $title);
        $this->load->view('template/sidebar.php');
        $this->load->view('layouts/v_product', $data);
        $this->load->view('template/footer.php');
    }
    public function Kategori3()
    {
        $title['title'] = 'Alat Tulis';
        $data['barang'] = $this->M_Barang->Kategori3();
        $this->load->view('template/header.php', $title);
        $this->load->view('template/sidebar.php');
        $this->load->view('layouts/v_product', $data);
        $this->load->view('template/footer.php');
    }
}
