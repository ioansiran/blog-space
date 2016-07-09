<?PHP

require("connect.php");
$db=new database();
session_start();
$post_id=$_POST["post_id"];
$post_title=$_POST["post_title"];
$post_content=$_POST["post_content"];
if (isset($_SESSION["BLOG_U"])&&isset($_SESSION["BLOG_TOKEN"])) {
    if($db->validate_token($_SESSION["BLOG_U"],$_SESSION["BLOG_TOKEN"]))
    {
            
        
     }else 
        header("Location:user.php");
}
else {
    header('HTTP/1.0 401 Unauthorized');
    header("Location:user.php");
}
?>