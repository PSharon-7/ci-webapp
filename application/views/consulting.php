<div class="wrapper">
<div class="content-wrapper"> 

    <section class="content">
        <div class="row">
            <div class="col-md-8" id="chatSection">
                <div class="box box-warning direct-chat direct-chat-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" id="ReciverName_txt"><?=$chatTitle;?></h3>
                    </div>
                    <div class="box-body">
                        <div class="direct-chat-messages" id="content">
                            <div id="dumppy"></div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <div class="input-group">
                            <?php
                                $obj=&get_instance();
                                $obj->load->model('UserModel');
                                $user=$obj->UserModel->GetUserData();
                            ?>
                        
                            <input type="hidden" id="Sender_Name" value="<?=$user['name'];?>">
                            <input type="hidden" id="ReciverId_txt">
                            
                            <input type="text" name="message" class="form-control message">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-flat btnSend" id="nav_down">发送</button>
                                <div class="fileDiv btn btn-info btn-flat"> <i class="fa fa-upload"></i> 
                                <input type="file" name="file" class="upload_attachmentfile"/></div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?=$strTitle;?></h3>

                        <div class="box-tools pull-right">
                            <span class="label label-danger"><?=count($userlist);?> <?=$strsubTitle;?></span>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">
                  
                        <?php if(!empty($userlist)){
                            foreach($userlist as $v):
                            ?>
                            <li class="selectVendor" id="<?=$v['id'];?>" title="<?=$v['name'];?>">
                              <a class="users-list-name" href="#"><?=$v['name'];?></a>
                            </li>
                        <?php endforeach;?>
                    
                        <?php }else{?>
                        <li>
                           <a class="users-list-name" href="#">没有医生...</a>
                         </li>
                        <?php } ?>
                    
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>