<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PatientManager extends CI_Controller {

    public function index()
    {
        // Retrieve session data
        $session_set_value = $this->session->all_userdata();
        
        if (isset($session_set_value['User']) && $session_set_value['User']['role'] == 'Doctor' && $session_set_value['User']['logged_in'] == 'TRUE')
        {
            $this->load->library('table');
            $this->load->view('patient_manager');
        } 
        else
        {
            redirect(base_url().'login');
        }
    }

    public function checkin($id) 
    {
        $wxid = $name = $gender = $age = $smokehistory = $drinkhistory = $phonenumber = $checkindiagnosis = $checkintime = $history = "";
        $address = "湖南省邵阳市";
        $doctorcheck = 0;

        $query = $this->db->get_where('patientinfo', array('id' => $id)); 

        if ($query->num_rows() > 0) { 
            $data = $query->row();
            $wxid = $data->wxid;
            $id = $id;
            $name = $data->name;
            $gender = $data->gender;
            $age = $data->age;
            $smokehistory = $data->smokehistory;
            $drinkhistory = $data->drinkhistory;
            $phonenumber = $data->phonenumber;
            $address = $data->address;
            $checkindiagnosis = $data->checkindiagnosis;
            $checkintime = $data->checkintime;
            $history = $data->history;
            $doctorcheck = $data->doctorcheck;
        }

        $form_data['id'] = $id;
        $form_data['name'] = $name;
        $form_data['gender'] = $gender;
        $form_data['age'] = $age;
        $form_data['smokehistory'] = $smokehistory;
        $form_data['drinkhistory'] = $drinkhistory;
        $form_data['phonenumber'] = $phonenumber;
        $form_data['address'] = $address;
        $form_data['checkindiagnosis'] = $checkindiagnosis;
        $form_data['checkintime'] = $checkintime;
        $form_data['history'] = $history;
        $form_data['doctorcheck'] = $doctorcheck;

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
            $drinkhistory = $_POST['drinkhistory'];
            $phonenumber = $_POST['phonenumber'];
            $address = $_POST['address'];
            $checkindiagnosis = $_POST['checkindiagnosis'];
            $checkintime = $_POST['checkintime'];
            $history = $_POST['history'];

            $data = array(
                'wxid' => $wxid,
                'id' => $id,
                'name' => $name,
                'gender' => $gender,
                'age' => $age,
                'smokehistory' => $smokehistory,
                'drinkhistory' => $drinkhistory,
                'phonenumber' => $phonenumber,
                'address' => $address,
                'checkindiagnosis' => $checkindiagnosis,
                'checkintime' => $checkintime,
                'history' => $history,
                'doctorcheck' => 1
            );

            $this->db->replace('patientinfo', $data);
            redirect(base_url().'patientmanager/checkin/'.$id);
        }

        $this->load->view('patient_manager_checkin', $form_data);
    }

    public function checkin_uncheck($id)
    {
        $this->db->set('doctorcheck', 0, FALSE);
        $this->db->where('id', $id);
        $this->db->update('patientinfo');
       
        redirect(base_url().'patientmanager/checkin/'.$id);
    }

    public function checkout($id) 
    {
        $wxid = $name = $checkout_diagnosis = $pathological_result = $staging = $surgery_name = $surgery_time = $surgery_blood_volume = $stay_time = $ic_time = $dt_time = $stay_spend = $insurance_type = $disease_outcome = $living_state = $deadtime = $dna_test = "";
        $doctorcheck = 0;

        $query = $this->db->get_where('patientinfo_checkout', array('id' => $id)); 

        if ($query->num_rows() > 0) { 
            $data = $query->row();
            $wxid = $data->wxid;
            $id = $id;
            $name = $data->name;
            $checkout_diagnosis = $data->checkout_diagnosis;
            $pathological_result = $data->pathological_result;
            $staging = $data->staging;
            $surgery_name = $data->surgery_name;
            $surgery_time = $data->surgery_time;
            $surgery_blood_volume = $data->surgery_blood_volume;
            $stay_time = $data->stay_time;
            $ic_time = $data->ic_time;
            $dt_time = $data->dt_time;
            $stay_spend = $data->stay_spend;
            $insurance_type = $data->insurance_type;
            $disease_outcome = $data->disease_outcome;
            $living_state = $data->living_state;
            $dna_test = $data->dna_test;
            $doctorcheck = $data->doctorcheck;
        }

        if ($living_state != '或者') {
            $deadtime = $living_state;
            $living_state = '死亡';
        }

        $form_data['id'] = $id;
        $form_data['name'] = $name;
        $form_data['checkout_diagnosis'] = $checkout_diagnosis;
        $form_data['pathological_result'] = $pathological_result;
        $form_data['staging'] = $staging;
        $form_data['surgery_name'] = $surgery_name;
        $form_data['surgery_time'] = $surgery_time;
        $form_data['surgery_blood_volume'] = $surgery_blood_volume;
        $form_data['stay_time'] = $stay_time;
        $form_data['ic_time'] = $ic_time;
        $form_data['dt_time'] = $dt_time;
        $form_data['stay_spend'] = $stay_spend;
        $form_data['insurance_type'] = $insurance_type;
        $form_data['disease_outcome'] = $disease_outcome;

        $form_data['living_state'] = $living_state;
        $form_data['deadtime'] = $deadtime;

        $form_data['dna_test'] = $dna_test;
        $form_data['doctorcheck'] = $doctorcheck;

        $this->form_validation->set_rules('id', '身份证', 'required', array('required' => '身份证需要填写'));
        $this->form_validation->set_rules('name', '姓名', 'required', array('required' => '姓名需要填写'));

        //if form validation true
        if($this->form_validation->run() == true)
        {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $checkout_diagnosis = $_POST['checkout_diagnosis'];
            $pathological_result = $_POST['pathological_result'];
            $staging = $_POST['staging'];
            $surgery_name = $_POST['surgery_name'];
            $surgery_time = $_POST['surgery_time'];
            $surgery_blood_volume = $_POST['surgery_blood_volume'];
            $stay_time = $_POST['stay_time'];
            $ic_time = $_POST['ic_time'];
            $dt_time = $_POST['dt_time'];
            $stay_spend = $_POST['stay_spend'];
            $insurance_type = $_POST['insurance_type'];
            $disease_outcome = $_POST['disease_outcome'];

            $living_state = $_POST['living_state'];
            $deadtime = $_POST['deadtime'];

            $dna_test = $_POST['dna_test'];

            if ($living_state == '死亡') {
                $living_state = $deadtime;
            }

            $data = array(
                'wxid' => $wxid,
                'id' => $id,
                'name' => $name,
                'checkout_diagnosis' => $checkout_diagnosis,
                'pathological_result' => $pathological_result,
                'staging' => $staging,
                'surgery_name' => $surgery_name,
                'surgery_time' => $surgery_time,
                'surgery_blood_volume' => $surgery_blood_volume,
                'stay_time' => $stay_time,
                'ic_time' => $ic_time,
                'dt_time' => $dt_time,
                'stay_spend' => $stay_spend,
                'insurance_type' => $insurance_type,
                'disease_outcome' => $disease_outcome,
                'living_state' => $living_state,
                'dna_test' => $dna_test,
                'doctorcheck' => 1
            );

            $this->db->replace('patientinfo_checkout', $data);
            redirect(base_url().'patientmanager/checkout/'.$id);
        }

        $this->load->view('patient_manager_checkout', $form_data);
    }

    public function checkout_uncheck($id)
    {
        $this->db->set('doctorcheck', 0, FALSE);
        $this->db->where('id', $id);
        $this->db->update('patientinfo_checkout');
       
        redirect(base_url().'patientmanager/checkout/'.$id);
    }

    public function followup($id) 
    {
        $wxid = $name = "";

        $this->db->select('wxid, name');
        $query = $this->db->get_where('patientinfo_followup', array('id' => $id));

        if ($query->num_rows() > 0) { 
            $data = $query->row();
            $wxid = $data->wxid;
            $name = $data->name;
        }

        $form_data['id'] = $id;

        $this->load->library('table');

        $this->form_validation->set_rules('review_result', '复查结果', 'required', array('required' => '复查结果需要填写'));
        $this->form_validation->set_rules('review_condition', '复发情况', 'required', array('required' => '复发情况需要填写'));
        $this->form_validation->set_rules('review_date', '复查日期', 'required', array('required' => '复查日期需要填写'));

        //if form validation true
        if($this->form_validation->run() == true)
        {
            $review_result = $_POST['review_result'];
            $review_condition = $_POST['review_condition'];
            $review_date = $_POST['review_date'];
            $treatment = $_POST['treatment'];
            $medicine_name = $_POST['medicine_name'];
            $dose = $_POST['dose'];
            $treatment_course = $_POST['treatment_course'];
            $stay_spend = $_POST['stay_spend'];
            $disease_outcome = $_POST['disease_outcome'];
            $living_state = $_POST['living_state'];
            $deadtime = $_POST['deadtime'];

            $data = array(
                'wxid' => $wxid,
                'id' => $id,
                'name' => $name,
                'review_result' => $review_result,
                'review_condition' => $review_condition,
                'review_date' => $review_date,
                'treatment' => $treatment,
                'medicine_name' => $medicine_name,
                'dose' => $dose,
                'treatment_course' => $treatment_course,
                'stay_spend' => $stay_spend,
                'disease_outcome' => $disease_outcome,
                'living_state' => $living_state,
                'deadtime' => $deadtime
            );

            $this->db->insert('patientinfo_followup', $data);
            redirect(base_url().'patientmanager/followup/'.$id);
        }

        $this->load->view('patient_manager_followup', $form_data);
    }

    public function data() 
    {
        $this->load->library('table');
        $this->load->view('patient_manager_data');
    }

    public function timelinedata($id) 
    {
        $data['id'] = $id;
        $data['followup'] = array();
        $data['checkout'] = array();
        $data['checkin'] = array();

        $query = $this->db->select('review_result, review_condition, review_date')
                    ->from('patientinfo_followup')
                    ->where('id', $id)
                    ->order_by('review_date','DESC')
                    ->get();
        foreach ($query->result() as $row){
            array_push($data['followup'], array($row->review_date, $row->review_result, $row->review_condition));
        }

        $query = $this->db->select('checkout_diagnosis, surgery_name, surgery_time, stay_time')
                    ->from('patientinfo_checkout')
                    ->where('id', $id)
                    ->get();

        if (!empty($query)) {
            $row = $query->row();
            $data['checkout'] = array($row->surgery_name, $row->surgery_time, $row->stay_time, $row->checkout_diagnosis);
        }

        $query = $this->db->select('name, checkindiagnosis, checkintime, history')
                    ->from('patientinfo')
                    ->where('id', $id)
                    ->get();

        if (!empty($query)) {
            $row = $query->row();
            $data['checkin'] = array($row->checkintime, $row->checkindiagnosis, $row->history);
        }

        $data['name'] = $row->name;
        $this->load->view('patient_manager_timeline', $data);
    }

    public function phonenumber_check()
    {
        $phone = $_POST['phonenumber'];

        if(preg_match("/^[0-9]{3}[0-9]{4}[0-9]{4}$/", $phone) || empty($phone)) {
            return true;
        } 
        else {
            $this->form_validation->set_message('phonenumber_check', '该电话号码是无效号码');
            return false;
        }
    }

}
