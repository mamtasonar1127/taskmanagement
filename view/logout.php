<?php
session_start();

include("controller.php");

unset($_SESSION['user']->user_name);
session_destroy();

//setcookie('user',"",time()-20);
//header("location:logout.php");

header("location:index.php");

?>