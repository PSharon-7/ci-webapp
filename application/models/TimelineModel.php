<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TimelineModel extends CI_Model {

    public function get_timelinedata($id) 
    {
        $data['id'] = $id;
        $data['followup'] = array();
        $data['checkout'] = array();
        $data['checkin'] = array();

        $query = $this->db->select('review_result, review_condition, review_date, disease_outcome, treatment, medicine_name, dose, treatment_course')
                    ->from('patientinfo_followup')
                    ->where('id', $id)
                    ->order_by('review_date','DESC')
                    ->get();
        foreach ($query->result() as $row){
            array_push($data['followup'], array($row->disease_outcome, $row->review_date, $row->review_result, $row->review_condition, $row->treatment, $row->medicine_name, $row->dose, $row->treatment_course));
        }

        $query = $this->db->select('checkout_diagnosis, disease_outcome, surgery_name, surgery_time, stay_time, pathological_result, staging, dt_time, dna_test, checkouttime')
                    ->from('patientinfo_checkout')
                    ->where('id', $id)
                    ->get();

        if (!empty($query)) {
            $row = $query->row();
            $data['checkout'] = array($row->disease_outcome, $row->surgery_name,  $row->surgery_time, $row->stay_time, $row->checkout_diagnosis, $row->pathological_result, $row->staging, $row->dt_time, $row->dna_test, $row->checkouttime);
        }

        $query = $this->db->select('name, checkindiagnosis, checkintime, history, smokehistory')
                    ->from('patientinfo')
                    ->where('id', $id)
                    ->get();

        if (!empty($query)) {
            $row = $query->row();
            $data['checkin'] = array($row->checkintime, $row->checkindiagnosis, $row->history, $row->smokehistory);
        }

        $data['name'] = $row->name;
        return $data;
    }


 }

