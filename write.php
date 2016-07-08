<?php
require("validate.php");

session_start();
if(isset($_SESSION["BLOG_U"])&&isset($_SESSION["BLOG_TOKEN"])&&validate_credentials($_SESSION["BLOG_U"],$_SESSION["BLOG_TOKEN"])){
    
}else 
    header("Location:user.php");
?>