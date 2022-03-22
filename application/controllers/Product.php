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

	    if( !$this->session->userdata('is_logged_in') == 1 ){
	    	redirect('/');
	    }
	    if( $this->session->userdata('role') == 1){
    		redirect('admindashboard');
    	}
		
	}

	public function index()
	{
		$data['products'] = $this->Product_model->getAllProducts();
		$this->load->view('products', $data);
	}
	
}
