<?php


 require('db.php');


$sql = "SELECT admin_id FROM gb_admin 
        WHERE admin_name = '$_POST[username]' 
        AND admin_passwort='$_POST[password]'"; 

$result = mysql_query($sql); 
$num = mysql_num_rows($result);

if ($num > 0) {
    
    $id = mysql_fetch_assoc($result);
    
    setcookie("auth", "yes", time() +3600);
    setcookie("admin_id", $id['admin_id']);
    setcookie("admin_name", $id['admin_name']); 
    echo "hakan hat es geschafft";
    header ("Location: http://www.gartbistro.at");
    exit();
    
} else {
	echo "hakan hat es nicht geschafft";
    header ("Location: http://www.gartbistro.at");
    exit();
}


/*
 $_sql = "SELECT * FROM gb_admin WHERE 
                    username='$_username' AND 
                    passwort='$_passwort' AND 
                    user_geloescht=0 
                LIMIT 1"; 

 $_res = mysql_query($_sql, $link); 
        $_anzahl = @mysql_num_rows($_res); 


 if (!empty($_POST["submit"])) 
        { 
     
    $_username = mysql_real_escape_string($_POST["username"]); 
    $_passwort = mysql_real_escape_string($_POST["password"]); 
     
     $_sql = "SELECT * FROM gb_admin WHERE 
                    username='$_username' AND 
                    passwort='$_passwort' AND 
                    user_geloescht=0 
                LIMIT 1"; 
      $_res = mysql_query($_sql, $link); 
        $_anzahl = @mysql_num_rows($_res); 
     
      if ($_anzahl > 0) 
            { 
            echo "Sie haben sich erfolgreich angemeldet.<br>"; 

           
            $_SESSION["login"] = 1; 

         
            $_SESSION["user"] = mysql_fetch_array($_res, MYSQL_ASSOC); 

            
           
            mysql_query($_sql);
          
        
            } 
        else 
            { 
            echo "Benutzername oder Passwort falsch!.<br>";
            header('Location: http://www.gartbistro.at/');
            
            } 
        } 
*/

?>