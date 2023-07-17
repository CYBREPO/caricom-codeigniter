<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function index() {
        $data['title'] = 'Manage Menus';
        $data['page'] = 'menu_list';
        $data['rows'] = $this->_get();

		$this->load->view('main', $data);
	}

    function _get() {
        $sql = "SELECT *
        FROM menus";
        $query = $this->db->query($sql);
        $rows = $query->result_array();

        return $rows;
    }

    function edit($id = 0) {
        $data['title'] = 'Manage Menus';
        $data['page'] = 'menu_edit';

        $sql = "SELECT * FROM menus WHERE id = $id";
        $row = $this->db->query($sql)->row_array();

        if (! $row) {
            $row = [
                'id'          => 0,
                'title'       => '',
                'description' => '',
                'status'      => 'Active',
            ];
        }
        
        $data['row'] = $row;
        $this->load->view('main', $data);
    }
}
