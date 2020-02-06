<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulting extends CI_Controller {

    public function index()
    {
        $this->load->view('consulting');
    }
}
