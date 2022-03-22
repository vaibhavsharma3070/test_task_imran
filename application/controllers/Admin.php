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
	    $this->load->model('User_Product_model');
	    $this->load->model('Report_model');
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

	public function userProducts()
	{
		$products = $this->User_Product_model->getAllUserProducts();
		$this->load->view('uproducts', ['products' => $products]);
	}
	public function reports()
	{
		$active_user_count = $this->Report_model->activeUserCount(); 
		$active_user_product_count = $this->Report_model->activeUserProductCount(); 
		$active_product_count = $this->Report_model->activeProductCount(); 
		$active_product_no_user_count = $this->Report_model->activeProductNoUserCount(); 
		$active_attach_product_amount = $this->Report_model->activeAttachProductAmount(); 
		$summarized_active_attach_product_price = $this->Report_model->summarizedActiveAttachProductAmount(); 
		$summarized_active_attach_product_price_user = $this->Report_model->summarizedUserActiveAttachProductAmount(); 

		 	$url = 'http://api.exchangeratesapi.io/v1/latest?access_key=e15df733d150dd9d8a9019e7be3164f8&base=EUR&symbols=USD,RON';
   		 	$curl = curl_init($url);
   		  	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        	$exRates = curl_exec($curl);
            curl_close($curl);

            $exRates = json_decode($exRates,true);

            $this->load->view('reports/admin_reports', ['active_user_count' => $active_user_count,'active_user_product_count' => $active_user_product_count,'active_product_count' => $active_product_count,'active_product_no_user_count' => $active_product_no_user_count,'active_attach_product_amount' => $active_attach_product_amount,'summarized_active_attach_product_price' => $summarized_active_attach_product_price,'summarized_active_attach_product_price_user' => $summarized_active_attach_product_price_user,'exRates' => $exRates]);
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
		exit;
	}
	public function productUpdate()
	{

		$id = $this->input->post('id');

		$this->db->where('id', $id);
		$data = $this->db->get('products')->result();

		$status = ($data[0]->status == 1) ? 0 : 1;

		$this->db->where('id', $id);
		$update = $this->db->update('products', ['status' => $status]);

		if($update){
			$arr = ['status' => true,"message" => "status updated successfully!"];
		}else{
			$arr = ['status' => false,"message" => "something went wrong!"];
		}

		echo json_encode($arr);
		exit;
	}
	
}
