<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PNScreeningDoc extends CI_Controller {

    public function index()
    {

        // Retrieve session data
        $session_set_value = $this->session->all_userdata();

        // Check for remember_me data in retrieved session data
        if (isset($session_set_value['user'])) 
        {
            $this->load->view('pnscreening_doctor');
        } 
        else
        {
            redirect(base_url().'login');
        }

    }
}
