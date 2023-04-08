function initMap(){
    map = new google.maps.Map(document.getElementById("firealertmap"), {
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

      $.ajax({
        url: 'fire-alert-map/showMapAlerts',
        type: 'get',
        dataType: 'json',
        success: function(response){
            console.log(response);
    
            for (let i = 0; i < response['alert'].length; i++) {
  
              let longitude = parseFloat(response['alert'][i].longitude).toFixed(15);
              let latitude = parseFloat(response['alert'][i].latitude).toFixed(15);
              let location_title = response['alert'][i].fire_location;
              let fireStatus = "<b>Status: </b>" + response['alert'][i].status;
              let fireLocation = "<b>Address: </b>" + response['alert'][i].fire_location;
              let markerContent = `
              <div style="max-width: 200px; color:black;">
                <p>
                  ${fireStatus}
                </p>
      
                <p>
                  ${fireLocation}
                </p>
              </div>
              `;
    
        let marker = new google.maps.Marker({
                position: new google.maps.LatLng(longitude, latitude),
                map: map,
                icon: {
                        url: hydrantImg,
                        scaledSize: new google.maps.Size(28, 28)
                      },
                animation: google.maps.Animation.DROP
        });

        markerArr.push(marker);
    
         let infowindow = new google.maps.InfoWindow({
                content: markerContent,
                ariaLabel: "Uluru",
              });

            
            markerArr[i].addListener('click', function(e) {
                infowindow.open(map ,markerArr[i]);
            });
    
    }
    
      },
        error: function(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          alert(err.Message);
        }
    });
}

