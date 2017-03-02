<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
   
class Auth_sys extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('m_auth');
        $this->load->library('session');
        $this->load->library('template');
        $this->load->model('user');
    }
    public function index($error = NULL) {
         $data = array(
            'title' => 'Login Page',
            'action' => site_url('superlogin/auth_sys/login'),
            'error' => $error
        );
        $this->template->view_auth_admin('superlogin/auth_sys/index',$data);
    }
    public function login()
    {
        $login  = $this->m_auth->login(
                                            $this->input->post('email'),
                                            $this->input->post('password'));
        if ($login>0) {
            $row = $this->m_auth->data_login($this->input->post('email'),
                                            $this->input->post('password'));
            $data   = array(
                                'logged' => TRUE,
                                'email' => $row->email,
                                'password' => $row->password,
                                'name' => $row->name);
            $this->session->set_userdata($data);
            redirect(site_url('superlogin/home/'));

        }else{
            $error = 'Maaf Login Gagal, email / Password Salah ';
            $this->index($error);
        }
    }
    // login with  fb
    public function loginfb()
    {
        include_once APPPATH."libraries/facebook-api-php-codexworld/facebook.php";
        $appId = '289028594825217';
        $appSecret = '365c657e3db0b0048fd9f55cc11e144f';
        $redirectUrl = base_url() . 'auth_sys/loginfb';
        $fbPermissions = 'email';
        $facebook = new Facebook(array(
          'appId'  => $appId,
          'secret' => $appSecret
        
        ));

        $fbuser = $facebook->getUser();
        if ($fbuser) {
            $userProfile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];
            // Insert or update user data
            $userID = $this->user->checkUser($userData);
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
                redirect(site_url('superlogin/auth_sys/'));
            } else {
               $data['userData'] = array();
               $this->template->view_auth_admin('superlogin/home/home_fb',$data);
            }
        }else {
            $fbuser = '';
            $data['authUrl'] = $facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));
        } 
         $this->template->view_auth_admin('superlogin/home/home_fb',$data);
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect(site_url('superlogin/auth_sys'));
    }
    

}


