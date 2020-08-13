<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends MY_Model {

    protected $table = 'user';

    public function getDefaultValues()
    {
        return[
            'nama'      => '',
            'email'     => '',
            'password'  => '',
            'role'      => '',
            'is_active' => '',
        ];
    }

    public function getValidationRules()
    {
        $validationRules =[
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required',
            ],
            [
                'field' => 'email',
                'label' => 'E-Mail',
                'rules' => 'trim|required|valid_email|is_unique[user.email]',
                'errors' => [
                    'is_unique' => 'This %s already e'
                ]
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[8]',
            ],
            [
                'field' => 'password_confirmation',
                'label' => 'Konfrimasi Password',
                'rules' => 'required|matches[password]',
            ],
            ];

            return $validationRules;
    }

    public function run($input){
        $data = [
        'nama'      => $input->nama,
        'email'     => strtolower($input->email),
        'password'  => hashEncrypt($input->password),
        'role'      => 'member'
        ];

        $user   = $this->create($data);

        $sess_data = [ 
            'id'        => $user,
            'nama'      => $data['nama'],
            'email'     => $data['email'],
            'role'      => $data['role'],
            'is_login'  => true
        ];

        $this->session->set_userdata($sess_data);
        return true ;
    }
}

/* End of file ModelName.php */
