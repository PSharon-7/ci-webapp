<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PNScreeningDoc extends CI_Controller {

    public function index()
    {
        // Retrieve session data
        $session_set_value = $this->session->all_userdata();
        
        if (isset($session_set_value['User']) && $session_set_value['User']['role'] == 'Doctor' && $session_set_value['User']['logged_in'] == 'TRUE')
        {
            $this->load->library('table');
            $this->load->view('pnscreening_doctor');
        } 
        else
        {
            redirect(base_url().'login');
        }
    }

    public function comment($id) 
    {
        $wxid = $name = $gender = $age = $smokehistory = $smoketime = $phonenumber = $resulttime = $pnposition = $pncontent = $pnsize = $doctor = $checktime = $checkhospital = $patientsuggestion = "";
        $address = "湖南省邵阳市";
        $pnposition_lung = $pnposition_lobe = $pnposition_segment = "";

        $query = $this->db->get_where('pnctscreen', array('id' => $id)); 

        if ($query->num_rows() > 0) { 
            $data = $query->row();
            $wxid = $data->wxid;
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
            $patientsuggestion = $data->patientsuggestion;

            list($pnposition_lung, $pnposition_lobe, $pnposition_segment) = explode(" ", $pnposition);
        }

        if ($smokehistory != '无') {
            $smoketime = $smokehistory;
            $smokehistory = '有';
        }

        $form_data['id'] = $id;
        $form_data['name'] = $name;
        $form_data['gender'] = $gender;
        $form_data['age'] = $age;
        $form_data['smokehistory'] = $smokehistory;
        $form_data['smoketime'] = $smoketime;
        $form_data['address'] = $address;
        $form_data['phonenumber'] = $phonenumber;
        $form_data['resulttime'] = $resulttime;

        $form_data['pnposition_lung'] = $pnposition_lung;
        $form_data['pnposition_lobe'] = $pnposition_lobe;
        $form_data['pnposition_segment'] = $pnposition_segment;

        $form_data['pncontent'] = $pncontent;
        $form_data['pnsize'] = $pnsize;
        $form_data['doctor'] = $doctor;
        $form_data['checktime'] = $checktime;
        $form_data['checkhospital'] = $checkhospital;
        $form_data['patientsuggestion'] = $patientsuggestion;

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
            $smoketime = $_POST['smoketime'];
            $address = $_POST['address'];
            $phonenumber = $_POST['phonenumber'];
            $resulttime = $_POST['resulttime'];

            $pnposition_lung = $_POST['pnposition_lung'];
            $pnposition_lobe = $_POST['pnposition_lobe'];
            $pnposition_segment = $_POST['pnposition_segment'];
            $pnposition = $pnposition_lung." ".$pnposition_lobe." ".$pnposition_segment;
            
            $pncontent = $_POST['pncontent'];
            $pnsize = $_POST['pnsize'];
            $doctor = $_POST['doctor'];
            $checktime = $_POST['checktime'];
            $checkhospital = $_POST['checkhospital'];
            $patientsuggestion = $_POST['patientsuggestion'];

            if ($smokehistory == '有') {
                $smokehistory = $smoketime;
            }

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
                'patientsuggestion' => $patientsuggestion,
                'doctor_checked_already' => 1
            );

            $this->db->replace('pnctscreen', $data);

            redirect(base_url().'pnscreening_doctor');
        }
        
        $this->load->view('pnscreening_form_cmt', $form_data);
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
