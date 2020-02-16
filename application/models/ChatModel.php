 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class ChatModel extends CI_Model {

 	private $Table = 'chat';
 	private $Table_Notification = 'chat_notification';
	
	public function SendTxtMessage($data){
  		$res = $this->db->insert($this->Table, $data); 
 		if($res == 1)
 			return true;
 		else
 			return false;
	}

	public function GetReciverChatHistory($receiver_id) {
		$sender_id = $this->session->userdata['User']['id'];

		$condition= "`sender_id`= '$sender_id' AND `receiver_id` = '$receiver_id' OR `sender_id`= '$receiver_id' AND `receiver_id` = '$sender_id'";
		
		$this->db->select('*');
		$this->db->from($this->Table);
		$this->db->where($condition);
   		$query = $this->db->get();

 		if ($query) {
			return $query->result_array();
		} else {
	       	return false;
		}
	}

	// 设置数据库消息未读
	public function UnreadChatMessage($receiver_id) {
		$sender_id = $this->session->userdata['User']['id'];

        $data = [
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'message_unread' => 1,
            'timestamp' => date("Y-m-d H:i:s")
        ];
        $data_filter = array(
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
        );

		$query = $this->db->get_where($this->Table_Notification, $data_filter); 
        $res = "";

        if ($query->num_rows() > 0) {
        	$res = $this->db->update($this->Table_Notification, $data, $data_filter);
        } else {
        	$res = $this->db->insert($this->Table_Notification, $data);
        }
	}

	// 设置数据库消息已读
	public function ReadChatMessage($receiver_id) {
		$sender_id = $this->session->userdata['User']['id'];

        $data = [
            'sender_id' => $receiver_id,
            'receiver_id' => $sender_id,
            'message_unread' => 0,
            'timestamp' => date("Y-m-d H:i:s")
        ];
        $data_filter = array(
            'sender_id' => $receiver_id,
            'receiver_id' => $sender_id,
        );

		$query = $this->db->get_where($this->Table_Notification, $data_filter); 
        $res = "";

        if ($query->num_rows() > 0) {
        	$res = $this->db->update($this->Table_Notification, $data, $data_filter);
        }
	}

 	public function GetReciverMessageList($receiver_id){
  		
		$this->db->select('*');
		$this->db->from($this->Table);
		$this->db->where('receiver_id',$receiver_id);
   		$query = $this->db->get();
 		if ($query) {
			 return $query->result_array();
		 } else {
			 return false;
		 }
		 
	}	
	
	public function TrashById($receiver_id)
	{  
 		$res = $this->db->delete($this->Table, ['receiver_id' => $receiver_id] ); 
		if($res == 1)
			return true;
		else
			return false;
 	}	
 }