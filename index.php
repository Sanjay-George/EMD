<?php
session_start();
//session_destroy();
require('connection.php');
require('config.php');
require('loginCheck.php');

// FETCH LIST OF MEDICINES 
$query = "SELECT DISTINCT m_medicine FROM `medicine` ORDER BY m_medicine";
$result = mysqli_query($link, $query);
$medicines = array();
if (mysqli_num_rows($result) != 0) 
{ 
	while($row = mysqli_fetch_array($result)){
        array_push($medicines, $row['m_medicine']);
    }
}
//print_r($medicines);
//echo json_encode($medicines);


echo $_SESSION['id'];
//$json = json_encode($array); // php to json

//$array2 = json_decode('[{"name":"med1","qty":"2"},{"name":"med2","qty":"2"}]', true); // json to php array
//print_r($array2);

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
    
    
    <div class='container' >
        <div class='row'>
            <div class='col m6 z-depth-1 hoverable sub-panel' >
                <div class="row">
                    <div class='col m12'>
                        <form class='col m12' action="diagnose.php" method="POST">
                            <div class='col m12 input-field'>
                                <select required>
                                    <option value="" disabled selected>Age Group</option>
                                    <option>0-15</option>
                                    <option>16-40</option>
                                    <option>41-80</option>
                                </select>
                                <label>Age Group</label>
                            </div>
                            <div class='col m12 input-field'>
                                <label>Zipcode</label>
                                <input type='text' pattern="[0-9]+" name="zip" placeholder="Enter Zipcode" required>
                            </div>
                            <div class='col m12 input-field'>
                                <select required>
                                    <option value="" disabled selected>Choose your gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>other</option>
                                </select>
                                <label>Gender</label>
                            </div>
							<input type= "text" hidden id="lat" name="lat">
							<input type= "text" hidden id="long" name="long">
                            <div class="col m12 center" style="padding-top:20px; padding-bottom:30px;">
                                <button name="diagnose" onclick="GetLocation()" value="Get Location" class='waves-effect waves-light btn light-blue darken-1'><i class='material-icons'>visibility</i><span>Diagnose</span></button>
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
                                <select name='medicines' multiple required>
                                    <option value="" disabled selected>Select Medicines</option>
<!--
                                    <option value="paracetamol">Paracetamol</option>
-->
                                   
                                </select>
                                <label>Medicine</label>
                            </div>
                            <div class="col m12 center" style="padding-top:20px; padding-bottom:30px;">
                                <button name="purchase" class='waves-effect waves-light btn light-blue darken-1' disabled><i class='material-icons'>shopping_cart</i><span>purchase</span></button>
                            </div>
                             
                            <?php
                                if(array_key_exists("id", $_SESSION)){
                            ?>
                            <script>
                                $("button[name='purchase']").removeAttr("disabled");
                            </script>    

                            <?php
                                }
                                else
                                    echo "<div class='col m12 center warning'>Please login first</div>";
                            ?>
    
                            
                        </form>
                    </div>
                </div>
            </div>
            
            
            
        </div>    
    </div>
  
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyAKAptIgIHps-YAQqyxKyNc2jqhL2upJjQ"></script>
   
    
    
<script src="materialize/js/materialize.js"></script>
<script>
    

    
$(document).ready(function(){
    // FETCH MEDICINE DATA AND DISPLAY
    var medicinesArray = <?php echo json_encode($medicines);?>;
    for (var i=3; i<medicinesArray.length; i++){
        $("select[name='medicines']").append("<option value='"+medicinesArray[i]+"'>"+medicinesArray[i]+"</option>");
    }
    
    // PURCHASE BUTTON CLICK
    $('button[name="purchase"]').click(function(e){
        e.preventDefault();
        var medObject = JSON.stringify($('#purchase').find('select').val());
        console.log(medObject);
        
        $.ajax({
            url : "selectMedicines.php",
            method : "GET",
            data : {medObject:medObject},
        })
        .done(function(response){
            console.log(response);
            // redirect to next page
            window.location.href="payment1.php";
        });
    })
    
    
    
    // initialize components
    $('select').material_select();

 
});


</script>
</body>
</html>