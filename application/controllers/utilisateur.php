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
                redirect(base_url('utilisateur/index?error='.$error));
            }else{
                if($util == 1 && $admin == 1){
                        $id = $this->Model->getUserId($email,$mdp);
                        $this->session->set_userdata('idClient',$id);
                        redirect(base_url('utilisateur/backoffice'));
                    }

                if($util == 1 && $admin == 0){
                        $id = $this->Model->getUserId($email,$mdp);
                        $this->session->set_userdata('idClient',$id);
                        redirect(base_url('utilisateur/home?rc='.$id));
                    }
                    
                    if($util == 0 && $admin == 0){
                        $error = "Users or password incorrect";
                        redirect(base_url('utilisateur/index?error='.$error));
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
            redirect(base_url('utilisateur/signup?error='.$error));
        }else{
            if($util == 1){
                $error = "Email déja existant";
                redirect(base_url('utilisateur/signup?error='.$error));
            }else{
                $this->Model->inscription($anarana,$email,$mdp);
                redirect(base_url('utilisateur/index'));
            }
        }
    }

    public function home(){
        $this->load->library('session');
        $this->load->model('Model');
        $this->load->database();
        $this->load->helper('url');
        $id = $this->input->get("rc");
        $data['listeProduit'] = $this->Model->getProduitForAcceuil($id);
        $this->load->view('template/home',$data);
    }

    public function backoffice(){
        $this->load->library('session');
        $this->load->model('Model');
        $this->load->database();
        $this->load->helper('url');
        $data['listeProduit'] = $this->Model->getAllProduit();  
        $this->load->view('template/backoffice',$data);
    }

}