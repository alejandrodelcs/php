<?php

session_start();
session_destroy();
//redirecciona a login 
header("location:index.php");
exit;

?>