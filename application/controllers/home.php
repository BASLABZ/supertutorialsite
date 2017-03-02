<?php 
/**@author : ahmad bastiar - SuperTutorial
site: supertutorialsite.wordpress.com
* home f-end : Core

*/
class Home extends CI_Controller
{
	
	public function index()
	{
		$this->load->view('home/index');
	}
}