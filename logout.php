<?php
if($_SESSION['user_id'] && $_GET['logout'] == 1){
    unset($_SESSION['user_id']);
//    setcookie("rememberme", time()-3600);
    
}

?>