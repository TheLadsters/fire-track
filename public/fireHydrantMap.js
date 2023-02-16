
$(document).ready(function() {
  //variables
  const centerPoint = new google.maps.LatLng(10.352029690791822, 123.91910785394363);
  const hydrantImg = "images/fire-hydrant.png";
  let hydrantMarker;
  let hydrantMarkerArr = [];
  let hydrantListenerHandler;
  //variables
  
// creation of MAP
  var hydrantMap = new google.maps.Map(document.getElementById("firehydrantmap"), {
      center: centerPoint,
      zoom: 16,
    });
// end of creation of MAP
  
  
// function for creating Marker on Google Maps
function createMarker(longitude, latitude){
      let newMarker = new google.maps.Marker({
        position: new google.maps.LatLng(longitude, latitude),
        map: hydrantMap,
        icon: {
                url: hydrantImg,
                scaledSize: new google.maps.Size(28, 28)
              },
        animation: google.maps.Animation.DROP
  });
      return newMarker;
    }

// function for adding Marker Listener
function addMarkerListener(hydrantMarker, markerContent) {
      let infowindow = new google.maps.InfoWindow({
        content: markerContent,
        ariaLabel: "Uluru",
      });
  
      hydrantMarker.addListener('click', function(e) {
        infowindow.open(hydrantMap,hydrantMarker);
      });
      
}


// code to show hydrant markers on map
$.ajax({
  url: 'admin-hydrant-map/showMapHydrants',
  type: 'get',
  dataType: 'json',
    success: function(response){
    for (let i = 0; i < response['hydrant'].length; i++) {
    
      let longitude = parseFloat(response['hydrant'][i].longitude).toFixed(15);
      let latitude = parseFloat(response['hydrant'][i].latitude).toFixed(15);
      let hydrantAddress = response['hydrant'][i].address;
      let hydrantType = response['hydrant'][i].name;
      let hydrantStatus = response['hydrant'][i].status;
      let hydrantPhoto = response['hydrant'][i].img_url;

      let markerContent = `
      <div style="max-width: 300px;">
        <p>
          <img src='${hydrantPhoto}' style="width:300px; height:200px;" />
        </p>

        <p>
          <b>Address:</b> ${hydrantAddress}
        </p>

        <p>
          <b>Type:</b> ${hydrantType}
        </p>

        <p>
          <b>Status:</b> ${hydrantStatus}
        </p>
      </div>
      `;
    
      hydrantMarker = createMarker(longitude, latitude);
        
        addMarkerListener(hydrantMarker, markerContent);
        hydrantMarkerArr.push(hydrantMarker);
    }
    
  },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert("Error Loading Google Map Markers");
  }
});
// END OF CODE for showing hydrant markers on map

});
