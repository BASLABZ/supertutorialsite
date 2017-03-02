<?php 

/**
 * 
 */
class Rest_api extends CI_Controller
{
    
    public function __construct(){
        parent::__construct();
       
        $this->load->library('session');
        $this->load->library('template');
        // load model rest api
        $this->load->model('User');
        
    }
    public function index()
    {

        $this->template->view_admin('superlogin/riset/rest_api/index');
    }
     public function getUsers($page, $size)
  {

    $response = array(
      'content' => $this->User->getUsers(($page - 1) * $size, $size)->result(),
      'totalPages' => ceil($this->User->getCountUsers() / $size));

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }
//   insert data
  public function saveUsers()
  {
      $data = (array)json_decode(file_get_contents('php://input'));
      $this->User->insertUsers($data);
      $response = array(
                        'Success'   => true,
                        'Info'=> 'Data Tersimpan' );
    $this->output
                    ->set_status_header(201)
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode($response, JSON_PRETTY_PRINT))
                    ->_display();
                    exit;
  }
//   update date_add
  public function updateUsers($iduser)
  {
    $data = (array)json_decode(file_get_contents('php://input'));
    $this->User->updateUsers($data, $iduser);

    $response = array(
      'Success' => true,
      'Info' => 'Data Berhasil di update');

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }
  public function deleteUsers($iduser)
  {
      $this->User->deleteUsers($iduser);
      
      $response = array(
      'Success' => true,
      'Info' => 'Data Berhasil di hapus');

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
  }
}
