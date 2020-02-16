<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulting extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['ChatModel','OuthModel','UserModel','TimelineModel']);
        $this->load->helper('string');
    }

    public function index()
    {
        $data['strTitle']='';
        $data['strsubTitle']='';

        if($this->session->userdata['User']['role'] == 'Patient'){
            $data['strTitle']='医生资料';
            $data['chatTitle']='选择一位医生咨询';
        }else{
            $data['strTitle']='患者资料';
            $data['chatTitle']='选择一位患者沟通';
        }

        if($this->session->userdata['User']['role'] == 'Patient'){
            $this->load->view('consulting_patient', $data);
        }
        else{
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

        $sender_id = $this->session->userdata['User']['id'];
        $receiver_id = $this->OuthModel->Encryptor('decrypt', $post['receiver_id']);
         
        $data=[
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'message' =>   $messageTxt,
            'attachment_name' => $attachment_name,
            'file_ext' => $file_ext,
            'mime_type' => $mime_type,
            'message_date_time' => date('Y-m-d H:i:s'), //23 Jan 2:05 pm
        ];

        $query = $this->ChatModel->SendTxtMessage($this->OuthModel->xss_clean($data)); 
        $this->ChatModel->UnreadChatMessage($receiver_id); 

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

    public function get_chat_history()
    {
        $receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );
        $Logged_sender_id = $this->session->userdata['User']['id'];
         
        $this->ChatModel->ReadChatMessage($receiver_id);
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

    public function get_card_info()
    {
        $card_info_id = $this->input->get('card_info_id');

        if($this->session->userdata['User']['role'] == 'Patient')
        {
            //load doctor info card
             $query = $this->db->select('title')
                        ->from('doctor_account')
                        ->where('account_id', $card_info_id)
                        ->get();

            if (!empty($query)) {
                $row = $query->row();
                $data = $row->title;
            }

            ?>
                <p><?=$data;?></p>
            <?php
        }
        else {
            //load patient timeline
            $data = $this->TimelineModel->get_timelinedata($card_info_id);
            $followup = $data["followup"];
            $checkout = $data["checkout"];
            $checkin = $data["checkin"];

            ?>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <ul class="timeline" id="timeline">
                            <?php 
                            if (!empty($followup)) { 
                                foreach ($followup as $v) {
                                    echo 
                                    '<li>
                                        <h6 class="font-italic"><a href="'.base_url().'patientmanager/followup/'.$card_info_id.'">随访 - '.$v[0].'</a></h6>
                                        <p class="my-0 mt-2">复查时间: '.$v[1].'</p><p class="my-0">复查结果: '.$v[2].'</p><p class="my-0">治疗方式: '.$v[3].'</p><p class="my-0">药物名称: '.$v[4].'</p><p class="my-0">剂量: '.$v[5].'</p><p class="my-0">疗程: '.$v[6].'</p>
                                    </li>';
                                }
                            }
                            if (!empty($checkout)) { 
                                echo '
                                <li>
                                    <h6 class="font-italic"><a href="'.base_url().'patientmanager/checkout/'.$card_info_id.'">出院 - '.$checkout[0].'</a></h6>
                                    <p class="my-0 mt-2">出院时间: '.$checkout[9].'</p><p class="my-0">出院诊断: '.$checkout[4].'</p><p class="my-0">手术名称: '.$checkout[1].'</p><p class="my-0">手术时间: '.$checkout[2].'</p><p class="my-0">住院天数: '.$checkout[3].'</p><p class="my-0">病理结果: '.$checkout[5].'</p><p class="my-0">分期: '.$checkout[6].'</p><p class="my-0">引流管留置时间: '.$checkout[7].'</p><p class="my-0">基因检测: '.$checkout[8].'</p>
                                </li>';
                            }
                            if (!empty($checkin)) { 
                                echo 
                                    '<li>
                                        <h6 class="font-italic"><a href="'.base_url().'patientmanager/checkin/'.$card_info_id.'">入院</a></h6>
                                        <p class="my-0 mt-2">入院时间: '.$checkin[0].'</p><p class="my-0">入院诊断: '.$checkin[1].'</p><p class="my-0">既往史: '.$checkin[2].'</p><p class="my-0">吸烟史: '.$checkin[3].'</p>
                                    </li>';
                            } ?>
                        </ul>
                    </div>
                </div>


            <?php
        }        
    }

    public function get_message_notification() {
        $list=[];

        if($this->session->userdata['User']['role'] == 'Patient'){
            $list = $this->UserModel->DoctorsList();
        }else{
            $list = $this->UserModel->PatientsList();
        }
        $userlist=[];
        foreach($list as $u){
            $userlist[]=
            [
                'id' => $this->OuthModel->Encryptor('encrypt', $u['id']),
                'name' => $u['name'],
                'card_info' => $u['card_info'],
                'message_unread' => $u['message_unread'],
            ];
        }
        $data['userlist']=$userlist;

        ?>

        <?php if(!empty($userlist)){
            foreach($userlist as $v): ?>

            <li class="selectUser" id="<?=$v['id'];?>" title="<?=$v['name'];?>" card_info="<?=$v['card_info'];?>">
                <a class="users-list-name" href="#"><?=$v['name'];?> 
                    <?php if ($v['message_unread'] == 1) { echo '<i class="fa fa-circle notification_icon pl-2"></i>'; }?>
                </a>
            </li>

            <?php endforeach;} ?>

        <?php
    }
}
