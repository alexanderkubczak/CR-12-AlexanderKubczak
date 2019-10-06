<?php
ob_start();
session_start();
require_once 'dbconnect.php';


if (isset($_SESSION['user'])=="") {
 header("Location: login.php");
 exit;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Party Organizer</title>
 <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
</head>
<body>
<?php include 'components/header.php'; ?>
<?php include 'components/showclubs.php'; ?>


<div id="map"></div>
    
    <script>
      var map;							
      function initMap() {
       var mapOptions =  {
          center: {lat: 48.210033, lng: 16.363449},
          zoom: 12,
          mapTypeId: 'roadmap'
        };
      var map = new google.maps.Map(document.getElementById('map'), mapOptions);
      var forelle = {lat: 48.234462, lng: 16.361023};
      var fluc = {lat: 48.217918,lng: 16.393286};
      var flex = {lat: 48.218033,lng: 16.370919};
      var marker = new google.maps.Marker({
        position: forelle,
        map: map,
        title: 'Grelle Forelle'
      });
      
      var marker = new google.maps.Marker({
        position: fluc,
        map: map,
        title: 'Fluc'
      });

      var marker = new google.maps.Marker({
        position: flex,
        map: map,
        title: 'Flex'
      });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?&callback=initMap"
    async defer></script>
  </body>

</body>
</html>