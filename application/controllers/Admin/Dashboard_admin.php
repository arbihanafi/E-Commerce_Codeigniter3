<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller
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
        $title['title'] = 'Halaman Admin';
        $this->load->view('template/header', $title);
        $this->load->view('layouts/admin/sidebar');
        $this->load->view('layouts/admin/v_dashboard');
        $this->load->view('template/footer');
    }
}
