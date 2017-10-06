<?php
session_start();


require ("config.php");
$error=""; 

//print_r($_POST);

if ($_POST['confirm'] !== $_POST['password']){
    $error = 'Passwords do not match';
}
if (strlen($_POST['password'])<8){
    $error = 'Password must have atleast 8 characters';
}
if (!$_POST['confirm']){
    $error = 'Please confirm the password';
}
if (!$_POST['password']){
    $error = 'Please enter password';
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $error = "Invalid email format"; 
}
if (!$_POST['email']){
    $error = 'Please enter a valid email id';
}
if (!$_POST['username']){
    $error = 'Enter username';
}

if ($error == ""){
    //signup
    // if no errors , then set to success
//    $error = 'success';
    
    $query = "SELECT u_id FROM `user` WHERE u_email='".mysqli_real_escape_string($link, $_POST['email'])."'";

    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) != 0){
        $error = "Email id already taken";
    } else{
        // INSERT ALL VALUES INTO DB
        $query = "INSERT INTO `user` (`u_name`, `u_email`, `u_pass`) values ( '".mysqli_real_escape_string($link, $_POST['username'])."', '".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";

        if (!mysqli_query($link, $query)){
            $error = "Sign up failed ! Please try again later.";
        }
        else{
            $query = "SELECT u_id FROM `user` WHERE u_email='".mysqli_real_escape_string($link, $_POST['email'])."'";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_array($result);
            $id = $row['u_id'];

            //HASH PASSWORD
            $query = "UPDATE `user` SET u_pass= '".md5(md5($id).$_POST['password'])."' WHERE u_id =".$id." LIMIT 1";
            mysqli_query($link, $query);

            //setting session
            $_SESSION["id"] = $id; 
            setcookie("id", $id, time() + 60*60*24*15);

        }
    }
    
    if ($error == ""){
        $error = 'success';
    }

}

echo $error;
//print_r($_SESSION);

?>