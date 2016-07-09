<?php
    require("connect.php");
    require("secret.php");
    require("smart.php");
    $username = strip_tags($_POST["username"]);
    $password = strip_tags($_POST["password"]);
    
    $messages=array();
    if(empty($username))
        $messages[]="No username entered";
    if(empty($password))
        $messages[]="No password entered";
    
    if(count($messages))
    {
        $smarty->assign("messages",$messages);
        $smarty->display("templates/fail.tpl");
        exit();
    }
    
   
?>