<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PatientManager extends CI_Controller {

    public function index()
    {
        // Retrieve session data
        $session_set_value = $this->session->all_userdata();
        
        if (isset($session_set_value['User']) && $session_set_value['User']['role'] == 'Doctor' && $session_set_value['User']['logged_in'] == 'TRUE')
        {
            $this->load->view('patient_manager');
        } 
        else
        {
            redirect(base_url().'login');
        }
    }
}
