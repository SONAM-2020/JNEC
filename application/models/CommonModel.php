<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CommonModel extends CI_Model{
	function __construct(){
        parent::__construct();
    }
    function do_insert($table,$data){
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }
    function getuserDetails($id=""){
        $query =$this->db->query("SELECT * FROM t_user u LEFT JOIN t_role r ON r.`Id`=u.`Role_Id` WHERE u.`Id`= '".$id."'")->row();
        return $query;
        
    }
}