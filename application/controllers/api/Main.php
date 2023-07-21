<?php
defined('BASEPATH') OR exit('No direct script access allowed');

   

require APPPATH . 'core/REST_Controller.php';

	 

class Main extends REST_Controller {
	private $bearer='def1d33e4a2220ec7143fa57d6249aeb9fdfbdac5baa0b11685995e38bb06b9a';
	

	  /**

	 * Get All Data from this method.

	 *

	 * @return Response

	*/

	public function __construct() {

		header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type, X-Requested-With, X-Auth-Token, Authorization');
        header('Access-Control-Allow-Origin: *');
	   header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
	   header('Content-Type: application/json, charset=utf-8');
	   
	   parent::__construct();

	   $this->load->database();

	}

	   

	/**

	 * Get All Data from this method.

	 *

	 * @return Response

	*/

	public function index_get($table = 'menus', $id = 0) {
		$headers = getallheaders();
		$bearer = trim(str_replace("Bearer", "", $headers['Authorization']));
		if ($bearer != $this->bearer) {
			$data['success'] = false;
			$data['data'] = "Unauthorized Access";
			$this->response($data, REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		}
		if(!empty($id)) {
			$data['success'] = true;
			$data['data'] = $this->db->get_where($table, ['id' => $id])->row_array();
			$data['submenus'] = $this->db->get_where($table, ['parent_id' => $id])->result_array();

		} else{
			$data['success'] = true;
			if ($table == 'menus') {
				$data['data'] = $this->db->get_where($table, ['parent_id' => 0])->result();
			} else {
				$data['data'] = $this->db->get($table)->result();
			}

		}

		$this->response($data, REST_Controller::HTTP_OK);
	}

	  

	/**

	 * Get All Data from this method.

	 *

	 * @return Response

	*/

	public function index_post()

	{

		$input = $this->input->post();

		$this->db->insert('items',$input);

	 

		$this->response(['Item created successfully.'], REST_Controller::HTTP_OK);

	} 

	 

	/**

	 * Get All Data from this method.

	 *

	 * @return Response

	*/

	public function index_put($id)

	{

		$input = $this->put();

		$this->db->update('items', $input, array('id'=>$id));

	 

		$this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);

	}

	 

	/**

	 * Get All Data from this method.

	 *

	 * @return Response

	*/

	public function index_delete($id)

	{

		$this->db->delete('items', array('id'=>$id));

	   

		$this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);

	}

		

}