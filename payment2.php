<?php
//error_reporting(0);  
session_start();
require('config.php');

$orderId = $_SESSION['orderId'];
// fetch from orders table
//echo $orderId;

$query = "SELECT totalAmount FROM `orders` WHERE order_id=".$orderId." LIMIT 1";
$result = mysqli_query($link, $query);
$response = array(); 
if (mysqli_num_rows($result) != 0) 
{ 
	while($row = mysqli_fetch_array($result)){
        array_push($response, $row);
//        print_r($row);
    }
}
print_r($response);

?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>EMD - Search your way to death </title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="materialize/css/materialize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <div class="nav-wrapper black">
            <a href="#" class="brand-logo">EMD</a>
        </div>
    </nav>
    
    <div class='container'>
        <div class="row">
            <div class='col s12 m8 offset-m2 z-depth-1' style='padding:0;'>
                <div class='col m12 s-card-header'>
                    <div class='col m9'>Order Total : </div>
                    <div class='col m3'>₹ <span>500.0</span></div>
                </div> 
                <div class='col m12 s-card-content'>
                    <form>
                        <div class="col m12 input-field">
                            <label>Full Name</label>
                            <input type="text" name="name" placeholder="John Smith" autocomplete="name" required>
                        </div>
                        <div class="col m12 input-field">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="name@example.com" autocomplete="email" required>
                        </div>
                        <div class="col m12 input-field">
                            <label>Address</label>
                            <input type="text" name="address" placeholder="H-23, Blue River apt., Surat, Gujarat, India" required>
                        </div>
                        <div class="col m6 input-field">
                            <label>Pincode</label>
                            <input type="number" name="pincode" placeholder="132456" required>
                        </div>
                        <div class="col m6 input-field">
                            <label>Contact Number</label>
                            <input type="number" name="ctNumber" placeholder="9999999999" autocomplete="mobile" required>
                        </div>
                        <div class="col m12 center" style="padding-top:20px; padding-bottom:30px;">
                            <button name="submit" class='waves-effect waves-light btn light-blue darken-1'><i class='material-icons'>credit_card</i><span>Pay using card</span></button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>    
    </div>
    
    
    
    
    
<script src="js/jquery-3.2.0.js"></script>
<script src="materialize/js/materialize.js"></script>
<script>
$(document).ready(function(){
    
    // FETCH ORDER AMOUNT AS JSON
    var orderTotal = <?php echo json_encode($response); ?>;
    console.log(orderTotal);
    // display
    $('.s-card-header span').text(orderTotal[0].totalAmount);
    
    // SUBMIT BUTTON CLICK
    $('button[name="submit"]').click(function(e){
        e.preventDefault();
        var deliveryDetails = setData();
        $.ajax({
            url : "setDeliveryDetails.php",
            method : "GET",
            data : {deliveryDetails : JSON.stringify(deliveryDetails)}
        })
        .done(function(response){
            console.log(response);
            window.location.href="payment3.php";
        })
    });

    
    // initialize components
    $('select').material_select();
 
});
    
var setData = function(){
    var deliveryDetailsObj = {};
    deliveryDetailsObj.name = $('input[name="name"]').val();
    deliveryDetailsObj.email = $('input[name="email"]').val();
    deliveryDetailsObj.address = $('input[name="address"]').val();
    deliveryDetailsObj.pincode = $('input[name="pincode"]').val();
    deliveryDetailsObj.ctNumber = $('input[name="ctNumber"]').val();
    return deliveryDetailsObj;
}

</script>
</body>
</html>