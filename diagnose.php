<?php 
include ('connection.php');
session_start();
error_reporting(0);
//$_COOKIE['zip']=$_POST['zip'];
setcookie("zip", "".$_POST['zip'], time() + 60*60*24*15);
echo $_COOKIE['zip'];
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>EMD - Search your way to death </title>
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="materialize/css/materialize.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		
		
		<?php
		$flag=0;
		try {
			$sql = $db->query("SELECT DISTINCT `d_symptoms` FROM `diseases`");
			$sym= [];
			while($row = $sql->fetch()){
				array_push($sym, $row['d_symptoms']);
			}
		} catch(PDOException $e){
			echo 'connection failed: '.$e->getMessage();
		}
		$symptom = $sym;
		//$symptom= array_unique($sym);
		$arrlength = count($symptom);
		/* for($x = 0; $x < $arrlength; $x++) {
		echo $symptom[$x];
		echo "<br>";
		} */
		?>

		<nav>
        <div class="nav-wrapper black">
            <a href="index.php" class="brand-logo">EMD</a>
        </div>
        </nav>
		
		<div class='container' style="justify-content:center;">
			<!-- <div class="row"> -->
				<div class='col m12 z-depth-1 hoverable sub-panel' style="width:60%;">
					<div class="row">
						<div class='col m12'>
							<form class='col m12'>
								<div class='col m12 input-field' id='sym-dropdown'>
									<select id='symptom' name='0' multiple >
										<option value='0' disabled>Please select your symptoms</option>
										<?php for($x = 0; $x < $arrlength; $x++)
										{  ?>
										<option><?php echo $symptom[$x]; ?></option>
										<?php }   ?>
									</select>
									<label>Please select your symptoms</label>
								</div>
								
                                <!--	<button type="button" name="Add" class='waves-effect waves-light btn light-blue'>Add more</button> -->
								
								<!--	<div class="col m12 center">
										<button type='button' name="Add" class='waves-effect waves-light btn light-blue'>Add more</button>
								</div>  -->
								<div class="col m12 center">
									<button name="diagnosis" class='waves-effect waves-light btn light-blue'>Diagnose</button>
								</div>
							</form>
						</div>
					</div>
				<!-- </div> -->
				
			</div>
		</div>
		<script src="js/jquery-3.2.0.js"></script>
		<script src="materialize/js/materialize.js"></script>
		<script>
		/*function add_dropdown() {
		var arr = <?php echo json_encode($symptom); ?>;
		var s = $('<select/>');
			for( var val in arr){
			$('<option/>', {value: val, text: arr[val]}).appendTo(s);
				}
				s.appendTo("select[name='symptom']");
				} */
				/*
				var c=0;
				$("button[name='Add']").click(function(){
				console.log("hi ");
				console.log($(this).find('#symptom').val());
				c++;
				alert(c);
				var div = $('#sym-dropdown').clone();
				div.find('#symptom').attr('name',c);
				div.find('option[value="0"]').prop("selected", true);
				$(this).parent().before(div);
				});
				*/
				var selectValues = new Array();
				$("button[name='diagnosis'").click(function(){
				
				$.each($('#symptom option:selected'), function(){
				selectValues.push($(this).val());
				});
				// alert("You have selecte" + selectValues.join(","));
				// alert(JSON.stringify(selectValues));
				$.ajax({
				type:"POST",
				datatype: "json",
				url: "finddisease.php",
				data: JSON.stringify(selectValues),
				success: function(e){
				//alert(e);
					
					window.location.replace('./results.php?d='+encodeURIComponent(JSON.parse(JSON.stringify(e))));
				}
				});
				});
				$(document).ready(function(){
				$('select').material_select();
				
				
				
				});
				
				
				</script>
			</body>
		</html>