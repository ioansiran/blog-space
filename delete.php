<?php
require("connect.php");
$db=new database();
session_start();
if($db->validate_token($_SESSION["BLOG_U"],$_SESSION["BLOG_TOKEN"])){
    $update=$db->delete_blog_secure($_SESSION["BLOG_U"],$_POST["blog_id"]);
    if($update->affected_rows>0)
    echo "done";
    else "not authorized of other err";
}
else{
    echo "not authorized";
    
}
?>