<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Product_model extends CI_Model {

  function getUserProducts($uid){
 
    $response = array();
 
    // Select record
    $this->db->select('*');
    $this->db->join('products','products.id = user_products.product_id');
    $this->db->where('user_id',$uid);
    $q = $this->db->get('user_products');
    $response = $q->result_array();

    return $response;
  } 
  function getAllUserProducts(){
 
    $response = array();
 
    // Select record
    $this->db->select('*, products.status as pstatus');
    $this->db->join('products','products.id = user_products.product_id');
    $this->db->join('users','users.id = user_products.user_id');
    $q = $this->db->get('user_products');
    $response = $q->result_array();

    return $response;
  } 

  function verifyProducts($uid,$pid){
 
    $response = array();
 
    // Select record
    $this->db->select('*');
    $this->db->where('user_id',$uid);
    $this->db->where('product_id ',$pid);
    $q = $this->db->get('user_products');
    $response = $q->result_array();

    return $response;
  } 

  function insert($data) {
    $this->db->insert('user_products',$data);
    return ($this->db->affected_rows() != 1) ? false : true;
}
}
