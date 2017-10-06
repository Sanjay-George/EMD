<?php
//error_reporting(0);  
require('connection.php');
require('config.php');
require('loginCheck.php');

session_start();
$disList = $_SESSION['disList'];
$i=0;
$query = 'SELECT m_medicine FROM medicine WHERE m_disease IN(';
for($i = 0 ; $i<sizeof($disList)-1; $i++)
    $query = $query.' "'.$disList[$i].'", ';
$query = $query.' "'.$disList[$i].'")';

$medicines = array();
$sql = $db->query($query);

while($row = $sql->fetch())
    array_push($medicines, $row['m_medicine']);
?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>EMD - Search your way to death </title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="materialize/css/materialize.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.2.0.js"></script>

</head>
<body>
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
    <div class='container' style="justify-content:center;">
            <div class='col m6 z-depth-1 hoverable sub-panel' style="width:60%;">
                <div class="row">
                    <div class='col m12'>
                        <form id="purchase" class='col m12'>
                            <div class='col m12 input-field'>
                                <select name='medicines' multiple>
                                    <option value="" disabled selected>Select Medicines</option>
<!--
                                    <option value="paracetamol">Paracetamol</option>
-->
                                   
                                </select>
                                <label>Medicine</label>
                            </div>
                            <div class="col m12 center" style="padding-top:20px; padding-bottom:30px;">
                                <button name="purchase" class='waves-effect waves-light btn light-blue darken-1' disabled><i class='material-icons' >shopping_cart</i><span>purchase</span></button>
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
    
    
    
    
    
<script src="materialize/js/materialize.js"></script>
<script>
    
$(document).ready(function(){

    var medicinesArray = <?php echo json_encode($medicines);?>;
    console.log(medicinesArray);
    for (var i=0; i<medicinesArray.length; i++){
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