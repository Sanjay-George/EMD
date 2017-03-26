<?php
//error_reporting(0);  
session_start();
require('config.php');
$medicineList = $_SESSION['medicines'];

// SETTING UP QUERY FOR FETCHING MED DETAILS
$query = "SELECT m_medicine,m_quantity,m_cost FROM `emd`.`medicine` WHERE ";
for($i=0; $i<sizeof($medicineList)-1; $i++){
    $query = $query . "m_medicine='".$medicineList[$i]."' OR "; 
}
$last = sizeof($medicineList)-1;
$query = $query . "m_medicine='".$medicineList[$last]."'"; 
//echo $query;

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
                    <div class='col m9'>Order Details : </div>
                </div> 
                <div class='col m12 s-card-content'>
                    <form id='order-details' method="get">
                        <div class='col m12' style="padding-bottom:10px; font-size : 95%; color : #8a8a8a;">
                            <div class='col m4'>Medicine name</div>
                            <div class='col m3'>Price (₹)</div>
                            <div class='col m2'>Qty</div>
                            <div class='col m3'>Total (₹)</div>
                        </div>
                        <!-- add details from here -->
<!--
                        <div class='col m12 details-row'>
                            <div class='col m4'>Amoxycillin</div>
                            <div class='col m3'>50.0</div>
                            <div class='col m2'>
                                <input type='number'>
                            </div>
                            <div class='col m3'>100.0</div>
                        </div>
-->
                        <!------------------------------>
                       
                        <div class='col m4 offset-m8 last'>
                           
                            <h5 style='font-size:140%; font-weight:300; padding:20px;'>Total : ₹ <span class='total-amt'>0.0</span></h5>
                        </div>

                        <div class="col m12 center" style="padding-top:0px; padding-bottom:30px;">
                            <button name="submit" class='waves-effect waves-light btn light-blue darken-1'><i class='material-icons'>send</i><span>Proceed to payment</span></button>
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
    
    // FETCH SELECTED MED AS JSON
    var medicineObject = <?php echo json_encode($response); ?>;
//    console.log(medicineObject);
    
    $target = $('#order-details').find('.last');
    // DISPLAY DATA
    for (var i=0; i < medicineObject.length; i++){
        $target.before("<div class='col m12 details-row'><div class='col m4'>"+medicineObject[i][0]+"</div><div class='col m3'>"+medicineObject[i][2]+"</div><div class='col m2'><input type='number'></div><div class='col m3'>"+1*medicineObject[i][2]+"</div></div>");
    }
    $('input[type="number"]').val(1);
    
    var total = findTotal();
    $('.total-amt').html(total);
    
    
    
    
    
    // SUBMIT BUTTON CLICK
    $('button[name="submit"]').click(function(e){
        e.preventDefault();
        var orderDetails = setData();
        total = findTotal();
        $.ajax({
            url : "setOrderDetails.php",
            method : "GET",
            data : {orderId : Math.floor(Math.random()*90000000)+10000000, totalAmount:total, orderDetails : JSON.stringify(orderDetails)}
        })
        .done(function(response){
            console.log(response);
            window.location.href="payment2.php";
        })
    });
    

    
    // initialize components
    $('select').material_select();
 
});
    
    
// UPDATE INDIVIDUAL TOTAL
$('#order-details').on("change", "input", function(){
//    console.log("changed");  
    var price = $(this).parent('div').siblings('div:nth-child(2)').html(); 
    $(this).parent('div').siblings('div:nth-child(4)').html($(this).val()*price); 
    var total = findTotal();
    $('.total-amt').html(total);
});  
    
    
// CREATE ORDERDETAILS ARRAY FOR SENDING
var setData = function(){
    // create orderDetails object
    var orderDetails = [];
    var orderDetailsObject = {};
    
    $(".details-row").each(function(index,value){
        orderDetailsObject.medicine = $(this).children('div:nth-child(1)').html();
        orderDetailsObject.qty = $(this).children('div:nth-child(3)').children('input').val();
        orderDetailsObject.total = $(this).children('div:nth-child(4)').html();
        orderDetails.push( JSON.parse(JSON.stringify(orderDetailsObject)));
    });
    
//    console.log(orderDetails);  
    return orderDetails;
}
    
    
// FIND TOTAL AMOUNT FUNCTION 
var findTotal = function(){
    var grandTotal = 0.0;
    $(".details-row div:nth-child(4)").each(function(i,v){
        grandTotal += parseFloat($(this).text());
    })
//    console.log(grandTotal);
    return grandTotal;

}


</script>
</body>
</html>