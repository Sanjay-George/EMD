<?php
//error_reporting(0);  
session_start();
//session_destroy();
require('connection.php');
require('config.php');
require('loginCheck.php');


?>


<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>EMD - Search for a Disease </title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="materialize/css/materialize.css">
    <link rel="stylesheet" href="css/materialize_blue_theme.css">
    <link rel="stylesheet" href="css/style.css">
	
</head>
<body >
    <nav>
        <div class="nav-wrapper black">
            <a href="#" class="brand-logo">EMD</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li class="waves-effect waves-light"><a href="index.php">Home</a></li>
            </ul>
        </div>
    </nav>
    <div class='container' style="align-items:flex-start; position:relative; top:100px;">
        <div class="row ">
             <!-- login or signup markup -->
            <div class="col s12 l8 offset-l2 tabs-col">
                <ul class="tabs">
                    <li class="tab col s6 z-depth-1"><a href="#login">Login</a></li>
                    <li class="tab col s6 z-depth-1"><a class="active" href="#signup">Register</a></li>
                </ul>
            </div>
            <!-- LOGIN -->
            <div class="col s12 m12 l8 offset-l2">
            <div class="row">
                <form name='login' method='post' id='login' class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" name="email" class="validate" autocomplete="email">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" name="password" class="validate">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <input type="hidden" name='login' value='1'>
                    <div class='col s12 l12 center'>
                        <button name='submit' id='submit login-btn' class="submit waves-effect waves-light btn z-depth-2 light-blue darken-1">Login</button>
                    </div>
                    <div class='col s12 l12 center'>
                        <p class='form-error-1 form-error center'></p>
                    </div>
                </form>
            </div>
            </div>
            <!-- SIGNUP -->
            <div class="col s12 l8 offset-l2">
            <div class="row">
                <form method="post" name='signup' id='signup' class="col s12">
                    <!--do email validation in php-->
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="username" name='username' type="text" class="validate" autocomplete='name' required>
                            <label for="username">Username</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" name="email" class="validate" autocomplete="email" required>
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" name='password' class="validate" required>
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="cnf-password" type="password" name="cnf-password" class="validate">
                            <label for="cnf-password">Confirm Password</label>
                        </div>
                    </div>
                    <input type="hidden" name='login' value='0'>
                    <div class='col s12 l12 center'>
                        <button name='submit' id='submit signup' class=" submit waves-effect waves-light btn z-depth-2 light-blue darken-1">Register</button>
                    </div>
                    <div class='col s12 l12 center'>
                        <p class='form-error-2 form-error center'></p>
                    </div>
                </form>
            </div>
            </div>
        </div> 
    </div>
  
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyAKAptIgIHps-YAQqyxKyNc2jqhL2upJjQ"></script>
   
    
    
<script src="js/jquery-3.2.0.js"></script>
<script src="materialize/js/materialize.js"></script>
<script>
    

    
$(document).ready(function(){

    
    // LOGIN REQUEST AJAX
    $('#login button').click(function (e) {
        e.preventDefault();
        // ajax to validate
        $.ajax({
            method: "POST"
            , url: "loginValidate.php"
            , data: {
                email: $('#login #email').val()
                , password: $("#login #password").val()
            }
        }).done(function (msg) {
            if (msg.replace(/\s/g,'') != 'success') {
                $('.form-error-1').text(msg);
            }
            else {
                // refresh the page
                $('.form-error-1').text('Logged in successfully');
                 window.history.back();
            }
        });
    });


    // SIGNUP REQUEST AJAX
    $('#signup button').click(function (e) {
        e.preventDefault();
        // ajax to validate
        $.ajax({
            method: "POST"
            , url: "signupValidate.php"
            , data: {
                email: $('#signup #email').val()
                , password: $("#signup #password").val()
                , confirm: $("#signup #cnf-password").val()
                , username: $("#signup #username").val()
            }
        }).done(function (msg) {
            if (msg.replace(/\s/g,'') != 'success') {
                $('.form-error-2').text(msg);
            }
            else {
                //refresh the page
                $('.form-error-2').text("Registered successfully");
                 window.history.back();
            }
        });
    });
    
    
    // initialize components
    $('select').material_select();
 
});


</script>
</body>
</html>