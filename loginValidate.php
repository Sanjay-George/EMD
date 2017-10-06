<?php
session_start();
error_reporting(0);

require("config.php");

$error=""; 

if (!$_POST['email']){
    $error = 'One or more fields are empty';
}
if (!$_POST['password']){
    $error = 'One or more fields are empty';
}
if ($error == ""){
    //login
    // if no errors , then set to success
    $query = "SELECT * FROM `user` WHERE u_email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
 
    if (array_key_exists("u_id", $row)){
        $hashedpassword = md5(md5($row['u_id']).$_POST['password']);
        if ($hashedpassword == $row['u_pass']){
            // valid
            $id = $row['u_id'];
            $_SESSION["id"] = $id;
            setcookie("id", $id, time() + 60*60*24*15);

//            if ($row['u_email'] == "admin@restrofinder.com"){
//                //admin
//                $_SESSION["admin"] = 1;
//                setcookie("admin", 1, time() + 60*60*24*15); 
//            }
//            else{
//                
//            }

        }else{
            $error = 'Invalid email/password';

        }
    }
    else{
        $error = 'Invalid email/password';
    }
    
    if ($error == ""){
        $error = 'success';
    }
    
}

echo $error;
//print_r($_SESSION);

?>