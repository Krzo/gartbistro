<?php
    define("HOST","mysqlsvr71.world4you.com");
    define("USER","sql7965842");
    define("PASSWORD","ixqgc@9");
    define("DATABASE","4712598db1");

    $conn = new mysqli(HOST, USER, PASSWORD, DATABASE);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $foodid = $_POST["foodid"];
    $slctstmt = $conn->prepare("SELECT food_name,food_price FROM food WHERE id=?");
    $slctstmt->bind_param("s",$foodid);
    $slctstmt->execute();
    $slctstmt->bind_result($foodname,$foodprice);
    $slctstmt->fetch();
    $slctstmt->close();

    $stmt = $conn->prepare("INSERT INTO gb_orders (id,food_name,) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $foodid, $lastname, $email);
    
?>