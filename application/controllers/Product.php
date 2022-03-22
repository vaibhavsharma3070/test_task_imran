<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
	    $this->load->model('User_Product_model');

	    if( !$this->session->userdata('is_logged_in') == 1 ){
	    	redirect('/');
	    }
	    if( $this->session->userdata('role') == 1){
    		redirect('admindashboard');
    	}
		
	}

	public function index()
	{
		$this->load->view('user_home');
	}
	public function allProducts()
	{
		$data['products'] = $this->Product_model->getActiveProducts();
		$this->load->view('products', $data);
	}
	public function myProducts()
	{
		$uid = $this->session->userdata('id');
		$data['products'] = $this->User_Product_model->getUserProducts($uid);
		$this->load->view('user_products', $data);
	}
	public function addProducts()
	{
		$uid = $this->session->userdata('id');
		$id = $this->input->post('id');
		$qty = $this->input->post('quantity');
		$price = $this->input->post('price');

		$data = $this->User_Product_model->verifyProducts($uid,$id);
		if($data){
			$arr = ['status' => false,"message" => "Already Added!"];
			echo json_encode($arr);
			exit;
		}

		$parr = ['user_id ' => $uid, 'product_id' => $id , 'quantity' => $qty, 'price' => $price];

		$insert = $this->User_Product_model->insert($parr);

		if($insert){
			$arr = ['status' => true,"message" => "Product added successfully!"];
		}else{
			$arr = ['status' => false,"message" => "something went wrong!"];
		}

		echo json_encode($arr);
	}
}
