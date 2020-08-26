<?php
if(!isset($_SESSION['user_id'])&&!empty($_COOKIE['rememberme'])){
//f1  Cookie:   $a . "." . bin2hex($b);
//f2   hash('sha256',$a)

list($authenticator1,$authenticator2) = explode('.',$_COOKIE['rememberme']);
    $authenticator2 = hex2bin($authenticator2);
    $f2authenticator2 = hash('sha256',$f2authenticator2);
    $sql = "SELECT * FROM rememberme WHERE authenticator1 = '$authenticator1'";
    $result = mysqli_query($link,$sql);
    if(mysqli_error($link)){
        echo "<div>Error Occured while running Query: ".mysqli_error($link)."</div>";
        exit;
    }
    if(mysqli_num_rows($result) !==1){
        echo "<div>Remember me Failed: ".mysqli_error($link)."</div>";
        exit;
    }
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(hash_equals($row['f2authenticator2'],$f2authenticator2)){
        $_SESSION['user_id'] = $row['user_id'];
    }
}
?>