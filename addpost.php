<?PHP
require("connect.php");
$db=new database();
session_start();
if (isset($_SESSION["BLOG_U"])&&isset($_SESSION["BLOG_TOKEN"])) {
    if($db->validate_token($_SESSION["BLOG_U"],$_SESSION["BLOG_TOKEN"])){
        $blog_id = strip_tags($_POST["blog_id"]);
        $post_title = $_POST["post_title"];
        $post_content = $_POST["post_content"];
        $uname_id=$db->get_user_id($_SESSION["BLOG_U"]);
        $res=$db->check_ownership($uname_id,$blog_id);
        if($res){
            if($db->post($blog_id,$post_title,$post_content))
            echo "YEP";
            
        }
        else {
            echo "NOPE";
        }
    }else echo "NOPE";
}else echo "NOPE";
?>