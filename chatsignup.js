
// registration form validation 

$(document).on('submit' , '#ajax' , function(e){
    e.preventDefault();
    $.ajax({
        url: $(this).prop('action'),
        method : $(this).prop('method'),
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'JSON',
        data: new FormData(this),
        success:function(result){
            if(result.first == "error") {
                toastr.error(result.msg , "Error");
            }else{
                if(result.last == "error"){
                    toastr.error(result.msg , "Error");
                }else{
                  if(result.email=="error"){
                    toastr.error(result.msg , "Error");
                  }
                  else{
                    if(result.pwd=="error"){
                        toastr.error(result.msg , "Error");
                    }
                    else{
                        if(result.pass_match=="error"){
                        toastr.error(result.msg , "Error");
                    }
                    else{
                        if(result.cpwd=="error"){
                        toastr.error(result.msg , "Error");
                    }
                    else{
                        if(result.con_pwd=="error"){
                        toastr.error(result.msg , "Error");
                    }
                    else{
                        if(result.phone=="error"){
                        toastr.error(result.msg , "Error");
                    }
                    else{
                        if(result.phone_match=="error"){
                        toastr.error(result.msg , "Error");
                    }
                    else{
                        if(result.address=="error"){
                        toastr.error(result.msg , "Error");
                    }
                    else{
                        if(result.check=="error"){
                        toastr.error(result.msg , "Error");
                    }
                    else{
                        if(result.match=="error"){
                            toastr.error(result.msg , "Error");
                    }
                   else if (result.insert == "success" ) {
                        window.location='my_login.php';
                    }
                    }
                    }
                    }
                    }
                    }
                    }
                    }
                    }
                   
                  }
                }
            }
            
            
        }
    });
});

// login form validation 

$(document).on('submit' , '#chatlog' , function(e){
    e.preventDefault();
    $.ajax({
        url: $(this).prop('action'),
        method : $(this).prop('method'),
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'JSON',
        data: new FormData(this),
        success:function(result2){
            // console.log(hello);
            if(result2.email == "error"){
                toastr.error(result2.msg , "Error");
            }else if(result2.pwd == "error"){
                    toastr.error(result2.msg , "Error");
            }else if(result2.pass_match == "error"){
                    toastr.error(result2.msg , "Error");
            }else if(result2.message == "error"){
                    toastr.error(result2.msg , "Error");
            }else if(result2.check == "success"){
                window.location= result2.location;
            }else if(result2.check1 == "success"){
                window.location= result2.location;
            }
        }
    });
});

// group creation validation
$(document).on('submit' , '#group_create' , function(e){
    e.preventDefault();
    $.ajax({
        url: $(this).prop('action'),
        method : $(this).prop('method'),
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'JSON',
        data: new FormData(this),
        success:function(result2){
            if(result2.name == "error"){
                toastr.error(result2.msg , "Error");
            }else if(result2.user_id == "error"){
                    toastr.error(result2.msg , "Error");
            }else if(result2.check == "error"){
                toastr.error(result2.msg , "Error");
            }
            else if(result2.sql == "success"){
                window.location='users.php';            }
        }
    });
});


// chatting javascript
var id = '';
var is_group = false;
$(function(){
    $(document).on('click' , '.chat_user' , function(){
        is_group = false;
        var name = $(this).data('name');
        $('.heading-name-meta').html(name);
        $('.chat_list').removeClass('chat_active');
        $(this).addClass('chat_active');
        id = $(this).data('id');
        $("#rec_id").val(id);
        var url = "getmsgs.php?uid="+id; 
        $.get(url , function(res){
            $('.msg_history').html(res);
            $('.user_log').html(name);
        })
    })
})
setInterval(function(){
    if(is_group){
        var url = "get_group_msgs.php?uid="+id; 
    }else{
        var url = "getmsgs.php?uid="+id; 
    }
    $.get(url , function(res){
        $('.msg_history').html(res);
    })
} , 1000);

// insert user chat
$(document).on('click' , '.msg_send_btn' , function(e){
    e.preventDefault();
    var msg = $("#message").val();
    var id = $("#rec_id").val();
    var url = "insert_chat.php?msg="+ msg +"&receiver_id=" + id; 
        $.get(url , function(){
            var url = "getmsgs.php?uid="+id; 
            $.get(url , function(res){
                $('.msg_history').html(res);
            })
            });    
    });


//group javascript
$(function(){
    $(document).on('click' , '.group_list' , function(){
        is_group = true;
        var name = $(this).data('name');
        $('.heading-name-meta').html(name);
        $('.chat_list').removeClass('chat_active');
        $(this).addClass('chat_active');
        id = $(this).data('id');
        $("#rec_id").val(id);
        var url = "get_group_msgs.php?uid="+id; 
        $.get(url , function(res){
            $('.msg_history').html(res);
            $('.user_log').html(name);
        })
    })
})

//insert group chat 
$(document).on('click' , '.msg_group_btn' , function(e){
    e.preventDefault();
    var msg = $("#message").val();
    var id = $("#rec_id").val();
    var url = "insert_groupchat.php?msg="+ msg +"&group_id=" + id; 
        $.get(url , function(){
            var url = "get_group_msgs.php?uid="+id; 
            $.get(url , function(res){
                $('.msg_history').html(res);
            })
            });    
    });

