<?PHP
require("connect.php");
require("smart.php");
$db=new database();
session_start();
if (isset($_SESSION["BLOG_U"])&&isset($_SESSION["BLOG_TOKEN"])) {
    if($db->validate_token($_SESSION["BLOG_U"],$_SESSION["BLOG_TOKEN"]))
        {
            $blogs=array();
            
            $stmt = $db->get_user_blogs();
            $stmt->bind_param('s', $_SESSION["BLOG_U"]);
            $stmt->execute();
            
            $stmt->store_result();
            $stmt->bind_result($ID,$TITLE,$OWNERNAME);
            $i=0;
            while($stmt->fetch())
            {
                $blogs[$id]["id"]=$ID;
                $blogs[$id]["title"]=$TITLE;
                $blogs[$id]["owner"]=$OWNERNAME;
                $id++;
            }
                
            $smarty->assign("blogs",$blogs);
            $smarty->display("templates/dashboard.tpl");
        }
    else 
    header("Location:user.php");
}
else {
    header('HTTP/1.0 401 Unauthorized');
    header("Location:user.php");
}


?>