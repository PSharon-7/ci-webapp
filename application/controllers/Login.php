<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
        // Retrieve session data
        $session_set_value = $this->session->all_userdata();

        // Check for remember_me data in retrieved session data
        if (isset($session_set_value['remember_me'])) 
        {
            $this->session->set_userdata(array('user'=>$session_set_value['remember_me']));  
            $this->load->view('welcome_page');
        } 
        else
        {
            $this->load->view('login_page');
        }
	}

    public function process()  
    {  
        $user = $this->input->post('user');  
        $pass = $this->input->post('pass');
        $remember = $this->input->post('remember_me');

        $this->db->where('account_id', $user);  
        $this->db->where('passcode', $pass);  
        $query = $this->db->get('account'); 
  
        if ($query->num_rows() == 1)
        {  
            // $remember = true;
            if($remember==="1")
            {
                echo "bad sesame";
                $this->session->set_userdata(array('remember_me'=>$user));  
            }
            else
            {
                $this->session->unset_userdata('remember_me'); 
            }

             //declaring session  
            $this->session->set_userdata(array('user'=>$remember));  
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
        $this->session->unset_userdata('user'); 
        $this->session->unset_userdata('remember_me');  

        redirect("Login");  
    }  

}
