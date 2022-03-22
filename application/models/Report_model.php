<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model {

  function activeUserCount(){
 
    $this->db->where('status', 1);
    $this->db->where('role', 2);
    $query = $this->db->get('users');
    return $query->num_rows();
  } 

  function activeUserProductCount(){

    $this->db->join('user_products','user_products.user_id = users.id');
    $this->db->join('products','products.id = user_products.product_id');
    $this->db->where('role', 2);
    $this->db->where('users.status', 1);
    $this->db->where('products.status', 1);
    $this->db->group_by("users.id");
    $query = $this->db->get('users');
    return $query->num_rows();
  } 

  function activeProductCount(){

    $this->db->where('status', 1);
    $query = $this->db->get('products');
    return $query->num_rows();
  } 
  function activeProductNoUserCount(){

    $this->db->select('product_id');
    $this->db->from('user_products');
    $sub_query = $this->db->get_compiled_select();

    $this->db->select('*');
    $this->db->from('products');
    $this->db->where("status",1);
    $this->db->where("id NOT IN ($sub_query)");
    $result = $this->db->get()->result();

    return count($result);
  } 

  function activeAttachProductAmount(){

    $this->db->select('id');
    $this->db->from('products');
    $this->db->where("status",1);
    $sub_query = $this->db->get_compiled_select();


    $this->db->select_sum('quantity');
    $this->db->from('user_products');
    $this->db->where("product_id IN ($sub_query)");
    $query = $this->db->get()->result();

    return $query[0]->quantity;
  }

  function summarizedActiveAttachProductAmount(){

    $this->db->select('id');
    $this->db->from('products');
    $this->db->where("status",1);
    $sub_query = $this->db->get_compiled_select();


    $this->db->select('SUM(quantity * price) as total');
    $this->db->from('user_products');
    $this->db->where("product_id IN ($sub_query)");
    $query = $this->db->get()->result();

    return $query[0]->total;
  }
   function summarizedUserActiveAttachProductAmount(){

    $this->db->select('id');
    $this->db->from('products');
    $this->db->where("status",1);
    $sub_query = $this->db->get_compiled_select();


    $this->db->select('*');
    $this->db->select('SUM(quantity * price) as total');
    $this->db->join('users','users.id = user_products.user_id');
    $this->db->from('user_products');
    $this->db->where("product_id IN ($sub_query)");
    $this->db->group_by("users.id");
    $result = $this->db->get()->result_array();

    return $result;
  } 
  
}
