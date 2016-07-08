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
    
    if($stmt = $db->prepare("SELECT PASSWORDHASH FROM USER WHERE UNAME=? ;")) 
    {
    $stmt -> bind_param("s", $username);
    $stmt -> execute();

    /* Bind results */
    $stmt -> bind_result($PWDHS);
    
    /* Fetch the value */
    $stmt -> fetch();
    if($password==$PWDHS){
            session_start();
            $_SESSION["BLOG_U"]=$username;
            $_SESSION["BLOG_TOKEN"] =hash('sha256',$secret.$username.$password);
            header("Location:index.php");
    }else
            header("Location:user.php");
    /* Close statement */
    $stmt -> close();
   }else
   echo "FUUUUUK";
?>