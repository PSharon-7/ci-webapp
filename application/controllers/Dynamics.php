<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dynamics extends CI_Controller {

    public function index()
    {
        $this->load->view('dynamics');
    }

    public function articles($id)
    {
    	$this->load->view('articles/'.$id);
    }
}
