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
    $db = new database();
    if($db->validate_credentials($username,$password)){
        session_start();
        $_SESSION["BLOG_U"]=$username;
        $_SESSION["BLOG_TOKEN"]=hash('sha256',$secret.$username.$password);
        header("Location:index.php");
    }else{
        
        $messages[]="Wrong username or password";
        $smarty->assign("messages",$messages);
        $smarty->display("templates/fail.tpl");
        exit();
    } 
        
    
   
?>