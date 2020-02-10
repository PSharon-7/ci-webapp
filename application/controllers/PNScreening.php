<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PNScreening extends CI_Controller {

    public function index()
    {

        // TODO: add wxid
        $wxid = "mock1";

        $id = $name = $gender = $age = $smokehistory = $address = $phonenumber = $resulttime = $pnposition = $pncontent = $pnsize = $doctor = $checktime = $checkhospital = "";
        $doctor_checked_already = -1;

        $query = $this->db->get_where('pnctscreen', array('wxid' => $wxid)); 

        if ($query->num_rows() > 0) {
            $data = $query->row();
            $id = $data->id;
            $name = $data->name;
            $gender = $data->gender;
            $age = $data->age;
            $smokehistory = $data->smokehistory;
            $address = $data->address;
            $phonenumber = $data->phonenumber;
            $resulttime = $data->resulttime;
            $pnposition = $data->pnposition;
            $pncontent = $data->pncontent;
            $pnsize = $data->pnsize;
            $doctor = $data->doctor;
            $checktime = $data->checktime;
            $checkhospital = $data->checkhospital;
            $doctor_checked_already = $data->doctor_checked_already;
        }

        $form_data['id'] = $id;
        $form_data['name'] = $name;
        $form_data['gender'] = $gender;
        $form_data['age'] = $age;
        $form_data['smokehistory'] = $smokehistory;
        $form_data['address'] = $address;
        $form_data['phonenumber'] = $phonenumber;
        $form_data['resulttime'] = $resulttime;
        $form_data['pnposition'] = $pnposition;
        $form_data['pncontent'] = $pncontent;
        $form_data['pnsize'] = $pnsize;
        $form_data['doctor'] = $doctor;
        $form_data['checktime'] = $checktime;
        $form_data['checkhospital'] = $checkhospital;
        $form_data['doctor_checked_already'] = $doctor_checked_already;

        $this->form_validation->set_rules(
            'id', '身份证号',
            'callback_id_check',
            array(
                'callback_id_check' =>  '该身份证已注册'
            )
        );

        $this->form_validation->set_rules(
            'phonenumber', '电话号码',
            'callback_phonenumber_check',
            array(
                'callback_phonenumber_check' =>  '该电话号码是无效号码'
            )
        );

        //if form validation true
        if($this->form_validation->run() == true)
        {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $age = $_POST['age'];
            $smokehistory = $_POST['smokehistory'];
            $address = $_POST['address'];
            $phonenumber = $_POST['phonenumber'];
            $resulttime = $_POST['resulttime'];
            $pnposition = $_POST['pnposition'];
            $pncontent = $_POST['pncontent'];
            $pnsize = $_POST['pnsize'];
            $doctor = $_POST['doctor'];
            $checktime = $_POST['checktime'];
            $checkhospital = $_POST['checkhospital'];

            $data = array(
                'wxid' => $wxid,
                'id' => $id,
                'name' => $name,
                'gender' => $gender,
                'age' => $age,
                'smokehistory' => $smokehistory,
                'address' => $address,
                'phonenumber' => $phonenumber,
                'resulttime' => $resulttime,
                'pnposition' => $pnposition,
                'pncontent' => $pncontent,
                'pnsize' => $pnsize,
                'doctor' => $doctor,
                'checktime' => $checktime,
                'checkhospital' => $checkhospital,
                'doctor_checked_already' => 0
            );

            $this->db->replace('pnctscreen', $data);

            redirect("/", "refresh");
        }
        
        $this->load->view('pnscreening_form', $form_data);
    }

    public function id_check()
    {
        $wxid = "mock1";

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

    public function phonenumber_check()
    {
        $phone = $_POST['phonenumber'];

        if(preg_match("/^[0-9]{3}[0-9]{4}[0-9]{4}$/", $phone)) {
            return true;
        } 
        else {
            $this->form_validation->set_message('phonenumber_check', '该电话号码是无效号码');
            return false;
        }
    }
}
