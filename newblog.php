<?PHP
require("connect.php");
$db=new database();
session_start();
$uid=$db->get_user_id($_SESSION["BLOG_U"]);
$title=strip_tags($_POST["blog_title"]);
$creation_success=$db->create_blog($title,$uid);
if($creation_success)
    echo "success";
else
    echo "error";
?>