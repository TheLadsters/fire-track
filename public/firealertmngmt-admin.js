
$(document).ready(function() {

  // to be fixed error
  // fire-alert-management:1 Uncaught (in promise) _.pe {message: 
  // 'initMap is not a function', stack: 'Error\n    at _.pe.captureStackTrace 
  // (https://maps.…map_ids=c887c451d0ae25a6&callback=initMap:207:279', name: 'InvalidValueError'}
  //   function initMap(){}

// global variables 
var centerPoint = new google.maps.LatLng(10.352029690791822, 123.91910785394363);
const fireImg = "images/fire.png";
let flag = false;


// CODE FOR MARKERS TO SHOW ON MAP
  function addMarkerListener(marker, infowindow) {

    marker.addListener('click', function(e) {
      infowindow.open(map,marker);
    });
  }
  
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

// add fire alert button js START
const myLatlng = { lat: -25.363, lng: 131.044 };

$("#add-firealert").click(function(){

  // SHOULD TOGGLE DELETE ADD ENTIRE LIST INSTEAD
  if(flag){
    $(this).prop('id', 'add-firealert');
    $(".middle-details").empty();


    // $(".map-controls li:nth-child(1)").append(
    // `
    // <li> 
    //     <a id="edit-firealert">
    //       <i class='bx bx-edit'></i>
    //       Edit Fire Alert
    //     </a>
    // </li>
    // `);

    console.log('flag is true');
    
  }else{
    map.addListener("click", (mapsMouseEvent) => {
      // Create a new InfoWindow.
      var infoWindow = new google.maps.InfoWindow({
        position: mapsMouseEvent.latLng,
      });
  
      infoWindow.setContent(
        JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
      );
  
      infoWindow.open(map);
    });
  
    $(".middle-details").empty();
    $(".middle-details").append(
      `
      <div class="alarm-add-notif">
      <h5>Click on any location on the map to add a fire alert.</h5>
      </div>
      `
    );
  
    $(this).empty();
    $(this).append(
      `
      <i class="fa-sharp fa-solid fa-ban"></i>
      Cancel
      `  
    );
  
    $(this).prop('id', 'cancel-firealert');
  
    $("li #delete-firealert").remove();
    console.log('flag is false');
  }
  flag = !flag;

  });
// add fire alert button js END
  
});



// for creating rows in fire alert manager
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