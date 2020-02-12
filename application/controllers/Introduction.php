<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Introduction extends CI_Controller {

    public function index()
    {
        $this->load->view('introduction/introduction');
    }

    public function department()
    {
        $this->load->view('introduction/department_intro');
    }

}
