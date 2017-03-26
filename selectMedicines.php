<?php
// Fetch selected medicines data in json format
// set it to session variable
// send back ok response

session_start();
require('config.php');

// get medicines json data from index.php
$medicineList = json_decode($_GET['medObject'], true);
//print_r($medicineList);

$_SESSION['medicines'] = $medicineList;
print_r($_SESSION['medicines']);
//echo "Ok";


?>