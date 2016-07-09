<?php
require("connect.php");
$db=new database();
session_start();
if (!(isset($_SESSION["BLOG_U"])&&isset($_SESSION["BLOG_TOKEN"]))) 
    header("Location:user.php");
if(!$db->validate_credentials("myname","Inovate15"))
    header("Location:user.php");
    
?>