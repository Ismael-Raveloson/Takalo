<?php if(! defined('BASEPATH')) exit ('No direct script allowed');

class Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function inscription($nom,$email,$mdp){
        $sql = "INSERT INTO Users(usersname,email,mdp,admin) VALUES(%s,%s,%s,1)";
        $req = sprintf($sql,$this->db->escape($nom),$this->db->escape($email),$this->db->escape($mdp),$mdp);
        $this->db->query($req);
    }

    //mamerina false raha tsy miexiste , mamerina true raha efa ao
    function verifierUtil($email,$mdp){
        $valiny = false;
        $sql = "SELECT * FROM Users WHERE email = %s AND mdp=%s";
        $req = sprintf($sql,$this->db->escape($email),$this->db->escape($mdp));
        $query = $this->db->query($req);
        $num_row = $query->num_rows();
      
        if($num_row >= 1){
            $valiny = true;
        }

        return $valiny;
    }

    function getUserId($email,$mdp){
        $sql = "SELECT idUsers FROM Users WHERE email=%s AND mdp=%s";
        $req = sprintf($sql,$this->db->escape($email),$this->db->escape($mdp));
        $query = $this->db->query($req);
        $id = $query->row()->idUsers;
        return $id;
    }

    //verifier si admin , false raha tsy admin , true raha izy
    function verifierUtilAdmin($email,$mdp){
        $valiny = false;
        $sql = "SELECT * FROM Users WHERE email =%s AND mdp =%s AND admin=0";
        $req = sprintf($sql,$this->db->escape($email),$this->db->escape($mdp));
        $query = $this->db->query($req);
        $num_row = $query->num_rows();
        
        if($num_row >= 1){
            $valiny = true;
        }
        return $valiny;
    }

    function getAllObjectUser($idUtil){
        $sql = "SELECT * FROM items WHERE idUsers = %d";
        $req = sprintf($sql,$idUtil);
        $query = $this->db->query($req);
        $result = array();

        foreach($query->result_array() as $row){
            $result[] = $row;
        }
        return $result;
    }

    function getDetailProduit($idProduit){
        $sql = "SELECT * FROM items WHERE idItems = %d";
        $req = sprintf($sql,$idProduit);
        $query = $this->db->query($req);
        $result = array();

        foreach($query->result_array() as $row){
            $result[] = $row;
        }
        return $result;
    }

    function getProduitForAcceuil($idUtil){
        $sql = "SELECT * FROM items WHERE idUsers != %d";
        $req = sprintf($sql,$idUtil);
        $query = $this->db->query($req);
        $result = array();

        foreach($query->result_array() as $row){
            $result[] = $row;
        }

        return $result;
    }

    //ny 1 hoa an'ilay client connecté
    //ny 2 hoa an'ireo client hafa
    function proposerEchange($item1,$item2,$user1,$user2){
        $sql = "INSEERT INTO TRANSACTION(idItems1,idItems2,idUsers1,idUsers2) VALUES ('%d','%d','%d','%d') ";
        $req = sprintf($sql,$item1,$item2,$user1,$user2);
        $this->db->query($req);
    }
    
}

?>