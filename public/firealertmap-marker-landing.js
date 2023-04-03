 $(document).ready(function() {
    // CODE FOR MARKERS TO SHOW ON MAP
    var marker;
      function addMarkerListener(marker, infowindow) {
    
        marker.addListener('click', function(e) {
          infowindow.open(map,marker);
        });
      }
    
      const fireImg = "images/fire.png";
      
      var map = new google.maps.Map(document.getElementById("firealertmap"), {
        center: new google.maps.LatLng(10.352029690791822, 123.91910785394363),
        zoom: 16,
        mapId: 'c887c451d0ae25a6',
        disableDefaultUI: true,
        zoomControl: true
      });
    
      var input = document.getElementById('searchAlertMap');
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
  
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
  
  
        autocomplete.addListener('place_changed', function(){
  
          var place = autocomplete.getPlace();
          if(!place.geometry){
              window.alert("Autocomplete's returned place contains no geometry");
              return;
          }
  
          if(place.geometry.viewport){
              map.fitBounds(place.geometry.viewport);
          }else{
              map.setCenter(place.geometry.location);
              map.setZoom(17);
          }
  
        })
  
      
    
    
    
      
 });