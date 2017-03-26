 <?php
 $link = mysqli_connect("localhost", "root", "", "emd"); 
//    $link = mysqli_connect("localhost", "cl20-bloghere", "2mU-qBFw-","cl20-bloghere");

    if (mysqli_connect_error()){
        die('Unable to connect to the database');
    }
?>