<?php
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.
class database{
    var $db;
    function __construct() {
        $servername = getenv('IP');
        $username = getenv('C9_USER');
        $password = "";
        $database = "c9";
        $dbport = 3306;
            
        $this->db = new mysqli($servername, $username, $password, $database, $dbport);
    
        // Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        } 
    }
    function __destruct() {
        $this->db->close();     
    }
    function validate_token($uname,$token){

        
        if($stmt = $this->db->prepare("SELECT PASSWORDHASH FROM USER WHERE UNAME=? ;")) 
        {
            require("secret.php");
            $uname=strip_tags($uname);
            $stmt -> bind_param("s", $uname);
            $stmt -> execute();
        
            /* Bind results */
            $stmt -> bind_result($PWDHS);
            $stmt->fetch();
            if(hash('sha256',$secret.$uname.$PWDHS)==$token)
                return TRUE;
            else{
                return FALSE;
            }
            
        $stmt->close();
        }
        else return FALSE;
    }
    function create_user($username, $f_name, $l_name,$email,$password){
        
        $stmt = $this->db->prepare("INSERT INTO USER(UNAME,F_NAME,L_NAME,EMAIL,PASSWORDHASH) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $f_name, $l_name,$email,$password);
        if(!$stmt->execute()){
            return FALSE;
        }
        else{
            return TRUE;
        }
        $stmt->close();
    }
    function validate_credentials($username,$password){
        
        if($stmt = $this->db->prepare("SELECT USER_ID FROM USER WHERE UNAME=? AND PASSWORDHASH=?;")) 
        {
        $stmt -> bind_param("ss", $username,$password);
        $stmt -> execute();
    
        /* Bind results */
        $stmt -> bind_result($ID);
        
        /* Fetch the value */
        $stmt -> fetch();
        
        $stmt -> close();
        
        if(isset($ID))
            return true;
        else 
            return false;
       }else
       return false;
    }
    function get_all_blogs(){
        return $this->db->query("Select TITLE,F_NAME,L_NAME,UNAME,DATE_CREATED from BLOG JOIN USER ON OWNER_ID=USER_ID;");
        
    }
    function get_user_blogs(){
        return $this->db->prepare("Select BLOG_ID,TITLE,UNAME from BLOG join USER on OWNER_ID=USER_ID where UNAME=?;");
    }
    function get_all_blog_posts(){
        return $this->db->prepare("Select TITLE,CONTENT,DATE_CREATED,LIKES,DISLIKES from BLOG_POST WHERE BLOG_ID=?");
        
    }
    function delete_blog_secure($uname,$blog_id){
        
        $update= $this->db->prepare("DELETE BLOG FROM BLOG JOIN USER ON OWNER_ID=USER_ID WHERE UNAME=? AND BLOG_ID=?");
        if(!$update) return false;
        $update->bind_param('si', $uname, $blog_id);
      $update->execute();
      
      return $update;
        
    }
    function get_user_id($uname){
       if ($stmt = $this->db->prepare("SELECT USER_ID FROM USER WHERE UNAME=?")) {

            /* bind parameters for markers */
            $stmt->bind_param("s", $uname);
        
            /* execute query */
            $stmt->execute();
        
            /* bind result variables */
            $stmt->bind_result($ID);
        
            /* fetch value */
            $stmt->fetch();
        
            /* close statement */
            $stmt->close();
            return $ID;
       }
    }
    function create_blog($B_NAME,$U_ID) {
        $stmt = $this->db->prepare("INSERT INTO BLOG (OWNER_ID, TITLE) VALUES (?, ?)");
        if(!$stmt)
            return false;
        if(!$stmt->bind_param("ss", $U_ID, $B_NAME))
            return false;
        if(!$stmt->execute())
            return false;
        $stmt->close();
        return true;

    }
}
?>