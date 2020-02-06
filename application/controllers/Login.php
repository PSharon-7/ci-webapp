<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login_page');
	}

    public function process()  
    {  
        $user = $this->input->post('user');  
        $pass = $this->input->post('pass');

        $this->db->where('account_id', $user);  
        $this->db->where('passcode', $pass);  
        $query = $this->db->get('Account'); 
  
        if ($query->num_rows() == 1)
        {  
             //declaring session  
            $this->load->library('session');
            $this->session->set_userdata(array('user'=>$user));  
            $this->load->view('welcome_page');          
        } 
        else
        {  
            $data['error'] = 'Your Account is Invalid';  
            $this->load->view('login_page');           
             
        }     

    }  

    public function logout()  
    {  
        //removing session
        $this->load->library('session'); 
        $this->session->unset_userdata('user');  
        redirect("Login");  
    }  

}
