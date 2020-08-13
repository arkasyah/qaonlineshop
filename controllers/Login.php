<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $is_login   = $this->session->userdata('is_login');

        if ($is_login){
            redirect(base_url());
            return;
        }
    }

    public function index(){
        if (!$_POST) {
            $input  = (object) $this->login->getDefaultValues();
        }else{
            $input  = (object) $this->input->post(null, true);       
        }

        if (!$this->login->validate()) {
            $data ['title'] = 'login' ;
            $data ['input'] = $input;
            $data ['page']  = 'pages/auth/login';
            $this->view($data);
            return;
        }

        if ($this->login->run($input)) {
            $this->session->set_flashdata('success', 'Berhasil melakukan Registrasi!');
            redirect(base_url());
        }else{
            $this->session->set_flashdata('error'. 'Oppss! Terjadi suatu Kesalahan');
            redirect(base_url('/login'));
        }
    }
}


