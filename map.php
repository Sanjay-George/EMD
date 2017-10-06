<?php
session_start();
//$la= $_POST['lat'];
//$lo= $_POST['long'];
//echo $la;
$zip = $_COOKIE['zip'];
//echo $zip;
//echo $_SESSION['zip'];
//$_SESSION['zip']="411057";

function getLnt($zip){
$url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&sensor=false";
//json_encode($url);
$result_string = file_get_contents($url);
$result = json_decode($result_string, true);
$result1[]=$result['results'][0];
$result2[]=$result1[0]['geometry'];
$result3[]=$result2[0]['location'];
return $result3[0];
}


 $val = getLnt($_COOKIE["zip"]);
 
 $lla= $val['lat'];
 $llo= $val['lng'];
 //echo "Latitude: ".$lla."<br>";
 //echo "Longitude: ".$llo."<br>";

?>



<html>
  <head>
    <title>Place searches</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=yes">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
		width: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
		width: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
	
    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

     // var map;
     // var infowindow;
	 /* var latt;
	  var longi;
	*/ 

var latt;
var longi;	
	
function GetLocation(callback) {
			
            var geocoder = new google.maps.Geocoder();
			
            //var address = <?php echo $_COOKIE['zip']; ?>;
			//alert(address);
			var address= "395007";
			//document.write(address);
            geocoder.geocode({ 'address': address }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
					callback(results[0].geometry.location.lat());
                    callback(results[0].geometry.location.lng());
                    //var latitude = results[0].geometry.location.lat();
                    //var longitude = results[0].geometry.location.lng();
					 //saveData(latitude,longitude);
					 //document.getElementById("lat").value= latitude;
					 //document.getElementById("long").value= longitude;
                    
                } else {
                    alert("Request failed.")
                }
				//document.write(latitude);
			
            });
			/*var la= document.getElementById("lat").value;
		 var lo= document.getElementById("long").value;
		 
		alert("Latitude: " + la + "\nLongitude: " + lo);
			console.log(la);*/
			
        }; 
		

      function initMap() {
		/*GetLocation(function(addr){
				//latt= addr;
				//alert(latt);
				
			});
		
		 alert(addr);
		//alert("Latitude: " + la + "\nLongitude: " + lo);*/
		latt= <?php echo $lla;?>;
		longi= <?php echo $llo;?>;
		var la= parseFloat(latt);
		var lo= parseFloat(longi);
		//alert(lo);
        var pyrmont = {lat: la, lng:lo};

        map = new google.maps.Map(document.getElementById('map'), {
          center: pyrmont,
          zoom: 12
        });

        infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
          location: pyrmont,
          radius: 5000,
          type: ['hospital']
        }, callback);
      }
	
        
      function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
          }
        }
      }

      function createMarker(place) {
        var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
        });
      }
    </script>
  </head>
  <body>
   <input type= "text" hidden id="lat" name="lat">
		<input type= "text" hidden id="long" name="long">
    <div id="map"></div>
	
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKAptIgIHps-YAQqyxKyNc2jqhL2upJjQ&libraries=places&callback=initMap" async defer></script>
  </body>
</html>