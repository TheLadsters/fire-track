
const centerPoint = new google.maps.LatLng(10.352029690791822, 123.91910785394363);
const hydrantImg = "images/fire-hydrant.png";
let marker;
let markerArr = [];
let listenerHandler;

var hydrantMap = new google.maps.Map(document.getElementById("firehydrantmap"), {
    center: centerPoint,
    zoom: 16,
  });



function createMarker(longitude, latitude){
    let newMarker = new google.maps.Marker({
      position: new google.maps.LatLng(longitude, latitude),
      map: map,
      title: location_title,
      icon: {
              url: hydrantImg,
              scaledSize: new google.maps.Size(38, 31)
            },
      animation: google.maps.Animation.DROP
});
    return newMarker;
  }

function addMarkerListener(marker, fireStatus) {
    let infowindow = new google.maps.InfoWindow({
      content: fireStatus,
      ariaLabel: "Uluru",
    });

    marker.addListener('click', function(e) {
      infowindow.open(hydrantMap,marker);
    });
    
  }

  $(document).ready(function() {

    // $.ajax({
    //     url: 'fire-alert-management/showMapHydrants',
    //     type: 'get',
    //     dataType: 'json',
    //     success: function(response){
    //     for (let i = 0; i < response['hydrant'].length; i++) {
    
    //       let longitude = parseFloat(response['hydrant'][i].longitude).toFixed(15);
    //       let latitude = parseFloat(response['hydrant'][i].latitude).toFixed(15);
    //       let fireStatus = "<b>Status:</b> " + response['hydrant'][i].status;
    //     //   let location_title = response['hydrant'][i].fire_location;
    
    //       marker = createMarker(longitude, latitude);
        
    //         addMarkerListener(marker, fireStatus);
    //         markerArr.push(marker);
    // }
    
    //   },
    //     error: function(xhr, status, error) {
    //       var err = eval("(" + xhr.responseText + ")");
    //       alert("Error Loading Google Map Markers");
    //     }
    // });

  });
