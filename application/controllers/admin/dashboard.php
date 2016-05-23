<?php
/**
* 
*/
class Dashboard extends CI_Controller
{
	
	public function __construct()
	{
		# code...
		parent::__construct();
		
		# Within the constructor, load a model:
		$this->load->model('user');

		# Using this model to check if the user is loggedIn:
	}
}