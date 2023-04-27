<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
	public function index(){
	}

    function loadpage($param1="",$param2="",$param3=""){
        $page_data['formSubmit']="";
        if($param1=="AddUsers"){
            $page_data['t_user'] = $this->db->get('t_user_master')->result_array();
            $this->load->view('admin/pages/systemusers', $page_data);
        }
         if($param1=="Addslider"){
            $page_data['t_slider'] = $this->db->get('t_homeslider')->result_array();
            $this->load->view('admin/pages/homeslider', $page_data);
        }
        
        if($param1=="AddEvents"){
            $page_data['t_news'] = $this->db->get('t_events')->result_array();
            $this->load->view('admin/pages/News', $page_data);
        }
        if($param1=="ViewEventsDetails"){
            $page_data['eventdetails'] = $this->db->get_where('t_events', array(
            'Id' => $param2))->row();
            $this->load->view('admin/pages/eventdetails', $page_data);
        }
        if($param1=="Download"){
            $page_data['t_download'] = $this->db->get('t_download')->result_array();
            $this->load->view('admin/pages/download', $page_data);
        }
    }
    function UpdateInfo($param1="",$param2=""){
        $page_data['formSubmit']="";
        $page_data['message']="";
        $page_data['messagefail']="";
         if($param1=='edtAnnouncementinfo'){
            $data['Name']=$this->input->post('name');
            $data['Description']=$this->input->post('description');
            if(!empty($_FILES["Image"]["name"])){
                $fle="../uploads/Events".$this->input->post('currentlogoinivalue');
                if (file_exists($fle)){
                    unlink($fle);
                }
                move_uploaded_file($_FILES['Image']['tmp_name'],'./uploads/Events/'.$_FILES["Image"]["name"]);
                $data['Image']=$_FILES["Image"]["name"];
            }
            $this->db->where('Id', $this->input->post('updateId'));
            $this->db->update('t_events', $data);
            $page_data['t_news'] = $this->db->get('t_events')->result_array();
             if($this->db->affected_rows()>0){
            $page_data['message']="<div class='alert alert-success alert-dismissible'>Event has been successfully Updated</div>";
        }
        else{
            $page_data['messagefail']="<div class='alert alert-danger alert-dismissible'>Unable to Update Events. Please Try Again!";
        }
            $this->load->view('admin/pages/News', $page_data);           
        }
    }
    function AddSystemUsers($page=""){
        $page_data['message']="";
        $page_data['messagefail']="";
        $data['Email']=$this->input->post('Email');
        $data['Password']=password_hash("jnec@2023", PASSWORD_BCRYPT);
        $data['Contact_No']=$this->input->post('Phone');
        $data['Name']=$this->input->post('Name');
        $data['Entry_by']=$this->session->userdata('User_Id');
        $data['Created_date']=date('Y-m-d h:i:s');
        $this->CommonModel->do_insert('t_user_master', $data); 
        $page_data['t_user'] = $this->db->get('t_user_master')->result_array();
        if($this->db->affected_rows()>0){
            $page_data['message']="<div class='alert alert-success alert-dismissible'>User has been successfully Created</div>";
        }
        else{
            $page_data['messagefail']="<div class='alert alert-danger alert-dismissible'>Unable to create User. Please Try Again!";
        }
        $this->load->view('admin/pages/systemusers', $page_data); 
    }
    function EditSystemUsers(){
        $data['Name']=$this->input->post('Name1');
        $data['Status']=$this->input->post('status');
        $data['Contact_No']=$this->input->post('Phone1');
        $data['Email']=$this->input->post('Email1');
        // $data['Password']=password_hash($this->input->post('Password'), PASSWORD_BCRYPT);
        $this->db->where('Id', $this->input->post('EditId'));
        $this->db->update('t_user_master', $data);
        $page_data['t_user'] = $this->db->get('t_user_master')->result_array();
        $page_data['message']="<div class='alert alert-success alert-dismissible'>User has been Editted successfully</div>";
        $this->load->view('admin/pages/systemusers', $page_data); 
    }
    function Adddownload(){
        $page_data['message']="";
        $page_data['messagefail']="";
        $data['Name']=$this->input->post('Name');
        $new_file_name = $_FILES["Image"]["name"];
        $file_directory = "../uploads/Download/";
        if(!is_dir($file_directory)){
            mkdir($file_directory,0777,TRUE);
        }
        if($new_file_name!=""){
          move_uploaded_file($_FILES["Image"]["tmp_name"],''.$file_directory . $new_file_name);
          $data['File']=$file_directory . $new_file_name;
        }
        $this->CommonModel->do_insert('t_download', $data); 
        $page_data['t_download'] = $this->db->get('t_download')->result_array();
        if($this->db->affected_rows()>0){
            $page_data['message']="<div class='alert alert-success alert-dismissible'>Download File has been add successfully Created</div>";
        }
        else{
            $page_data['messagefail']="<div class='alert alert-danger alert-dismissible'>Unable to Upload File. Please Try Again!";
        }
        $this->load->view('admin/pages/download', $page_data); 
      }
      function DeleteDownload($productid="",$page=""){ 
        $page_data['message']="";
        $page_data['messagefail']="";
        $this->db->where('Id', $productid);
        $this->db->delete('t_download');
        $page_data['t_download'] = $this->db->get('t_download')->result_array();
        if($this->db->affected_rows()>0){
            $page_data['message']="<div class='alert alert-success alert-dismissible'>File has been Deleted successfully</div>";
        }
        else{
            $page_data['messagefail']="<div class='alert alert-danger alert-dismissible'>Unable to delete File. Please Try Again!";
        }
        $this->load->view('admin/pages/download', $page_data);
        }
    function Addslider(){
        $data['Name']=$this->input->post('Name');
        $data['Status']='Active';
        $new_file_name = $_FILES["Image"]["name"];
        $file_directory = "uploads/slider/";
        if(!is_dir($file_directory)){
            mkdir($file_directory,0777,TRUE);
        }
        if($new_file_name!=""){
          move_uploaded_file($_FILES["Image"]["tmp_name"], $file_directory . $new_file_name);
          $data['image']=$file_directory . $new_file_name;
        }
         $this->CommonModel->do_insert('t_homeslider', $data);
         $page_data['t_slider'] = $this->db->get('t_homeslider')->result_array();
         if($this->db->affected_rows()>0){
            $page_data['message']="<div class='alert alert-success alert-dismissible'>Slider has been add successfully Created</div>";
        }
        else{
            $page_data['messagefail']="<div class='alert alert-danger alert-dismissible'>Unable to create Slider. Please Try Again!";
        }
        $this->load->view('admin/pages/homeslider', $page_data); 

    }
    function Deleteslider($productid="",$page=""){ 
        $page_data['message']="";
        $page_data['messagefail']="";
        $this->db->where('Id', $productid);
        $this->db->delete('t_homeslider');
        $page_data['t_slider'] = $this->db->get('t_homeslider')->result_array();
        if($this->db->affected_rows()>0){
            $page_data['message']="<div class='alert alert-success alert-dismissible'>Slider has been Deleted successfully</div>";
        }
        else{
            $page_data['messagefail']="<div class='alert alert-danger alert-dismissible'>Unable to delete Slider. Please Try Again!";
        }
        $this->load->view('admin/pages/homeslider', $page_data);
        }

        function DeleteEvents($productid="",$page=""){ 
        $page_data['message']="";
        $page_data['messagefail']="";
        $this->db->where('Id', $productid);
        $this->db->delete('t_events');
        $page_data['t_news'] = $this->db->get('t_events')->result_array();
        if($this->db->affected_rows()>0){
            $page_data['message']="<div class='alert alert-success alert-dismissible'>Events has been Deleted successfully </div>";
        }
        else{
            $page_data['messagefail']="<div class='alert alert-danger alert-dismissible'>Unable to delete Events. Please Try Again!";
        }
        $this->load->view('admin/pages/News', $page_data);
        }
    function Addnews(){
        $data['Name']=$this->input->post('name');
        $data['Description']=$this->input->post('description');
        $data['Status']='Active';
        $data['Date']=date('Y-m-d');
        $new_file_name = $_FILES["Image"]["name"];
        $file_directory = "../uploads/Events/";
        if(!is_dir($file_directory)){
            mkdir($file_directory,0777,TRUE);
        }
        if($new_file_name!=""){
          move_uploaded_file($_FILES["Image"]["tmp_name"], $file_directory . $new_file_name);
          $data['Image']=$file_directory . $new_file_name;
        }
         $this->CommonModel->do_insert('t_events', $data);
         $page_data['t_news'] = $this->db->get('t_events')->result_array();
         if($this->db->affected_rows()>0){
            $page_data['message']="<div class='alert alert-success alert-dismissible'>Events has been successfully Created</div>";
        }
        else{
            $page_data['messagefail']="<div class='alert alert-danger alert-dismissible'>Unable to create Event. Please Try Again!";
        }
        $this->load->view('admin/pages/News', $page_data); 

    }
    function UpdateUserDetails(){
        $data['Mobile_Number']=$this->input->post('Phone');
        if(!empty($_FILES["Image"]["name"])){
            $fle="./uploads/".$this->input->post('currentlogoinivalue');
            if (file_exists($fle)){
                unlink($fle);
            }
            move_uploaded_file($_FILES['Image']['tmp_name'],'./uploads/'.$_FILES["Image"]["name"]);
            $data['Image']=$_FILES["Image"]["name"];
        }
        // die($this->input->post('uId'));
        $this->db->where('Id', $this->input->post('uId'));
        $this->db->update('t_user', $data);
        $page_data['userDetils'] =$this->CommonModel->getuserDetails($this->input->post('uId'));
        $page_data['message']="<div class='alert alert-success alert-dismissible'>Update Information successfully</div>";
        $this->load->view('admin/pages/UserAccount', $page_data);

    }
    function updatepassword($param1=""){
        $page_data['message']="";
        $page_data['messagefail']="";
        $data['Password']=password_hash($this->input->post('cpassword'), PASSWORD_BCRYPT);
            $this->db->where('Id', $this->input->post('uId'));
            $this->db->update('t_user`', $data);
            if($this->db->affected_rows()>0){
                 $page_data['message']="<div class='alert alert-success alert-dismissible'>Your Password is updated successfully. Please logout and login back</div>";
            }
            else{
                $page_data['message']="<div class='alert alert-danger alert-dismissible'>Not able to update your Password. Please try Again</div>";
            } 
            $page_data['userDetils'] =$this->CommonModel->getuserDetails($this->input->post('uId'));
             $this->load->view('admin/pages/UserAccount', $page_data);
    }
    function logout($param=''){  
        $this->session->unset_userdata(0);
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url().'index.php?adminController/login', 'refresh');
    }

}
