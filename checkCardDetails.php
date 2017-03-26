<?php
// Fetch cardDetails data JSON
// fetch from server also
// compare and see if matches
session_start();
require('config.php');
$orderId = $_SESSION['orderId'];

$response = "";

// Fetch data in json form
$cardDetails = json_decode($_GET['cardDetails'], true);
//print_r($cardDetails);


// fetch data from server cardNumber
$query = "SELECT * FROM `emd`.`carddetails` WHERE cardNumber='".$cardDetails['cardNumber']."'";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result) != 0){
    while($row = mysqli_fetch_array($result)){
        if ($row['expiry']==$cardDetails['expiry'] && $row['cvv']==$cardDetails['cvv'])
            $response = "success";
        else 
            $response = "fail";
    }
}

// update payment status if success
if ($response == "success"){
    $query = "UPDATE `emd`.`orders` SET payStatus=1 WHERE order_id=".$orderId;
    mysqli_query($link,$query);
}

echo $response;
?>