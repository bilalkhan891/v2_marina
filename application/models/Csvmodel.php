<?php

class Csvmodel extends CI_Model {

	function __construct() {
		parent::__construct();

	}

	function get_tides() {
		$query = $this->db->get('tides');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return FALSE;
		}
	}

	function insert_csv($data) {
		$this->db->insert('tides', $data);
	}
}
/*END OF FILE*/