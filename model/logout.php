<?php 
    session_start();
    // huy session
    session_destroy();
    // xoa cookie
    setcookie('username', '', time() - 3600);
    setcookie('password', '', time() - 3600);
    header('location: ../view/index.php');
?>