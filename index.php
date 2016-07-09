<?php
require("smart.php");
require("connect.php");

$blogs=array();
$db= new database();

$result = $db->get_all_blogs();
while($row = $result->fetch_assoc()) {
      $blogs[]=$row;
}
$smarty->assign("blogs",$blogs);
session_start();
if($db->validate_token($_SESSION["BLOG_U"],$_SESSION["BLOG_TOKEN"]))
    $smarty->assign("username",$_SESSION["BLOG_U"]);
$smarty->display("templates/index.tpl");
   

?>
