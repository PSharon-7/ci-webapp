<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/login
	 *	- or -
	 * 		http://example.com/index.php/login/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
        } else {  
          
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
