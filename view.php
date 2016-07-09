<?PHP
require("connect.php");
require("smart.php");
$db=new database();
$ID=strip_tags($_GET["id"]);
$posts = $db->get_post_by_blog_id($ID);
$smarty->assign("posts",$posts);
$smarty->display("templates/view.tpl");

?>