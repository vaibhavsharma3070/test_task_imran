<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct() {
		
		parent::__construct();  

		$this->load->helper('url');
	    $this->load->library('session');
	    $this->load->model('Product_model');
	    if( !$this->session->userdata('is_logged_in') == 1 ){
	    	redirect('/');
	    }
    	if( $this->session->userdata('role') != 1){
    		redirect('products');
    	}
	}

	/* Display login page */
	public function index()
	{
		$users = $this->db->where('role', 2)->get("users")->result();
		$this->load->view('admindashboard', ['users' => $users]);
	}
	public function products()
	{
		$products = $this->Product_model->getAllProducts();
		$this->load->view('admin_products', ['products' => $products]);
	}

	public function updateStatus()
	{
		$id = $this->input->post('id');

		$this->db->where('id', $id);
		$data = $this->db->get('users')->result();

		$status = ($data[0]->status == 1) ? 0 : 1;

		$this->db->where('id', $id);
		$update = $this->db->update('users', ['status' => $status]);

		if($update){
			$arr = ['status' => true,"message" => "status updated successfully!"];
		}else{
			$arr = ['status' => false,"message" => "something went wrong!"];
		}

		echo json_encode($arr);
	}
	
}
