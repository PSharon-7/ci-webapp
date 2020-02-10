<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$wxid = 'mock1';
        $name = '张三';

		$userdata = [
            'id' => $wxid,
            'name' => $data->name,
            'role' => 'Patient',
            'logged_in' => 'TRUE'
        ];

        $this->session->set_userdata('User', $userdata); 

        redirect(base_url().'pnscreening');
	}
}
