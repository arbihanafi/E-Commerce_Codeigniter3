<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {

        $validationRules = $this->M_login->validationRule();
        $validate = $this->M_login->validate($validationRules);

        if (!$validate) {
            $data['title'] = 'Login';
            $this->load->view('template/header.php', $data);
            $this->load->view('layouts/v_login');
            $this->load->view('template/footer.php');
        } else {
            $input = (object) $this->input->post(null, true);

            $login = $this->M_login->login($input);
            if ($login) {
                $role_id = $this->session->userdata('role_id');
                if ($role_id == 1) {
                    redirect('Admin/Dashboard_admin');
                } else {
                    redirect('Manager/Dashboard_manager');
                }
            } else {
                $this->session->set_flashdata('error', 'username / password salah');
                redirect('login');
            }
        }
    }
}

/* End of file Login.php */
