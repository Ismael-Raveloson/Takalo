<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class utilisateur extends CI_Controller {
    
    public function login(){
        $this->load->helper('url');
        $this->load->view('template/login');  
    }

    public function signIn(){
        $this->load->helper(url);
        $this->load->view('template/signin');
    }







}