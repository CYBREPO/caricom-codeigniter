<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	public function index() {
        $data['title'] = 'Sliders';
        $data['page'] = 'slider_list';
        $data['rows'] = $this->_get();

		$this->load->view('main', $data);
	}

    function _get() {
        $sql = "SELECT *
        FROM sliders";
        $query = $this->db->query($sql);
        $rows = $query->result_array();

        return $rows;
    }

    function edit($id) {
        $sql = "SELECT * FROM sliders WHERE id = $id";
        $row = $this->db->query($sql)->row_array();

        if (! $row) {
            $row = [
                'id'          => 0,
                'title'       => '',
                'file'       => '',
                'description' => '',
                'btn_text_one' => '',
                'btn_url_one' => '',
                'status'      => 'Active',
                'created'     => '',
                'updated'     => '',
            ];
        }

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('title', 'Side Title', 'trim|required');

        if($this->form_validation->run() == false) {
            if (strlen(validation_errors()) > 0) {
                $alert['alert'] = $this->session->userdata("alert");
                $alert['alert']['error'] = trim(validation_errors());
                if (! $alert['alert']['error']) {
                    $alert['alert']['error'] = explode("\n", trim(validation_errors()));
                }
                $this->session->set_userdata($alert);
            }

            $docdir         = implode('/', str_split($id)).'/';
            $data['id']     = ['id' => $id];
            $data['docurl'] = base_url('/documents/sliders/'.$docdir);
            $data['row']    = $row;
            $data['title']  = 'Sliders';
            $data['page']   = 'slider_edit';
            $this->load->view('main', $data);
        } else {
            $data = [
                'title'        => $this->input->post('title'),
                'description'  => trim($this->input->post('description')),
                'btn_url_one'  => trim($this->input->post('btn_url_one')),
                'btn_text_one' => trim($this->input->post('btn_text_one')),
                'status'       => $this->input->post('status'),
                'created'      => $id == 0 ? date('Y-m-d H:i:s') : $row['created'],
            ];

            $id = $this->basemodel->save('sliders', $data, ['id' => $id]);

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

                    mkdir(FCPATH.'documents/sliders/'.$docdir, 0777, TRUE);
                    rename($image['full_path'], FCPATH.'documents/sliders/'.$docdir.$newfile);
                   
                    $this->db->update('sliders', ['file' => base_url('/documents/sliders/'.$docdir).$newfile], ['id' => $id]);

                }

            }

            $alert['alert'] = $this->session->userdata("alert");
            $alert['alert']['success'] = trim('Changes Saved Successfully');
            if (! $alert['alert']['success']) {
                $alert['alert']['success'] = explode("\n", trim('Changes Saved Successfully'));
            }
            $this->session->set_userdata($alert);
            redirect('/slider/edit/'.$id);
        }
    }

    function delfile($id) {
        $docdir = implode('/', str_split($id)).'/';
        $file = $this->db->query('select file from sliders where id = ?', [$id])->row_array();
        $this->db->update('sliders', ['file' => ''], ['id' => $id]);

        if (strlen($file['file']) > 0) {
            unlink(FCPATH.'documents/sliders/'.$docdir.$file['file']);
        }

        $alert['alert'] = $this->session->userdata("alert");
        $alert['alert']['success'] = trim('Image deleted Successfully');
        if (! $alert['alert']['success']) {
            $alert['alert']['success'] = explode("\n", trim('Image Deleted Successfully'));
        }
        $this->session->set_userdata($alert);
        redirect('/slider/edit/'.$id);
    }
}
