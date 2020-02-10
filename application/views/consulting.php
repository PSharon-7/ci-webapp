<div class="wrapper">
<div class="content-wrapper"> 
  
  <!-- Content Header (Page header) -->
  <!-- Main content -->
  <section class="content">
     <div class="row">

            <div class="col-md-8" id="chatSection">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-primary">
                <div class="box-header with-border">
                  <h3 class="box-title" id="ReciverName_txt"><?=$chatTitle;?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" id="content">
                     <!-- /.direct-chat-msg -->

                     <div id="dumppy"></div>

                  </div>
                  <!--/.direct-chat-messages-->
 
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <!--<form action="#" method="post">-->
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
                  <!--</form>-->
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>




            <div class="col-md-4">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title"><?=$strTitle;?></h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"><?=count($doctorslist);?> <?=$strsubTitle;?></span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                  
                    <?php if(!empty($doctorslist)){
                        foreach($doctorslist as $v):
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
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
               <!-- <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>-->
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->            
          </div>
    
    <!-- /.row --> 
  </section>
  
  <!-- /.content --> 
  
</div>

<!-- /.content-wrapper --> 
  
  
    <!-- Control Sidebar -->
   <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
  
