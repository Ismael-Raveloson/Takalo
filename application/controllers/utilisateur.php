<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class utilisateur extends CI_Controller {
    
    public function index(){
        $this->load->helper('url');
        $this->load->view('template/login');  
    }

    public function signUp(){
        $this->load->helper('url');
        $this->load->view('template/signup');
    }

    //name email=user,mdp=password
    public function logIn(){
        
        $this->load->helper('url');
        $this->load->model('Model');
        $this->load->library('session');

        $email = $this->input->get("user");
        $mdp = $this->input->get("password");

        $util = $this->Model->verifierUtil($email,$mdp);
        $admin = $this->Model->verifierUtilAdmin($email,$mdp);

        echo $admin;
        echo $util;

            if(empty($email) || empty($mdp)){
                $error = "Veuillez remplir tout les champs";
                redirect('utilisateur/index?error='.$error);
            }else{
                if($util == 1 && $admin == 1){
                        $id = $this->Model->getUserId($email,$mdp);
                        $this->session->set_userdata('idClient',$id); 
                        redirect('utilisateur/backoffice');
                    }

                if($util == 1 && $admin == 0){
                        echo 'tsy tonga';
                        $id = $this->Model->getUserId($email,$mdp);
                        $this->session->set_userdata('idClient',$id);
                        redirect('utilisateur/home');
                    }
                    
                    if($util == 0 && $admin == 0){
                        $error = "Users or password incorrect";
                        redirect('utilisateur/index?error='.$error);
                    }
            }          
    }

    public function inscription(){
        $anarana = $this->input->get("anarana");
        $email = $this->input->get("user");
        $mdp = $this->input->get("password");

        $this->load->helper('url');
        $this->load->model('Model');
        $this->load->library('session');

        $util = $this->Model->verifierUtil($email,$mdp);


        if(empty($email) || empty($mdp) || empty($anarana)){
            $error = "Veuillez remplir tout les champs";
            redirect('utilisateur/signup?error='.$error);
        }else{
            if($util == 1){
                $error = "Email déja existant";
                redirect('utilisateur/signup?error='.$error);
            }else{
                $this->Model->inscription($anarana,$email,$mdp);
                redirect('utilisateur/index');
            }
        }
    }

    public function home(){
        $this->load->view('template/home');
    }

    public function backoffice(){
        $this->load->view('template/backoffice');  
    }

    








}