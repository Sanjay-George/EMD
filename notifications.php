<?php
session_start();
//session_destroy();
require('connection.php');
require('config.php');
require('loginCheck.php');

//// FETCH LIST OF MEDICINES 
//$query = "SELECT DISTINCT m_medicine FROM `medicine` ORDER BY m_medicine";
//$result = mysqli_query($link, $query);
//$medicines = array();
//if (mysqli_num_rows($result) != 0) 
//{ 
//	while($row = mysqli_fetch_array($result)){
//        array_push($medicines, $row['m_medicine']);
//    }
//}

// FETCH NOTIFICATIONS
$query = "SELECT orders.order_id, orders.totalAmount, orders.address, orderdetails.medicine, COUNT(orderdetails.medicine) AS medCount FROM `orders` INNER JOIN `orderdetails` ON orders.order_id = orderdetails.order_id WHERE orders.u_id = ".$_COOKIE['id']." AND orders.payStatus=1 GROUP BY orders.order_id ";
echo $query;
$result = mysqli_query($link, $query);
$notifications = array();
if (mysqli_num_rows($result) != 0){
    while ($row = mysqli_fetch_array($result)){
        array_push($notifications, $row);
    }
}


?>


<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>EMD - Search for a Disease </title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="materialize/css/materialize.css">
    <link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-3.2.0.js"></script>

</head>
<body >
    <nav>
        <div class="nav-wrapper black">
            <a href="#" class="brand-logo">EMD</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li class="waves-effect waves-light"><a href="index.php">Home</a></li>
                <li class="waves-effect waves-light"><a href="loginPage.php">Login/Register</a></li>
                <li class="waves-effect waves-light hide"><a href="notifications.php">Notifications</a></li>
                <li class="waves-effect waves-light hide"><a href="index.php?logout=1">Logout</a></li>
            </ul>
        </div>
    </nav>
    
    <?php
        if(array_key_exists("id", $_SESSION)){
    ?>
    <script>
            $("nav").find("ul li:nth-child(2)").addClass("hide");
            $("nav").find("ul li:nth-child(3)").removeClass("hide");
            $("nav").find("ul li:nth-child(4)").removeClass("hide");
    </script>    
    
    <?php
        }
    ?>
    
    
    <div class='container' style="align-items:flex-start; position:relative; top:100px;" >
        <div class="row">
            <div class="col m12" style="margin-top:50px;" >
                <table style="font-size:85%;">
                    <th class="center">Order Id</th>
                    <th class="center">Medicines</th>
                    <th class="center">Delivery Address</th>
                    <th class="center">Total Amount</th>

                    <!-- repeat this -->
                    <tr>
                        <td class="center"></td>
                        <td class="center"></td>
                        <td class="center"></td>
                        <td class="center"></td>
                    </tr>
                </table>
            </div>
        </div>  
    </div>
  
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyAKAptIgIHps-YAQqyxKyNc2jqhL2upJjQ"></script>
   
    
    
<script src="materialize/js/materialize.js"></script>
<script>
    

    
$(document).ready(function(){
    
    // FETCH NOTIFICATIONS
    var notifications = <?php echo json_encode($notifications); ?>;
    console.log(notifications);
    
    for(var i=0; i<notifications.length; i++){
        $("table").append("<tr><td class='center'>"+notifications[i].order_id+"</td><td class='center'>"+notifications[i].medicine+" + "+(notifications[i].medCount - 1)+" others</td><td class='center'>"+notifications[i].address+"</td><td class='center'>&#8377;"+notifications[i].totalAmount+"</td></tr>");
    }
    
    
//    // FETCH MEDICINE DATA AND DISPLAY
//    var medicinesArray = <?php echo json_encode($medicines);?>;
//    for (var i=3; i<medicinesArray.length; i++){
//        $("select[name='medicines']").append("<option value='"+medicinesArray[i]+"'>"+medicinesArray[i]+"</option>");
//    }
    

    
    
    // initialize components
    $('select').material_select();

 
});


</script>
</body>
</html>