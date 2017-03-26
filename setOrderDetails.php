<?php
// Fetch orderDetails data 
// insert into orders and orderDetails table
// clear session
// add order_id to session
// send ok response
session_start();
require('config.php');

// Fetch data in json form
$orderId = $_GET['orderId'];
$totalAmount = $_GET['totalAmount'];
$orderDetails = json_decode($_GET['orderDetails'], true);
//print_r($orderDetails);

// insert into orders table
$query1 = "INSERT INTO `orders`(order_id,totalAmount) VALUES (".$orderId.",".$totalAmount.")";
mysqli_query($link, $query1);
//echo $query."\n";
//echo "ok";


// insert into orderDetails
for ($i=0; $i<sizeof($orderDetails);$i++){
    $query2 = "INSERT INTO `emd`.`orderdetails`(order_id,medicine,quantity,total) VALUES(".$orderId.",'".$orderDetails[$i]['medicine']."',".$orderDetails[$i]['qty'].",".$orderDetails[$i]['total'].")";
//    echo $query."\n";
    mysqli_query($link, $query2);
}

$_SESSION['orderId'] = $orderId;

echo "inserted";


?>