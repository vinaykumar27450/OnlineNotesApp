$("#editusernameform").submit(function(event){
    $("#editusermessage").empty();
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    console.log(datatopost);
    $.ajax({
        url:"updateusername.php",
        type:"POST",
        data:datatopost,
        success:function(data){
            if(data){
        $("#editusermessage").html(data);

            }
        },
        error:function(){
        $("#editusermessage").html("<div class='alert alert-danger'>There was an Error in Ajax Call. Please Try Again later</div>");

        }
    });
});
$(".cancel").click(function(){
    location.reload();
});
$("#editemailform").submit(function(event){
    $("#editemailmessage").empty();
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    console.log(datatopost);
    $.ajax({
        url:"updateemail.php",
        type:"POST",
        data:datatopost,
        success:function(data){
            if(data){
        $("#editemailmessage").html(data);

            }
        },
        error:function(){
        $("#editemailmessage").html("<div class='alert alert-danger'>There was an Error in Ajax Call. Please Try Again later</div>");

        }
    });
});

$("#editpasswordform").submit(function(event){
    $("#editpasswordmessage").empty();
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    console.log(datatopost);
    $.ajax({
        url:"updatepassword.php",
        type:"POST",
        data:datatopost,
        success:function(data){
            if(data=="success"){
        $("#editpasswordmessage").html("<div class='alert alert-success'>Password Changed Successfully.</div>");
                setTimeout(function(){
                location.reload(true);
                }, 2000);

            }else{
                $("#editpasswordmessage").html(data);
            }       
        },
        error:function(){
        $("#editpasswordmessage").html("<div class='alert alert-danger'>There was an Error in Ajax Call. Please Try Again later</div>");

        }
    });
});