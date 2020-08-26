$(function(){
    var activeNote = 0;
    var editmode = 0;
    var datapost;
    var items;
    $.ajax({
        url:"loadnotes.php",
        success:function(data){
            if(data){
                $("#notes").html(data);
                clickonnote();
                clickondelete();
                items = $(".note").length;
                if(items!==0){
                    $("#edit").show();
                }
            }
        },
        error:function(){
            
        }
    });


$("#addnotebtn").click(function(){
        
    $.ajax({
        url:"createnote.php",
        success:function(data){
            if(data =="error"){
                $("#error").html("<div id='alert' class='alert alert-danger col-xs-offset-2 col-xs-8'>There is an Error adding a Note.<a class='close' data-dismiss='alert'>&times;</a>");
            }else{
                activeNote = data;
                $("#edit").hide();
    $("#notes").hide();
    $("#addnotearea").show();
    $("#addnotebtn").hide();
    $("#allnote").show();
               $("textarea").val(" "); 
                $("textarea").focus();
            }
        },
        error:function(){
            
        }
    });
    });
$("#allnote").click(function(){
        
    window.location = "http://vinaykumar.host20.uk/Online%20Notes%20App/mainpageLoggedin.php";

    });
$("#textarea").keyup(function(){
    datatopost = $(this).serializeArray();
    datatopost.push({"name":"id","value":activeNote});
       $.ajax({
        url:"updatenote.php",
           type:"POST",
        data:datatopost,
        success:function(data){
            if(data!==1){

            }
        },
        error:function(){
            console.log(0);
        }
    }); 
    });
    
function clickonnote(){
    $(".notehead").click(function(){
    console.log(1);
    if(!editmode){
        $("#edit").hide();
    $("#notes").hide();
    $("#addnotearea").show();
    $("#addnotebtn").hide();
        $("textarea").focus();
        $("#allnote").show();
        activeNote = $(this).attr("id");
$("textarea").val($(this).find(".text").text());
    }
});
}
    $("#edit").click(function(){
        editmode = 1;
    $(this).hide();
    $("#done").show();
    $(".delete").show();
    $(".notehead").css("width","70%");

    });
    $("#done").click(function(){
         editmode = 0;
//        $("#edit").show();
        $(this).hide();
    $(".delete").hide();
    $(".notehead").css("width","100%");
        window.location = "http://vinaykumar.host20.uk/Online%20Notes%20App/mainpageLoggedin.php";

    });
    function clickondelete(){
        $(".delete").click(function(){
        var deletebutton = $(this);
            $.ajax({
        url:"deletenote.php",
           type:"POST",
        data:{id:deletebutton.next().attr("id")},
        success:function(data){
            if(data==1){
    deletebutton.parent().remove();
            }
            else{
                console.log(data);
            }
        },
        error:function(){
            console.log("Error in deleting");
        }
    }); 
    });
    }
    
    
    
});

