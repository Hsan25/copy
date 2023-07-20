<?php 
    session_start();
    // delete cookie
    setcookie("username","", time() - 3600);
    
    
    // delete session
    session_unset();
    session_destroy();
    header("Location:login.php");
    exit;
?>