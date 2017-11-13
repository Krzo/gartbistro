<?php


    if(isset($_POST['sent'])){
    	session_start();
            session_destroy();
               
    }
     header('Location: http://gartbistro.at/');
?>
