<?php
session_start();
include "connection.php";
//echo "<div class='noteheader'>
//    <div class='text'>This is a noteThis is a noteThis is a noteThis is a noteThis is a noteThis is a noteThis is a note</div>
//    <div class='timetext'>May 30</div>
//
//    </div>";
//echo "<div class='noteheader'>
//    <div class='text'>This is a note</div>
//    <div class='timetext'>May 30</div>
//
//    </div>";
//echo "<div class='noteheader'>
//    <div class='text'>This is a note</div>
//    <div class='timetext'>May 30</div>
//
//    </div>";
$user_id = $_SESSION['user_id'];
$sql = "DELETE FROM notes WHERE note=''";
$result = mysqli_query($link,$sql);
if(mysqli_error($link)){
    echo "<div class='alert alert-danger'>Error Occured:".mysqli_error($link)."</div>";
    exit;
}
$sql = "SELECT * FROM notes WHERE user_id = '$user_id' ORDER BY time DESC";
$result = mysqli_query($link,$sql);
if(mysqli_error($link)){
    echo "<div class='alert alert-danger'>Error Occured:".mysqli_error($link)."</div>";
    exit;
}
$count =mysqli_num_rows($result);
if($count==0){
    echo "<div class='alert alert-success' style='text-align:center'>You have not created any Notes.</div>";
    exit;
}

while($count){
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$note = $row['note'];
$time = $row['time'];
    $note_id = $row['id'];
$time = date('F d. Y h:i:s A',$time);
//echo "<div class='noteheader' id='$note_id'>
//    <div class='text'>$note</div>
//    <div class='timetext'>$time</div>
//
//    </div>";
    echo "<div class='note'>
        <div class='delete'>
        <button class='btn-lg btn-danger' id='$note_id'>Delete</button>
        </div>
        <div class='notehead' id='$note_id'>
        <div class='text'>$note</div>
        <div class='timetext'>$time</div>    </div>
        </div>";
$count--;
}

?>
<!--
<div class='note'>
            <div class='col-xs-5 col-sm-3 delete'>
                <button class='btn-lg btn-danger' style='width:100%'>delete</button>
            
            </div>-->
