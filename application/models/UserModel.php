<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    private $Patient = 'patientinfo';
    private $Doctor = 'doctor_account';
    private $ChatNotification = 'chat_notification';

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
        $myid = $this->session->userdata['User']['id'];
        
        $this->db->distinct();
        $this->db->select($this->Doctor.'.account_id as id, '.$this->Doctor.'.name, '.$this->Doctor.'.account_id as card_info, '.$this->ChatNotification.'.message_unread');
        $this->db->from($this->Doctor);
        $this->db->join($this->ChatNotification, $this->ChatNotification.'.sender_id = '.$this->Doctor.'.account_id', 'left');
        $this->db->order_by($this->ChatNotification.'.timestamp', "desc");
        $query = $this->db->get();

        $r=$query->result_array();

        return $r;
    }  

    public function PatientsList() 
    {
        $myid = $this->session->userdata['User']['id'];

        $this->db->select($this->Patient.'.wxid as id, '.$this->Patient.'.name, '.$this->Patient.'.id as card_info, '.$this->ChatNotification.'.message_unread');
        $this->db->from($this->Patient);
        $this->db->join($this->ChatNotification, $this->ChatNotification.'.sender_id = '.$this->Patient.'.wxid', 'inner');
        $this->db->where($this->ChatNotification.'.receiver_id', $myid);
        $this->db->order_by($this->ChatNotification.'.timestamp', "desc");
        $query = $this->db->get();

        $r=$query->result_array();

        return $r;
    }   

 }

