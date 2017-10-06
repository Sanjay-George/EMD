<?php require('connection.php');
session_start();
// error_reporting(0);
// $zip= $_SESSION['zip'];
// echo $_SESSION['zip'];
$data = file_get_contents('php://input');
$myJson = json_decode($data);
$query = 'SELECT DISTINCT `d_disease` FROM `diseases` WHERE `d_symptoms` IN (';
for($i=0; $i<sizeof($myJson)-1; $i++){
	$query = $query.' "'.$myJson[$i].'", ';
}
$query = $query.' "'.$myJson[$i].'") GROUP BY `d_disease` HAVING COUNT(*)='.sizeof($myJson);
$sql = $db->query($query);
$string = "";
if($row=$sql->fetch()){
	$string.= $row['d_disease'];
	while($row = $sql->fetch()){
		$string.= ",".$row['d_disease'];
	}
}
echo $string;
session_write_close();
?>
