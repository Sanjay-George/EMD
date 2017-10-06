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
//print_r($response);
?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>EMD - Search your way to death </title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="materialize/css/materialize.css">
    <link rel="stylesheet" href="css/datePickerColor.css">
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
                    <form method="post">
                        <div class="col m9 input-field" style="padding-right:2px">
                            <label>Card Number</label>
                            <input type="number" name="card-number" placeholder="Enter Card Number" oninput="checkCardType()" autocomplete="cc-number">
                        </div>
                        <div id="card-icon" class="col m1">
                            <img class='responsive-img' src="">&nbsp;
                        </div>
                        <div class="col m2 input-field">
                            <label>CVV</label>
                            <input type="number" name="cvv" placeholder="cvv" autocomplete="cc-csc">
                        </div>
                        <div class="col m12 input-field">
                            <label>Expiry date</label>
                            <input type="date" class="datepicker" name="expiry" placeholder="Select Expiry Date" autocomplete="cc-exp">
                        </div>
                        <div class="col m12 input-field">
                            <label>Card Holder's Name</label>
                            <input type="text" name="holder-name" placeholder="Enter Card Holder's Name" autocomplete="cc-name">
                        </div>
                        
                        
                        <div class="col m12 center" style="padding-top:20px; padding-bottom:30px;">
                            <button name="submit" class='waves-effect waves-light btn light-blue darken-1'><i class='material-icons'>credit_card</i><span>Confrim Payment</span></button>
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
        var cardDetails = setData();
//        console.log(cardDetails);
        $.ajax({
            url : "checkCardDetails.php",
            method : "GET",
            data : {cardDetails : JSON.stringify(cardDetails)}
        })
        .done(function(response){
            console.log(response);
            if(response.replace(/\s/g,'') === "success"){
                alert('success');
                window.location.href="index.php";

            }
            else{
                alert('card not found');
            }
//               
        });
    });


    
    // initialize components
    $('select').material_select();
    $('.datepicker').pickadate({
        format: 'yyyy-mm-dd',
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 30, // Creates a dropdown of 15 years to control year
        min : true,
        max : new Date(2032,12,30)
      });
 
});
   
var setData = function(){
    var cardDetailsObj = {};
    cardDetailsObj.cardNumber = $('input[name="card-number"]').val();
    cardDetailsObj.expiry = $('input[name="expiry"]').val();
    cardDetailsObj.cvv = $('input[name="cvv"]').val();
    cardDetailsObj.cardHolderName = $('input[name="holder-name"]').val();
    return cardDetailsObj;
}    
    
    
// mastercard or visa
var checkCardType = function(){
    var cardNumber = $('input[name="card-number"]').val();
    if(cardNumber.length == 1){
        if(cardNumber == 5){
            $('#card-icon').find('img').prop("src", "images/mastercard.png");
        }
        else if(cardNumber == 4){
            $('#card-icon').find('img').prop("src", "images/visa.png");
        }
    }
    else if(cardNumber.length == 0){
        $('#card-icon').find('img').prop("src", "");
    }
    
};


</script>
</body>
</html>