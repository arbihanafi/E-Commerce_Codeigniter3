<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{

    public function getData()
    {
    }
    public function validationRule()
    {
        return [
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email',
            ],
            [
                'field' => 'password',
                'label'    => 'Password',
                'rules'    => 'required|min_length[8]|trim',
            ]
        ];
    }

    public function Validate($rule)
    {
        $this->load->library('CI_Form_validation');
        $this->form_validation->set_error_delimiters(

            '<small class="form-text text-danger">',
            '</small>'
        );
        $this->form_validation->set_rules($rule);
        return $this->form_validation->run();
    }

    public function login($input)
    {

        $user = $this->db->get_where('user', ['email' => $input->email])->row_array();

        if ($user) {
            if (($input->password == $user['password'])) {
                $sess_data = [
                    'username' => $user['username'],
                    'role_id' => $user['role_id'],
                    'email' => $user['email'],
                    'is_login' => true
                ];

                $this->session->set_userdata($sess_data);
                return true;
            }
        }
    }
}
