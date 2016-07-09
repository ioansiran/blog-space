<?PHP
require("connect.php");
require("smart.php");
$db=new database();
$ID=strip_tags($_GET["id"]);
$posts=array();
$stmt = $db->get_all_blog_posts();
            $stmt->bind_param('i', $ID);
            $stmt->execute();
            
            $stmt->store_result();
            $stmt->bind_result($TITLE,$CONTENT,$DATE_CREATED,$LIKES,$DISLIKES);
            $i=0;
            while($stmt->fetch())
            {
                $posts[$id]["title"]=$TITLE;
                $posts[$id]["content"]=$CONTENT;
                $posts[$id]["date"]=$DATE_CREATED;
                $posts[$id]["likes"]=$LIKES;
                $posts[$id]["dislikes"]=$DISLIKES;
                
                $id++;
            }
            
            $smarty->assign("posts",$posts);
            $smarty->display("templates/view.tpl");

?>