<?php
// Fetch deliveryDetails data 
// update orders table
// send ok response
session_start();
require('config.php');
$orderId = $_SESSION['orderId'];

// Fetch data in json form
$deliveryDetails = json_decode($_GET['deliveryDetails'], true);
print_r($deliveryDetails);

$query = "UPDATE `orders` SET name='".$deliveryDetails['name']."',email='".$deliveryDetails['email']."',contact='".$deliveryDetails['ctNumber']."',address='".$deliveryDetails['address']."',pincode='".$deliveryDetails['pincode']."' WHERE order_id=".$orderId;

mysqli_query($link, $query);

echo "updated";



?>