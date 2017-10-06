<?php 
include('connection.php');
session_start();
$zip = $_COOKIE['zip'];
echo $zip;
$data = file_get_contents('php://input');
$qstring = $_GET['d'];
$data1 = urldecode($qstring);
//$myJson = json_decode($data);
//echo $data1;
$disease_arr = explode(",", $data1);
// for($i=0; $i<sizeof($disease_arr);$i++)
// echo $disease_arr[$i].PHP_EOL;
// echo $i;

$_SESSION['disList'] = $disease_arr;
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>EMD - Search your way to death </title>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="materialize/css/materialize.css">
	<link rel="stylesheet" href="css/style.css">
<style>
    h3{
        text-transform: uppercase;
        font-size : 160%;
        letter-spacing: 1px;
        font-weight: 300;
    }    
    p{
        margin-top:5px;
        margin-bottom:5px;
    }
</style>
</head>
<body>
	<nav>
		<div class="nav-wrapper black">
			<a href="index.php" class="brand-logo">EMD</a>
		</div>
	</nav>
	<div class='container'>
		<div class='row'>
			<div class='col m6 l6 z-depth-1 hoverable sub-panel' id='disease'>
				<div class="row">
					<div class='col m12'>
						<h3>Possible Diseases</h3>
						<div id='diseases'>
						</div>
					</div>
				<div class="col m12 center" style="padding-top:20px; padding-bottom:30px;">
                    <button name="purchase" class='waves-effect waves-light btn light-blue darken-1'><i class='material-icons'>shopping_cart</i><span>purchase</span></button>
				</div>
				</div>
			</div>

			<div class='col m6 l6 z-depth-1 hoverable sub-panel' id="maps">
					<!-- <div class="row">
						<div class='col l6' >
							
						</div>
					</div> -->
            </div>
			<!-- <div class='col m6 z-depth-1 hoverable sub-panel' id='maps'>
				
			</div> -->
		</div>    
	</div>
	
	
<script src="js/jquery-3.2.0.js"></script>
<script src="materialize/js/materialize.js"></script>
<script>


$(document).ready(function(){
	var diseaseArray = <?php echo json_encode($disease_arr);?>;
	console.log(diseaseArray);
	for(var i=0; i<diseaseArray.length; i++){
		$('#diseases').append('<p class="col m12">'+diseaseArray[i]+"</p>");
	}
	//$('#disease').hide();
	$('select').material_select();
    $('#maps').load('map.php');

	$('button[name="purchase"]').click(function(e){
		window.location.href = 'pickMeds.php';
	});
 
});

</script>
</body>
</html>