var previousActiveId = "";
var activeId = "";

$(function() {
    $('.message').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
           sendTxtMessage($(this).val());
        }
    });

    $('.btnSend').click(function(){
        sendTxtMessage($('.message').val());
    });

    $('.selectUser').click(function(){
    	ChatSection(1);
        var receiver_id = $(this).attr('id');
        var card_info_id = $(this).attr('card_info');

        $('#ReciverId_txt').val(receiver_id);
        $('#ReciverName_txt').html($(this).attr('title'));
        $('#user_data').html($(this).attr('title') + "的资料");

        previousActiveId = activeId;
        activeId = receiver_id;

        GetCardInfo(card_info_id);

        GetChatHistory(receiver_id);
        SetChatlistActive();
    });

    $('.upload_attachmentfile').change(function(){
    	
    	DisplayMessage('<div class="spiner"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
    	
    	var file_data = $('.upload_attachmentfile').prop('files')[0];
    	var receiver_id = $('#ReciverId_txt').val();   
        var form_data = new FormData();
        form_data.append('attachmentfile', file_data);
    	form_data.append('type', 'Attachment');
    	form_data.append('receiver_id', receiver_id);
    	
    	$.ajax({
            url: 'chat-attachment/upload', 
            dataType: 'json',  
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                        
            type: 'post',
            success: function(response){
    			$('.upload_attachmentfile').val('');
    			GetChatHistory(receiver_id);
    		},
    		error: function (jqXHR, status, err) {
    				alert('Local error callback');
    		}
    	});
    });

});	///end of jquery

function SetChatlistActive() {
    if (previousActiveId != "") {
        $('#' + previousActiveId).removeClass("active");
    }
    $('#' + activeId).addClass("active");
}

function ViewAttachmentImage(image_url,imageTitle){
	$('#modelTitle').html(imageTitle); 
	$('#modalImgs').attr('src',image_url);
	$('#myModalImg').modal('show');
}

function ChatSection(status){
	//chatSection
	if(status==0){
		$('#chatSection :input').attr('disabled', true);
    } else {
        $('#chatSection :input').removeAttr('disabled');
    }   
}

ChatSection(0);

function ScrollDown(){
	var elmnt = document.getElementById("content");
    var h = elmnt.scrollHeight;
    $('#content').animate({scrollTop: h}, 1000);
}

window.onload = ScrollDown();

function DisplayMessage(message){
	var Sender_Name = $('#Sender_Name').val();
	
	var str = '<div class="direct-chat-msg right">';
	str+='<div class="direct-chat-info clearfix">';
	str+='<span class="direct-chat-name pull-right">'+Sender_Name ;
    str+='</span><span class="direct-chat-timestamp pull-left"></span></div>'; //23 Jan 2:05 pm
	str+='<div class="direct-chat-text">'+message;
	str+='</div></div>';
	$('#dumppy').append(str);
}

function sendTxtMessage(message){
	var messageTxt = message.trim();
	if(messageTxt!=''){
 		DisplayMessage(messageTxt);
		
		var receiver_id = $('#ReciverId_txt').val();
		$.ajax({
			dataType : "json",
			type : 'post',
			data : {messageTxt : messageTxt, receiver_id : receiver_id },
			url: 'send-message',
			success:function(data)
			{
				GetChatHistory(receiver_id)		 
			},
			error: function (jqXHR, status, err) {
				// alert('Local error callback');
			}
		});
		
		$('.message').val('');
		$('.message').focus();
	}else{
		$('.message').focus();
	}
}


var oldhistory = "";
function GetChatHistory(receiver_id){
	$.ajax({
    	//dataType : "json",
    	url: 'get-chat-history?receiver_id='+receiver_id,
        success: function(data)
        {
        	$('#dumppy').html(data);
            if (data != oldhistory) { ScrollDown(); }
            oldhistory = data;
        },
        error: function (jqXHR, status, err) {
        // alert('Local error callback');
        }
    });
}

function GetCardInfo(card_info_id){
    $.ajax({
        //dataType : "json",
        url: 'get-card-info?card_info_id='+card_info_id,
        success: function(data)
        {
            $('#card_info').html(data);
        },
        error: function (jqXHR, status, err) {
        // alert('Local error callback');
        }
    });
}

setInterval(function(){ 
	var receiver_id = $('#ReciverId_txt').val();
	if(receiver_id!=''){ GetChatHistory(receiver_id); }
}, 3000);
