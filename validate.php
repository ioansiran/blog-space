<?PHP
function validate_credentials($uname,$token){

require("secret.php");
require("connect.php");    
        $stmt=0;
        if($stmt = $db->prepare("SELECT PASSWORDHASH FROM USER WHERE UNAME=? ;")) 
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
?>