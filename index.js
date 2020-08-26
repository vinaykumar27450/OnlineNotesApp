$("#signupform").submit(function(event){
    $("#signupmessage").empty();
    event.preventDefault();
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    $.ajax({
        url:"signup.php",
        type:"POST",
        data:datatopost,
        success:function(data){
            if(data){
        $("#signupmessage").html(data);

            }
        },
        error:function(){
        $("#signupmessage").html("<div class='alert alert-danger'>There was an Error in Ajax Call. Please Try Again later</div>");

        }
    });
});

$("#cancel").click(()=>{
    $("#signupmessage").empty();
});

$("#loginform").submit(function(event){
    $("#loginmessage").empty();
    event.preventDefault();
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    $.ajax({
        url:"login.php",
        type:"POST",
        data:datatopost,
        success:function(data){
            if(data=="success"){
        window.location = "mainpageLoggedin.php"

            }
            else{
                $("#loginmessage").html(data);
            }
        },
        error:function(){
        $("#loginmessage").html("<div class='alert alert-danger'>There was an Error in Ajax Call. Please Try Again later</div>");

        }
    });
});
$("#cancellogin").click(()=>{
    $("#loginmessage").empty();
});

$("#forgotform").submit(function(event){
    $("#forgotmessage").empty();
    event.preventDefault();
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    $.ajax({
        url:"forgotpassword.php",
        type:"POST",
        data:datatopost,
        success:function(data){
            if(data){
                $("#forgotmessage").html(data);
            }
        },
        error:function(){
        $("#forgotmessage").html("<div class='alert alert-danger'>There was an Error in Ajax Call. Please Try Again later</div>");

        }
    });
});