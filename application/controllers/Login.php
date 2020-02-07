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
            redirect(base_url().'pnscreening');  
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
            if($remember==="1")
            {
                $this->session->set_userdata(array('remember_me'=>$user));  
            }
            else
            {
                $this->session->unset_userdata('remember_me'); 
            }

            $this->session->set_userdata(array('user'=>$user));

            redirect(base_url().'pnscreening');  
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

        redirect(base_url().'login');  
    }  

}
