<?php 

    class User extends CI_Controller
{
     public function __construct(){
        parent::__construct();
        $this->load->library('template');
        // $this->load->model('user');
    }
    public function index()
    {
        $this->template->view_admin('superlogin/user/list');
    }
    
}
