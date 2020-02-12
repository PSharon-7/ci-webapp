<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulting extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['ChatModel','OuthModel','UserModel']);
        $this->load->helper('string');
    }

    public function index()
    {

        $data['strTitle']='';
        $data['strsubTitle']='';
        $list=[];

        if($this->session->userdata['User']['role'] == 'Patient'){
            $list = $this->UserModel->DoctorsList();
            $data['strTitle']='所有医生';
            $data['strsubTitle']='位医生';
            $data['chatTitle']='选择一位医生咨询';
        }else{
            $list = $this->UserModel->ClientsList();
            $data['strTitle']='所有患者';
            $data['strsubTitle']='名患者';
            $data['chatTitle']='选择一位患者沟通';
        }
        $userlist=[];
        foreach($list as $u){
            $userlist[]=
            [
                'id' => $this->OuthModel->Encryptor('encrypt', $u['id']),
                'name' => $u['name'],
            ];
        }
        $data['userlist']=$userlist;

        if($this->session->userdata['User']['role'] == 'Patient')
        {
            $this->load->view('consulting_patient', $data);
        }
        else {
            $this->load->view('consulting_doctor', $data);
        }
    } 

    public function send_text_message()
    {
        $post = $this->input->post();
        $messageTxt='NULL';
        $attachment_name='';
        $file_ext='';
        $mime_type='';
        
        if(isset($post['type'])=='Attachment'){ 
            $AttachmentData = $this->ChatAttachmentUpload();
            //print_r($AttachmentData);
            $attachment_name = $AttachmentData['file_name'];
            $file_ext = $AttachmentData['file_ext'];
            $mime_type = $AttachmentData['file_type'];
             
        } else{
            $messageTxt = reduce_multiples($post['messageTxt'],' ');
        }   
         
        $data=[
            'sender_id' => $this->session->userdata['User']['id'],
            'receiver_id' => $this->OuthModel->Encryptor('decrypt', $post['receiver_id']),
            'message' =>   $messageTxt,
            'attachment_name' => $attachment_name,
            'file_ext' => $file_ext,
            'mime_type' => $mime_type,
            'message_date_time' => date('Y-m-d H:i:s'), //23 Jan 2:05 pm
        ];

        $query = $this->ChatModel->SendTxtMessage($this->OuthModel->xss_clean($data)); 
        $response='';
        if($query == true){
            $response = ['status' => 1 ,'message' => '' ];
        }else{
            $response = ['status' => 0 ,'message' => 'sorry we re having some technical problems. please try again !'                       ];
        }
             
        echo json_encode($response);
    }

    public function ChatAttachmentUpload()
    {
        $file_data='';
        if(isset($_FILES['attachmentfile']['name']) && !empty($_FILES['attachmentfile']['name'])){  
            $config['upload_path']          = './uploads/attachment';
            $config['allowed_types']        = 'jpeg|jpg|png|txt|pdf|docx|xlsx|pptx|rtf';
            //$config['max_size']             = 500;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
            $this->load->library('upload', $config);
            if ( !$this->upload->do_upload('attachmentfile'))
            {
                echo json_encode(['status' => 0,
                'message' => '<span style="color:#900;">'.$this->upload->display_errors(). '<span>' ]); die;
            }
            else
            {
                $file_data = $this->upload->data();
                //$filePath = $file_data['file_name'];
                return $file_data;
            }
        } 
    }

    public function get_chat_history(){
        $receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );
        $Logged_sender_id = $this->session->userdata['User']['id'];
         
        $history = $this->ChatModel->GetReciverChatHistory($receiver_id);

        foreach($history as $chat):
            $message_id = $this->OuthModel->Encryptor('encrypt', $chat['id']);
            $sender_id = $chat['sender_id'];
            $userName = $this->UserModel->GetName($chat['sender_id']);
            
            $message = $chat['message'];
            $messagedatetime = date('d M H:i A',strtotime($chat['message_date_time']));
            
        ?>
            <?php
                $messageBody='';
                if($message=='NULL'){ //fetach media objects like images,pdf,documents etc
                    $classBtn = 'right';
                    if($Logged_sender_id==$sender_id){$classBtn = 'left';}
                    
                    $attachment_name = $chat['attachment_name'];
                    $file_ext = $chat['file_ext'];
                    $mime_type = explode('/',$chat['mime_type']);
                    
                    $document_url = base_url('uploads/attachment/'.$attachment_name);
                    
                  if($mime_type[0]=='image'){
                    $messageBody.='<img src="'.$document_url.'" onClick="ViewAttachmentImage('."'".$document_url."'".','."'".$attachment_name."'".');" class="attachmentImgCls">';  
                  }else{
                    $messageBody='';
                     $messageBody.='<div class="attachment">';
                          $messageBody.='<h4>Attachments:</h4>';
                           $messageBody.='<p class="filename">';
                            $messageBody.= $attachment_name;
                          $messageBody.='</p>';
        
                          $messageBody.='<div class="pull-'.$classBtn.'">';
                            $messageBody.='<a download href="'.$document_url.'"><button type="button" id="'.$message_id.'" class="btn btn-primary btn-sm btn-flat btnFileOpen">Open</button></a>';
                          $messageBody.='</div>';
                        $messageBody.='</div>';
                    }
                        
                                            
                }else{
                    $messageBody = $message;
                }
            ?>
            
            
        
             <?php if($Logged_sender_id!=$sender_id){?>     
                  <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?=$userName;?></span>
                        <span class="direct-chat-timestamp pull-right"><?=$messagedatetime;?></span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <div class="direct-chat-text pull-left mx-1">
                         <?=$messageBody;?>
                      </div>
                      <!-- /.direct-chat-text -->
                      
                    </div>
                    <!-- /.direct-chat-msg -->
            <?php }else{?>
                    <!-- Message to the right -->
                    <div class="direct-chat-msg right text-left">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right"><?=$userName;?></span>
                        <span class="direct-chat-timestamp pull-left"><?=$messagedatetime;?></span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <div class="direct-chat-text pull-right text-left mx-1">
                        <?=$messageBody;?>
                       </div>
                       <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
             <?php }?>
        
        <?php
        endforeach; 
    }

}
