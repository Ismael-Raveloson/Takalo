<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dBController extends CI_Controller {
    public function login(){
        $this->load->view('template/login');   
    }

    public function signIn(){
        $this->load->view('template/signin');
    }




}