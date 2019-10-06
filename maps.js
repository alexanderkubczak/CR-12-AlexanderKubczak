<script>
      var map;
      function initMap() {
       var mapOptions =  {
          center: {lat: 48.210033, lng: 16.363449},
          zoom: 12,
          mapTypeId: 'roadmap'
        };
      var map = new google.maps.Map(document.getElementById('map'), mapOptions);
      var codeFactory1 = {lat: 48.203240,lng: 16.325620};
      var codeFactory2 = {lat: 48.194480,lng: 16.362070};
      var marker = new google.maps.Marker({
        position: codeFactory1,
        map: map,
        title: 'Code Factory'
      });
      
      var marker = new google.maps.Marker({
        position: codeFactory2,
        map: map,
        title: 'Code Factory'
      });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?&callback=initMap"
    async defer></script>