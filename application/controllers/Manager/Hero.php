<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hero extends CI_Controller
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
        $title['title'] = 'Manager Hero';
        $data['hero'] = $this->M_heroUnit->getData();
        $data['kt'] = $this->M_heroUnit->getStatus();
        $this->load->view('template/header', $title);
        $this->load->view('layouts/admin/sidebar');
        $this->load->view('layouts/manager/v_hero', $data);
        $this->load->view('template/footer');
    }

    public function edit()
    {
        $input = (object) $this->input->post(null, true);
        $edit = $this->M_heroUnit->editHero($input);

        if ($edit > 0) {
            $this->session->set_flashdata('success', 'data berhasil diubah');
            redirect('manager/hero');
        } else {
            $this->session->set_flashdata('error', 'data gagal diubah');
            redirect('manager/hero');
        }
    }
}
