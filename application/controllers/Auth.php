<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
	/* Display login page */
	public function index()
	{
		$this->load->view('login');
	}

	public function adminlogin(){
		$this->load->view('adminlogin');
	}

	/* Display register page */
	public function register(){
		$this->load->view('register');
	}

	/* Register action to save data */
	public function postregister(){

		/* retrieve all details of form */
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		/* Check email already  exists OR not in Db */
		$this->db->where('email', $email);
		$data = $this->db->get('users')->result();

		/* fi exists sent back to register page */
		if(count($data) >=1 ){
			$this->session->set_flashdata('error', 'Oops!! Email already exists....');
			redirect('/register');
		}

		/* Encrypt password for security */ 
		$encryptedpass = password_hash($password, PASSWORD_DEFAULT);
		

		/* create array for insert data in database */
		$data = ["name" => $name, "email" => $email , "password"=> $encryptedpass];

		/* try and catch for insert and display any errors*/
		try{
			if($this->db->insert('users', $data)){
				$this->session->set_flashdata('success', 'You have registered successfully. Please verify your email address.');
				redirect('/');   
			}	
		} catch(Exception $e){
			$this->session->set_flashdata('error', 'Something went wrong!! Please try again later');
			redirect('/register');
		}
	}	

	public function postlogin(){
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$this->db->where('email', $email);
			$data = $this->db->get('users')->result();

			if(count($data) == 1){
				$verifyPasssword = password_verify($password, $data[0]->password); 	
				if($verifyPasssword == 1){
					 $loggedinData = ['email' => $data[0]->email, 'id' => $data[0]->id, 'name' => $data[0]->name, 'is_logged_in'=> '1'];
					 $this->session->set_userdata($loggedinData);
					 
					 if($data[0]->role == 1){
					   redirect('/admindashboard');
					 } else{
					   redirect('/products');
					 }

				} else{
					$this->session->set_flashdata('error', 'Credenatials not found in system...');
					redirect('/');
				}
			
			} else{
				$this->session->set_flashdata('error', 'Credenatials not found in system...');
				redirect('/');
			}	
	}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('is_logged_in');

		$this->session->set_flashdata('success', 'You have successfully logged out.');
		redirect('/');
	}
}
