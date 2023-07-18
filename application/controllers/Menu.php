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
        FROM menus
        WHERE parent_id = 0";
        $query = $this->db->query($sql);
        $rows = $query->result_array();

        return $rows;
    }

    function edit($id) {
        $sql = "SELECT * FROM menus WHERE id = $id";
        $row = $this->db->query($sql)->row_array();

        if (! $row) {
            $row = [
                'id'          => 0,
                'title'       => '',
                'description' => '',
                'has_submenu' => 'No',
                'status'      => 'Active',
                'created'     => '',
                'updated'     => '',
            ];
        }

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('title', 'Menu Title', 'trim|required');

        if($this->form_validation->run() == false) {
            if (strlen(validation_errors()) > 0) {
                $alert['alert'] = $this->session->userdata("alert");
                $alert['alert']['error'] = trim(validation_errors());
                if (! $alert['alert']['error']) {
                    $alert['alert']['error'] = explode("\n", trim(validation_errors()));
                }
                $this->session->set_userdata($alert);
            }

            $docdir = implode('/', str_split($id)).'/';
            $data['id'] = ['id'=>$id];
            $data['docurl'] = '/documents/menus/'.$docdir;
            $data['row'] = $row;
            $data['title'] = 'Manage Menus';
            $data['page'] = 'menu_edit';
            $this->load->view('main', $data);
        } else {
            $data = [
                'title'       => $this->input->post('title'),
                'description' => trim($this->input->post('description')),
                'status'      => $this->input->post('status'),
                'has_submenu' => $this->input->post('has_submenu'),
                'created'     => $id == 0 ? date('Y-m-d H:i:s'): $row['created'],
            ];

            $id = $this->basemodel->save('menus', $data, ['id' => $id]);

            if ($id) {
                $config['upload_path']   = './php_uploads/';
                $config['allowed_types'] = 'gif|png|jpg|jpeg|bmp';
                $config['encrypt_name']  = true;
                $config['remove_spaces'] = true;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload()) {
                    $image = $this->upload->data();
                    $newfile = uniqid().$image['file_ext'];
                    $docdir = implode('/', str_split($id)).'/';

                    mkdir(FCPATH.'documents/menus/'.$docdir, 0777, TRUE);
                    rename($image['full_path'], FCPATH.'documents/menus/'.$docdir.$newfile);
                   
                    $this->db->update('menus', ['file' => $newfile], ['id' => $id]);

                }

            }

            $alert['alert'] = $this->session->userdata("alert");
            $alert['alert']['success'] = trim('Changes Saved Successfully');
            if (! $alert['alert']['success']) {
                $alert['alert']['success'] = explode("\n", trim('Changes Saved Successfully'));
            }
            $this->session->set_userdata($alert);
            redirect('/menu/edit/'.$id);
        }
    }

    function submenu($menu_id) {
        $sql = "SELECT * FROM menus WHERE id = $menu_id";
        $main_menu = $this->db->query($sql)->row_array();

        $sql = "SELECT *
        FROM menus
        WHERE parent_id = $menu_id";
        $query = $this->db->query($sql);
        $rows = $query->result_array();

        $data['title'] = $main_menu['title'];
        $data['page'] = 'submenu_list';
        $data['rows'] = $rows;
        $data['main_menu'] = $main_menu;

		$this->load->view('main', $data);
    }

    function submenu_edit($menu_id, $id) {
        $sql = "SELECT * FROM menus WHERE id = $menu_id";
        $main_menu = $this->db->query($sql)->row_array();

        $sql = "SELECT * FROM menus WHERE id = $id";
        $row = $this->db->query($sql)->row_array();

        if (! $row) {
            $row = [
                'id'          => 0,
                'parent_id'   => $menu_id,
                'title'       => '',
                'description' => '',
                'has_submenu' => 'No',
                'status'      => 'Active',
                'created'     => '',
                'updated'     => '',
            ];
        }

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('title', 'Menu Title', 'trim|required');

        if($this->form_validation->run() == false) {
            if (strlen(validation_errors()) > 0) {
                $alert['alert'] = $this->session->userdata("alert");
                $alert['alert']['error'] = trim(validation_errors());
                if (! $alert['alert']['error']) {
                    $alert['alert']['error'] = explode("\n", trim(validation_errors()));
                }
                $this->session->set_userdata($alert);
            }

            $data['id']        = ['id' => $id];
            $data['row']       = $row;
            $data['main_menu'] = $main_menu;
            $data['title']     = $main_menu['title'];
            $data['page']      = 'submenu_edit';
            $this->load->view('main', $data);
        } else {
            $data = [
                'parent_id'   => $row['parent_id'],
                'title'       => $this->input->post('title'),
                'description' => trim($this->input->post('description')),
                'status'      => $this->input->post('status'),
                'has_submenu' => $this->input->post('has_submenu'),
                'created'     => $id == 0 ? date('Y-m-d H: i: s'): $row['created'],
            ];

            $id = $this->basemodel->save('menus', $data, ['id' => $id]);

            $alert['alert'] = $this->session->userdata("alert");
            $alert['alert']['success'] = trim('Changes Saved Successfully');
            if (! $alert['alert']['success']) {
                $alert['alert']['success'] = explode("\n", trim('Changes Saved Successfully'));
            }
            $this->session->set_userdata($alert);
            redirect('/menu/submenu_edit/'.$menu_id.'/'.$id);
        }
    }

    function delfile($id) {
        $docdir = implode('/', str_split($id)).'/';
        $file = $this->db->query('select file from menus where id = ?', [$id])->row_array();
        $this->db->update('menus', ['file' => ''], ['id' => $id]);

        if (strlen($file['file']) > 0) {
            unlink(FCPATH.'documents/menus/'.$docdir.$file['file']);
        }

        $alert['alert'] = $this->session->userdata("alert");
        $alert['alert']['success'] = trim('Image deleted Successfully');
        if (! $alert['alert']['success']) {
            $alert['alert']['success'] = explode("\n", trim('Image Deleted Successfully'));
        }
        $this->session->set_userdata($alert);
        redirect('/menu/edit/'.$id);
    }
}
