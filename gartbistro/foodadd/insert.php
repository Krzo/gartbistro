<?php
define("HOST","mysqlsvr71.world4you.com");
define("USER","sql7965842");
define("PASSWORD","ixqgc@9");
define("DATABASE","4712598db1");

$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die ("database connection failed");

if(isset($_POST["food_name"], $_POST["food_price"]))
{
	$food_name_post = mysqli_real_escape_string($connect, $_POST["food_name"]);
	$food_price_post = mysqli_real_escape_string($connect, $_POST["food_price"]);
	$food_category_post = mysqli_real_escape_string($connect, $_POST["food_category"]) or " ";
	$food_description_post = mysqli_real_escape_string($connect, $_POST["food_description"]) or " ";
	$query = "INSERT INTO food(food_name, food_price, food_category,food_description) VALUES('$food_name_post', '$food_price_post', '$food_category_post', '$food_description_post')";
	if(mysqli_query($connect, $query))
	{
		echo 'Speise der Speisekarte hinzugefügt';
	}else{
		echo 'Fehler während dem Speichern';
	}
}
?>
