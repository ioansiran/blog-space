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

        require("secret.php");
        
        if($stmt = $this->db->prepare("SELECT PASSWORDHASH FROM USER WHERE UNAME=? ;")) 
        {
            $name=strip_tags($uname);
            $stmt -> bind_param("s", $name);
            $stmt -> execute();
        
            /* Bind results */
            $stmt -> bind_result($PWDHS);
            $stmt->fetch();
            if(hash('sha256',$secret.$name.$PWDHS)==$token)
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
}
?>