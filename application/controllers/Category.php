<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function index($id)
    {
        $this->load->view('introduction/category/'.$id);
    }

    public function articles($id, $index)
    {
    	$this->load->view('introduction/category/'.$id.'/'.$index);
    }

}
