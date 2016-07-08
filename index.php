<?php
require("smart.php");
require("connect.php");

$blogs=array();

$result = $db->query("Select TITLE,F_NAME,L_NAME,UNAME,DATE_CREATED from BLOG JOIN USER ON OWNER_ID=USER_ID;");
while($row = $result->fetch_assoc()) {
      $blogs[]=$row;
}
$smarty->assign("blogs",$blogs);


session_start();
if(isset($_SESSION["BLOG_U"]))

$smarty->assign("username",$_SESSION["BLOG_U"]);
$smarty->display("templates/index.tpl");

?>
