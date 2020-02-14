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
                        <h3 class="box-title" id="user_data"><?=$strTitle;?></h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div id="card_info" class="box-body p-3 users-list clearfix">

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>