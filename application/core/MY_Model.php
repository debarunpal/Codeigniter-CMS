<?php

/**
* 
*/
class MY_Model extends CI_Model
{
	protected $_table_name = '';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	protected $_rules = array();
	protected $_timestamps = FALSE;
	
	function __construct()
	{
		parent::__construct();
	}

	/*
		1. Take id as param and default it to NULL
		2. 
	*/
	public function get($id = NULL, $single = FALSE){

		// If we have an id, we need to return a single record:

		if ($id != NULL) {

			// If we have an id, we can filter that id, just for added security
			$filter = $this->_primary_filter;

			// Set the primary key field 'id' to the variable 'id':
			$id = $filter($id);

			// Where function is used to set the primary key field value to use the variable 'id' from above:
			$this->db->where($this->_primary_key, $id);

			// Show the result set; in this case a single row result set:
			$method = 'row';
		}
		elseif ($single == TRUE) {
			// Return a single object if single param is passed:
			$method = 'row';
		}
		else {

			// Else we need to return all records i.e. array of rows:
			$method = 'result';
		}

		// Order the retrieved result set:
		if (!count($this->db->order_by('id'))) {
			$this->db->order_by($this->_order_by);
		}

		// Return the retrieved result:
		return $this->db->get($this->_table_name)->$method();
	}

	public function get_by($where, $single = FALSE){
		$this->db->where($where);
		return $this->get(NULL, $single);
	}

	public function save($data, $id = NULL){

		// Set Timestamps
		if ($this->_timestamps == TRUE) {
			$now = date('Y-m-d H:i:s');
			$id || $data['created'] = $now;
			$data['modified'] = $now;
		}

		// Insert
		if ($id === NULL) {

			// Unset the primary key index:
			!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL; 

			$this->db->set($data);
			$this->db->insert($this->_table_name);
			$id = $this->db->insert_id();
		}

		// Update
		else {

			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->set($data);
			$this->db->where($this->_primary_key, $id);
			$this->db->update($this->_table_name);
		}

		return $id;

	}

	public function delete($id){
		$filter = $this->_primary_filter;
		$id = $filter($id);

		if (!$id) {
			return FALSE;
		}

		$this->db->where($this->_primary_key, $id);
		$this->db->limit(1);
		$this->db->delete($this->_table_name);
	}
}