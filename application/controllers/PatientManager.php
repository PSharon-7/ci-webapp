<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PatientManager extends CI_Controller {

    public function index()
    {
        // Retrieve session data
        $session_set_value = $this->session->all_userdata();

        // Check for remember_me data in retrieved session data
        if (isset($session_set_value['remember_me'])) 
        {
            $this->session->set_userdata(array('user'=>$session_set_value['remember_me']));  
            $this->load->view('patient_manager');
        } 
        else
        {
            redirect(base_url().'login');
        }
    }
}
