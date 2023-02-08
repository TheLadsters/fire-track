
$(document).ready(function() {
// CODE FOR MARKERS TO SHOW ON MAP
  function addMarkerListener(marker, infowindow) {

    marker.addListener('click', function(e) {
      infowindow.open(map,marker);
    });
  }

  var centerPoint = new google.maps.LatLng(10.352029690791822, 123.91910785394363);
  const fireImg = "images/fire.png";
  
  var map = new google.maps.Map(document.getElementById("firelertmapmanagement"), {
    center: centerPoint,
    zoom: 16,
    mapId: 'c887c451d0ae25a6'
  });

  var marker;

$.ajax({
    url: 'fire-alert-management/showMapAlerts',
    type: 'get',
    dataType: 'json',
    success: function(response){
      console.log(response['alert'][0].latitude);

    for (let i = 0; i < response['alert'].length; i++) {

      let longitude = parseFloat(response['alert'][i].longitude).toFixed(15);
      let latitude = parseFloat(response['alert'][i].latitude).toFixed(15);
      let fireStatus = response['alert'][i].status;

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

// for creating
function createRows(response){
  var len = 0;
  $('table tbody').empty(); // Empty <tbody>
  if(response['data'] != null){
     len = response['data'].length;
  }

  if(len > 0){
    for(var i=0; i<len; i++){
       var fire_location = response['data'][i].fire_location;
       var longitude = response['data'][i].longitude;
       var latitude = response['data'][i].latitude;
       var status = response['data'][i].status;

    var tr_str =
      `<tr>
        <td>
            <span class='custom-checkbox'>
              <input type='checkbox' id='checkbox1' name='options[]' value='1'>
              <label for="checkbox1"></label>
            </span>
        </td>

        <td>${fire_location}</td>
        <td> ${longitude} </td>
        <td>${latitude}</td>
        <td>${status}</td>

        <td>
          <a class="edit" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i></a>
          <a class="delete" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal"><i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete" ></i></a>
        </td>
       </tr>`;

       $(".table tbody").append(tr_str);
    }
  }else{
     var tr_str = "<tr>" +
       "<td align='center' colspan='4'>No record found.</td>" +
     "</tr>";

     $(".table tbody").append(tr_str);
  }
} 


$("#add-firealert").click(function(){
console.log('hello');

});


$("#firealert-manager").click(function(){
   // AJAX GET request
   $.ajax({
    url: 'fire-alert-management/getAlertTable',
    type: 'get',
    dataType: 'json',
    success: function(response){

       createRows(response);
    }
  });

  $(".fireAlertManagerModal").modal('show');
});