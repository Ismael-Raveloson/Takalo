<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class utilisateur extends CI_Controller {
    
    public function login(){
        $this->load->view('template/login');   
    }

    public function signIn(){
        $this->laod->helper(url);
        $this->load->view('template/signin');
    }




}