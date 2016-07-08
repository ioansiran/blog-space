<?PHP
require("connect.php");
require("validate.php");
session_start();
if (isset($_SESSION["BLOG_U"])&&isset($_SESSION["BLOG_TOKEN"])) {
    if(validate_credentials($_SESSION["BLOG_U"],$_SESSION["BLOG_TOKEN"]))
        echo "welcome home";
    else 
    header("Location:user.php");
}
else {
    header('HTTP/1.0 401 Unauthorized');
    header("Location:user.php");
}


?>