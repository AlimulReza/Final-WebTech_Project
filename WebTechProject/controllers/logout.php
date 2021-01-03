<?php
   session_start();
   session_unset();
   session_destroy();
   //setcookie("username",$username,time() + 120);
   header("Location: ../views/hrlogin.php");
 
?>