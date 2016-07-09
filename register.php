<?php

    require("connect.php");
    require("smart.php");
    $username = strip_tags($_POST["username"]);
    $email = strip_tags($_POST["email"]);
    $password = strip_tags($_POST["password"]);
    $f_name = strip_tags($_POST["f_name"]);
    $l_name = strip_tags($_POST["l_name"]);
    $messages=array();
    if(empty($username))
        $messages[]="No username entered";
    if(empty($password))
        $messages[]="No password entered";
    if(empty($email))
        $messages[]="No username entered";
    if(empty($f_name))
        $messages[]="No first name entered";
    if(empty($l_name))
        $messages[]="No last name entered";
    if(count($messages))
    {
        $smarty->assign("messages",$messages);
        $smarty->display("templates/fail.tpl");
        exit();
    }
    $db=new database();
    $db->create_user($username, $f_name, $l_name,$email,$password);
?>