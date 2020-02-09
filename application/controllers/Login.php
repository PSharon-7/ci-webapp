<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
        $session_set_value = $this->session->all_userdata();

        if (isset($session_set_value['User']) && $session_set_value['User']['role'] == 'Doctor' && $session_set_value['User']['logged_in'] == 'TRUE')
        {
            redirect(base_url().'pnscreening_doctor');
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

        $query = $this->db->get_where('account', array('account_id' => $user, 'passcode' => $pass)); 

        if ($query->num_rows() == 1)
        {  

            $data = $query->row();
            $userdata = [
                'id' => $user,
                'name' => $data->name,
                'role' => 'Doctor',
                'logged_in' => 'TRUE',
                'remember_me' => 'FALSE'
            ];

            if($remember==="1")
            {
                $userdata->remember_me = 'TRUE';
                $this->session->set_userdata('User', $userdata);  
            }

            $this->session->set_userdata('User', $userdata); 
            redirect(base_url().'pnscreening');  
        } 
        else
        {  
            $this->load->view('login_page');           
        }     

    }  

    public function logout()  
    {  
        //removing session
        $this->session->unset_userdata('User'); 

        redirect(base_url().'login');  
    }  

}
