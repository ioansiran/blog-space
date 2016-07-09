<?PHP
require("connect.php");
$db=new database();
session_start();

if (isset($_SESSION["BLOG_U"])&&isset($_SESSION["BLOG_TOKEN"])) {
    if($db->validate_token($_SESSION["BLOG_U"],$_SESSION["BLOG_TOKEN"])){
$user_id=$db->get_user_id($_SESSION);
$post_id=strip_tags($_POST["post_id"]);
$post_title=strip_tags($_POST["post_title"]);
$post_content=strip_tags($_POST["post_content"]);
if($db->edit_post($user_id,$post_id,$post_title,$post_content))
echo "YAY";
else 
echo "NOPE";
        
    }
    
}
?>