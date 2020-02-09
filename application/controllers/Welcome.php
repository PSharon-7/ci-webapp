<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$wxid = 'mock1';

		$userdata = [
            'id' => $wxid,
            'name' => $data->name,
            'role' => 'Patient',
            'logged_in' => 'TRUE',
            'remember_me' => 'TRUE'
        ];

        $this->session->set_userdata('User', $userdata); 


        redirect(base_url().'pnscreening');
	}
}
