<?php 
 
class m_auth extends CI_Model {
    
    
    public function login($email,$password) {
        $sql = "SELECT * FROM user WHERE  email='".$email."' AND password=md5('".$password."') ";
        $query = $this->db->query($sql);
   
        return $query->num_rows();
             
    }

    
    public function data_login($email,$password) {
        $sql = "SELECT * FROM user WHERE  email='".$email."' AND password=md5('".$password."') ";
        $query = $this->db->query($sql);

        return $query->row();
    }



}
 