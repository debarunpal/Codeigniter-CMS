<?php

/**
* Creating a Base Contoller Class named MY_Controller which will extend the native in-built codeigniter library
class called CI_Controller
*/
class MY_Controller extends CI_Controller
{
	
	public $data = array();
	function __construct()
	{
		parent::__construct();

		$this-> data['errors'] = array();

		$this-> data['site_name'] = config_item('site_name');
	}
}