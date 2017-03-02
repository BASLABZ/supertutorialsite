<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model{
    function __construct() {
        $this->tableName = 'users';
        $this->primaryKey = 'id';
    }
    public function checkUser($data = array()){
        $this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        $this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
        $prevQuery = $this->db->get();
        $prevCheck = $prevQuery->num_rows();
        
        if($prevCheck > 0){
            $prevResult = $prevQuery->row_array();
            $data['modified'] = date("Y-m-d H:i:s");
            $update = $this->db->update($this->tableName,$data,array('id'=>$prevResult['id']));
            $userID = $prevResult['id'];
        }else{
            $data['created'] = date("Y-m-d H:i:s");
            $data['modified'] = date("Y-m-d H:i:s");
            $insert = $this->db->insert($this->tableName,$data);
            $userID = $this->db->insert_id();
        }

        return $userID?$userID:FALSE;
    }
    //  build rest api
    public function getCountUsers()
    {
        $this->db->count_all_results('user',FALSE);
    }
    public function getUsers($page, $size)
    {
         return $this->db->get('user', $size, $page);
    }
    public function insertUsers($datausers)
    {
          $value = array( 
                        'iduser'=> $datausers['iduser'],
                        'name'=> $datausers['name'],
                        'email'=> $datausers['email'],
                        'password'=> $datausers['password']
                    );

        $this->db->insert('user',$value);
    }
    public function updateUsers($param)
    {
            $iduser = $this->input->post('iduser');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $query = "UPDATE user SET iduser= '".$iduser."', name='".$name."', email='".$email."' , password = '".$password."' WHERE  iduser='".$param."'";
            $this->db->query($query);
            
           // $this->db->where('iduser', $iduser);
           // $this->db->update('user', $value);

    }
    public function deleteUsers($iduser)
    {
        $query="DELETE FROM user where iduser = '".$iduser."'";
        $this->db->query($query);

    }
}