<?php
use api\RestServer\RestController;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Item extends RestController {
	/**
     * Get All Data from this method.
     *
     * @return Response
    */

    public function __construct() {
       parent::__construct();
       $this->load->database();
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
    */

	public function index_get()
	{
        $id = $this->get('id');

        if(!empty($id)){
            $data = $this->db->get_where("items", ['id' => $id])->row_array();
        }else{
            $data = $this->db->get("items")->result();
        }
        $this->response($data, RestController::HTTP_OK);
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
        $this->response(['Item created successfully.'], RestController::HTTP_OK);
    } 

    /**
     * Get All Data from this method.
     *
     * @return Response
    */

    public function index_put()
    {
        $input = $this->put();
        $id    = $input['id'];
        $this->db->update('items', $input, array('id'=>$id));
        $this->response([$id,'Item updated successfully.'], RestController::HTTP_OK);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
    */

    public function index_delete()
    {
        $id = $this->get('id');
        $this->db->delete('items', array('id'=>$id));
        $this->response(['Item deleted successfully.'], RestController::HTTP_OK);
    }

    	

}