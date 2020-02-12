<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewTech extends CI_Controller {

    public function index()
    {
        $this->load->view('introduction/newtech');
    }

    public function articles($id)
    {
    	$this->load->view('introduction/newtech/'.$id);
    }

}
