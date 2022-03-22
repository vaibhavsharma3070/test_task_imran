<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

  function getAllProducts(){
 
    $response = array();
 
    // Select record
    $this->db->select('*');
    $q = $this->db->get('products
    	');
    $response = $q->result_array();

    return $response;
  } 

  function getActiveProducts(){
 
    $response = array();
 
    // Select record
    $this->db->select('*');
    $this->db->where('status',1);
    $q = $this->db->get('products
    	');
    $response = $q->result_array();

    return $response;
  }

}
