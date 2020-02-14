<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    private $Patient = 'patientinfo';
    private $Doctor = 'doctor_account';

    public function GetUserData()
    {
        $this->db->select('account_id as id, name');
        $this->db->from($this->Doctor);
        $this->db->where("account_id", $this->session->userdata['User']['id']);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        
        $this->db->select('wxid as id, name');
        $this->db->from($this->Patient);
        $this->db->where("wxid", $this->session->userdata['User']['id']);
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }   

    public function GetName($id)
    {  
        $this->db->select('account_id as id, name');
        $this->db->from($this->Doctor);
        $this->db->where("account_id", $id);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $res = $query->row_array();
            return $res['name'];
        }
        
        $this->db->select('wxid as id, name');
        $this->db->from($this->Patient);
        $this->db->where("wxid", $id);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $res = $query->row_array();
            return $res['name'];
        } else {
            return false;
        }
    }

    public function DoctorsList() 
    {  
        $this->db->select('account_id as id, name, account_id as card_info');
        $this->db->from($this->Doctor);

        $query = $this->db->get();

        $r=$query->result_array();

        return $r;
    }

    public function ClientsList() 
    {  
        $this->db->select('wxid as id, name, id as card_info');
        $this->db->from($this->Patient);

        $query = $this->db->get();

        $r=$query->result_array();

        return $r;
    }   

 }

