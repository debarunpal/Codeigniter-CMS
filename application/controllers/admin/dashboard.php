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
	}
}