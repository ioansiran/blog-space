<?PHP
session_start();
unset($_SESSION["BLOG_U"]);
unset($_SESSION["BLOG_TOKEN"]);
session_destroy();
header("Location:index.php");
?>