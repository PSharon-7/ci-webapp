<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserInfo extends CI_Controller {

    public function index()
    {
        // TODO: add wxid
        $wxid = "mock1";

        $id = $name = "";
        $doctorcheck = -1;

        $query = $this->db->get_where('patientinfo', array('wxid' => $wxid)); 

        if ($query->num_rows() > 0) {
            $data = $query->row();
            $id = $data->id;
            $name = $data->name;
            $doctorcheck = $data->doctorcheck;
        }

        $form_data['id'] = $id;
        $form_data['name'] = $name;
        $form_data['doctorcheck'] = $doctorcheck;

        $this->form_validation->set_rules(
            'id', '身份证号',
            'callback_id_check',
            array(
                'callback_id_check' =>  '该身份证已注册'
            )
        );

        if($this->form_validation->run() == true) 
        {
            $id = $_POST['id'];
            $name = $_POST['name'];

            $data = array(
                'wxid' => $wxid,
                'id' => $id,
                'name' => $name,
                'doctorcheck' => 0
            );

            $this->db->replace('patientinfo', $data);

            redirect("/info", "refresh"); 
        }   

        $this->load->view('user_information', $form_data);
    }

        public function id_check()
    {
        $wxid = "mock0";

        $id = $_POST['id'];
        $query_id = $this->db->get_where('pnctscreen', array('id' => $id)); 
        $query = $this->db->get_where('pnctscreen', array('wxid' => $wxid, 'id' => $id)); 

        if ($query->num_rows() == 0 && $query_id->num_rows() > 0) {
            $this->form_validation->set_message('id_check', '该身份证已被注册');
            return false;
        }
        else {
            return true;
        }
    }
}

