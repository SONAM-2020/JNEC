<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebsiteController extends CI_Controller { 
	public function index(){
        $page_data['t_slider'] = $this->db->get_where('t_homeslider',array('Status'=>'Active'))->result_array();
        $page_data['t_news'] = $this->db->get_where('t_events',array('Status'=>'Active'))->result_array();
        $this->load->view('web/index',$page_data);
	}
    function loadpage($param1="",$param2=""){
        if($param1=="login"){
            $page_data['linktype']=$param1;
            $this->load->view('web/pages/login', $page_data);   
        }
        if($param1=="events"){
            $page_data['linktype']=$param1;
            $page_data['t_news'] = $this->db->get('t_events')->result_array();
            $this->load->view('web/pages/eventlist', $page_data);   
        }
        if($param1=="about"){
            $page_data['linktype']=$param1;
            $this->load->view('web/pages/aboutus', $page_data);   
        }
        if($param1=="download"){
            $page_data['linktype']=$param1;
             $page_data['t_downloads'] = $this->db->get('t_download')->result_array();
            $this->load->view('web/pages/download', $page_data);   
        }
        if($param1=="members"){
            $page_data['linktype']=$param1;
            $this->load->view('web/pages/menbers', $page_data);   
        }
        if($param1=="contact"){
            $page_data['linktype']=$param1;
            $this->load->view('web/pages/contactus', $page_data);   
        }
       
    }

    function load_NewsDestails($id=""){
        $page_data['news_list'] = $this->db->get_where('t_events',array('Status'=>'Active'))->result_array();
        $page_data['t_announcement'] = $this->db->get_where('t_events',array('Id'=>$id))->row();
        $this->load->view('web/pages/eventdetails', $page_data);
    }

    function Addcontactus(){
        $page_data['message']="";
        $page_data['messagefail']="";
        
        $data['Name']=$this->input->post('name');
        $data['Email']=$this->input->post('email');
        $data['Phone']=$this->input->post('phone');
        $data['Subject']=$this->input->post('contactSubject');
        $data['Message']=$this->input->post('contactMessage');
        $this->CommonModel->do_insert('t_contactus', $data);

        if($this->db->affected_rows()>0){

            $this->load->library('email');
            $config = array(
                'protocol'  => 'ssmtp',
                'smtp_host' => 'ssl://ssmtp.googlemail.com',//ssl://ssmtp.googlemail.com
                'smtp_port' => 465, 
                'smtp_user' => 'noreply@dcsitechnology.bt',
                'smtp_pass' => 'admin@2021',
                'smtp_timeout' => '7',
                'mailtype'  => 'html',
                'smtp_crypto' => 'security', //can be 'ssl' or 'tls' for example
                'charset'   => 'utf-8'
            );
            $this->email->initialize($config);
            $this->email->set_mailtype("html");
            $this->email->set_newline("\r\n");
            $this->load->helper('string');
            $sql = "SELECT Email FROM t_user_master";
            $query = $this->db->query($sql);
            $array = $query->result_array();
            $arr = array_column($array,"Email");

            $t_mail_template=$this->db->get_where('t_mail_template', array( 'Template_Module' => 'NOTIFICATION'))->row()->Template_Mail_Body;
            $t_mail_template=str_replace("##NAME##", ''.$this->input->post('equipment'),  $t_mail_template);
            $t_mail_template=str_replace("##SENDER##", ''.$this->input->post('name'),  $t_mail_template);
            $t_mail_template=str_replace("##CONTACT##", ''.$this->input->post('phone'),  $t_mail_template);
            $t_mail_template=str_replace("##EMAIL##", ''.$this->input->post('email'),  $t_mail_template);
            $t_mail_template=str_replace("##MESSAGE##", ''.$this->input->post('email'),  $t_mail_template);
            
            
            $htmlContent =$t_mail_template;
            $this->email->to($arr);
            $this->email->from('noreply@dcsitechnology.bt','noreply');
            $this->email->subject('DCSI Technology Request of Your Choice');
            $this->email->message($htmlContent);
            $this->email->send();
            $page_data['message']="";
            $page_data['messagefail']="";
            $page_data['message']="<div class='alert alert-success alert-dismissible'>Your Information has been added. You will be notified throught email.Thank you for using our system.</div>";
        }
        else{
            $page_data['messagefail']="<div class='alert alert-danger alert-dismissible'>Your Information  is not able to submit. Please try again.Thank You.</div>";
        }

        $this->load->view('web/pages/contactus', $page_data);
    }

}

