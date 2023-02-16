$(document).ready(function() {
  // CODE FOR MARKERS TO SHOW ON MAP
    function addMarkerListener(marker, infowindow) {
  
      marker.addListener('click', function(e) {
        infowindow.open(map,marker);
      });
    }
  
    var centerPoint = new google.maps.LatLng(10.352029690791822, 123.91910785394363);
    const fireImg = "images/fire.png";
    
    var map = new google.maps.Map(document.getElementById("firealertmap"), {
      center: centerPoint,
      zoom: 16,
      mapId: 'c887c451d0ae25a6'
    });
  
    var marker;
  
  $.ajax({
      url: 'fire-alert-map/showMapAlerts',
      type: 'get',
      dataType: 'json',
      success: function(response){
        console.log(response['alert'][0].latitude);
  
      for (let i = 0; i < response['alert'].length; i++) {
  
        let longitude = parseFloat(response['alert'][i].longitude).toFixed(15);
        let latitude = parseFloat(response['alert'][i].latitude).toFixed(15);
        let fireStatus = "<b>Status: </b>" + response['alert'][i].status;
  
        marker = new google.maps.Marker({
              position: new google.maps.LatLng(longitude, latitude),
              map: map,
              title: response['alert'][i].fire_location,
              icon: {
                      url: fireImg,
                      scaledSize: new google.maps.Size(38, 31)
                    },
              animation: google.maps.Animation.DROP
      });
  
        var infowindow = new google.maps.InfoWindow({
              content: fireStatus,
              ariaLabel: "Uluru",
            });
          
          addMarkerListener(marker, infowindow);
  
  }
  
    },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
  });
  
    
  });