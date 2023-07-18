<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Basemodel extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function save($tablename, $postArray, $cond = array()) {
		$insid = 0;
		if (!empty($cond) && $cond['id'] != 0) {                
			$this->db->set($postArray);
			$this->db->where($cond);
			$res = $this->db->update($tablename);
			$insid = isset($cond['id']) ? $cond['id'] : 0;
		} else {               
			$this->db->insert($tablename, $postArray);
			$insid = $this->db->insert_id();
		}
		return $insid;
	}
}
