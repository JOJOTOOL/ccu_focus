<?php
    session_start();
    if(isset($_SESSION['id'])){
        session_destroy();
        echo "<script>alert('已登出!');location.href='start.php';</script>";
    }else{
        echo "<script>alert('已登出!');location.href='start.php';</script>";
    }
?>