$(document).ready(function() {
    // CODE FOR MARKERS TO SHOW ON MAP
      function addMarkerListener(marker, infowindow) {
    
        marker.addListener('click', function(e) {
          infowindow.open(map,marker);
        });
      }
    
      const centerPoint = new google.maps.LatLng(10.352029690791822, 123.91910785394363);
      const hydrantImg = "images/fire-hydrant.png";
      let marker;
      
      let map = new google.maps.Map(document.getElementById("firehydrantmap"), {
        center: centerPoint,
        zoom: 16,
        mapId: 'c887c451d0ae25a6'
      });
    
      
    
    $.ajax({
        url: 'fire-hydrant-map/showMapHydrants',
        type: 'get',
        dataType: 'json',
        success: function(response){
    
        for (let i = 0; i < response['hydrant'].length; i++) {
    
          let longitude = parseFloat(response['hydrant'][i].longitude).toFixed(15);
          let latitude = parseFloat(response['hydrant'][i].latitude).toFixed(15);
          let hydrantAddress = response['hydrant'][i].address;
          let hydrantType = response['hydrant'][i].name;
          let hydrantStatus = response['hydrant'][i].status;
          let hydrantImgUrl = response['hydrant'][i].img_url;

          let hydrantPhoto = (hydrantImgUrl) ? assetUrl + '/' + response['hydrant'][i].img_url : "images/no_img_available.png";


        let markerContent = `
        <div style="max-width: 300px;">
            <p>
            <img src="${hydrantPhoto}" id="imageMarker" style="width:300px; height:200px;" />
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
    
          marker = new google.maps.Marker({
                position: new google.maps.LatLng(longitude, latitude),
                map: map,
                icon: {
                        url: hydrantImg,
                        scaledSize: new google.maps.Size(28, 28)
                      },
                animation: google.maps.Animation.DROP
        });
    
          var infowindow = new google.maps.InfoWindow({
                content: markerContent,
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