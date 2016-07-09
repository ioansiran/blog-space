<?php
require("smart.php");
require("connect.php");

$blogs=array();
$database= new database();

$result = $database->get_all_blogs();
while($row = $result->fetch_assoc()) {
      $blogs[]=$row;
}
$smarty->assign("blogs",$blogs);


session_start();
if(isset($_SESSION["BLOG_U"]))

$smarty->assign("username",$_SESSION["BLOG_U"]);
$smarty->display("templates/index.tpl");

?>
