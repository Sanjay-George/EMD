<?php
//error_reporting(0);  
session_start();
require('config.php');

//if(array_key_exists("purchase",$_GET)){
//    print_r($_GET);
//}
//
////$json = json_encode($array); // php to json
//
//$array2 = json_decode('[{"name":"med1","qty":"2"},{"name":"med2","qty":"2"}]', true); // json to php array
//print_r($array2);

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
                            <input type="text" name="name" placeholder="Enter full name">
                        </div>
                        <div class="col m12 input-field">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Enter email">
                        </div>
                        <div class="col m12 input-field">
                            <label>Address</label>
                            <input type="text" name="address" placeholder="Enter address">
                        </div>
                        <div class="col m6 input-field">
                            <label>Pincode</label>
                            <input type="number" name="pincode" placeholder="Enter Pincode">
                        </div>
                        <div class="col m6 input-field">
                            <label>Contact Number</label>
                            <input type="number" name="ctNumber" placeholder="Enter Contact Number">
                        </div>
                        <div class="col m12 center" style="padding-top:20px; padding-bottom:30px;">
                            <button name="pay-online" class='waves-effect waves-light btn light-blue darken-1'><i class='material-icons'>credit_card</i><span>Pay using card</span></button>
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
    
  
    
    
//    // send data from javascript to php
//    function callPHP(params) {
//        var httpc = new XMLHttpRequest(); // simplified for clarity
//        var url = "get_data.php";
//        httpc.open("POST", url, true); // sending as POST
//
//        httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//        httpc.setRequestHeader("Content-Length", params.length); // POST request MUST have a Content-Length header (as per HTTP/1.1)
//
//        httpc.onreadystatechange = function() { //Call a function when the state changes.
//        if(httpc.readyState == 4 && httpc.status == 200) { // complete and no errors
//            alert(httpc.responseText); // some processing here, or whatever you want to do with the response
//            }
//        }
//        httpc.send(params);
//    }
//    
    
    // initialize components
    $('select').material_select();
 
});

</script>
</body>
</html>