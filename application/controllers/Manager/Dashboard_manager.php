<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_manager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['is_login'])) {
            redirect('login');
        } else {
            $role_id = $this->session->userdata('role_id');
            if ($role_id != 2) {
                redirect('admin/Dashboard_admin');
            }
        }
    }

    public function index()
    {
        if ($_SESSION['is_login'] == false) {
            redirect('login');
        }
        $title['title'] = 'Halaman Manager';
        $this->load->view('template/header', $title);
        $this->load->view('layouts/admin/sidebar');
        $this->load->view('layouts/manager/v_dashboard');
        $this->load->view('template/footer');
    }
}
