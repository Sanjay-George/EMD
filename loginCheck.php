<?php
error_reporting(0);  

// check if logged in 
if (array_key_exists("id",$_COOKIE)){
    $_SESSION['id'] = $_COOKIE['id'];
}
//// check if admin, redirect to admin.php // HAS TO BE CHANGED IN ALL PAGES
//if ($_COOKIE["admin"] == 1){
//    header("Location:admin.php");
//}



// LOGOUT 
if ($_GET['logout'] == 1){
    session_unset();
    setcookie("id", "", time()-60*60*24);
//    setcookie("admin", "", time()-60*60*24);
    $_COOKIE["id"] = "";
//    $_COOKIE["admin"] = "";
    header("Location:index.php");
}
?>