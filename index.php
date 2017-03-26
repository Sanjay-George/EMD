<?php
//error_reporting(0);  
session_start();
require('config.php');

if(array_key_exists("purchase",$_GET)){
    print_r($_GET);
}

//$json = json_encode($array); // php to json

$array2 = json_decode('[{"name":"med1","qty":"2"},{"name":"med2","qty":"2"}]', true); // json to php array
print_r($array2);

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
        <div class='row'>
            <div class='col m6 z-depth-1 hoverable sub-panel'>
                <div class="row">
                    <div class='col m12'>
                        <form class='col m12'>
                            <div class='col m12 input-field'>
                                <select>
                                    <option value="" disabled selected>Age Group</option>
                                    <option>Newborn named Sanjay</option>
                                    <option>Other</option>
                                    <option>Old and about to die</option>
                                </select>
                                <label>Age Group</label>
                            </div>
                            <div class='col m12 input-field'>
                                <label>Zipcode</label>
                                <input type='text' pattern="[0-9]+" name="age" placeholder="Enter Zipcode">
                            </div>
                            <div class='col m12 input-field'>
                                <select>
                                    <option value="" disabled selected>Choose your gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>other</option>
                                </select>
                                <label>Gender</label>
                            </div>
                            <div class="col m12 center" style="padding-top:20px; padding-bottom:30px;">
                                <button name="diagnose" class='waves-effect waves-light btn light-blue darken-1'><i class='material-icons'>visibility</i><span>Diagnose</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class='col m6 z-depth-1 hoverable sub-panel'>
                <div class="row">
                    <div class='col m12'>
                        <form id="purchase" class='col m12'>
                            <div class='col m12 input-field'>
                                <select name='medicines' multiple>
                                    <option value="" disabled selected>Choose your poison</option>
                                    <option value="paracetamol">Paracetamol</option>
                                    <option value="augmentin">Augmentin</option>
                                    <option value="sleep">Sleep</option>
                                    <option value="music">Music</option>
                                    <option value="something else">Something else</option>
                                </select>
                                <label>Medicine</label>
                            </div>
                            <div class="col m12 center" style="padding-top:20px; padding-bottom:30px;">
                                <button name="purchase" class='waves-effect waves-light btn light-blue darken-1'><i class='material-icons'>shopping_cart</i><span>purchase</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            
            
        </div>    
    </div>
    
    
    
    
    
<script src="js/jquery-3.2.0.js"></script>
<script src="materialize/js/materialize.js"></script>
<script>
$(document).ready(function(){
    
    
    $('button[name="purchase"]').click(function(e){
        e.preventDefault();
        console.log($('#purchase').find('select').val());
//        var medObject = $('#purchase').find('select').val()
//        callPHP(medObject);
    })
    
    
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