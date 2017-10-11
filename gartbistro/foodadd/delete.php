<?php
define("HOST","mysqlsvr71.world4you.com");
define("USER","sql7965842");
define("PASSWORD","ixqgc@9");
define("DATABASE","4712598db1");

$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die ("database connection failed");

if(isset($_POST["id"]))
{
 $query = "DELETE FROM food WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Datensatz gelöscht';
 }
}
?>