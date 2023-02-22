
function initMap(){

// global variables 
var centerPoint = new google.maps.LatLng(10.352029690791822, 123.91910785394363);
const fireImg = "images/fire.png";
var marker;
let markerArr = [];
let listenerHandler;
let alertGeocoder;

////// CODE FOR MARKERS TO SHOW ON MAP //////
  function addMarkerListener(marker, markerContent) {
    let infowindow = new google.maps.InfoWindow({
      content: markerContent,
      ariaLabel: "Uluru",
    });

    marker.addListener('click', function(e) {
      infowindow.open(map,marker);
    });
    
  }

  function createMarker(longitude, latitude, location_title){
    let newMarker = new google.maps.Marker({
      position: new google.maps.LatLng(longitude, latitude),
      map: map,
      title: location_title,
      icon: {
              url: fireImg,
              scaledSize: new google.maps.Size(38, 31)
            },
      animation: google.maps.Animation.DROP
});
    return newMarker;
  }


  var map = new google.maps.Map(document.getElementById("firelertmapmanagement"), {
    center: centerPoint,
    zoom: 16,
    mapId: 'c887c451d0ae25a6'
  });

  // creation of GEOCODER
  alertGeocoder = new google.maps.Geocoder();
// end of creation of GEOCODER

$.ajax({
    url: 'admin/fire-alert-management/showMapAlerts',
    type: 'get',
    dataType: 'json',
    success: function(response){
    for (let i = 0; i < response['alert'].length; i++) {

      let longitude = parseFloat(response['alert'][i].longitude).toFixed(15);
      let latitude = parseFloat(response['alert'][i].latitude).toFixed(15);
      let fireStatus = "<b>Status: </b> " + response['alert'][i].status;
      let fireLocation = "<b>Address: </b>" + response['alert'][i].fire_location;
      let markerContent = `
        <div style="max-width: 300px;">
          <p>
            ${fireStatus}
          </p>

          <p>
            ${fireLocation}
          </p>
        </div>
        `;

      let location_title = response['alert'][i].fire_location;

      marker = createMarker(longitude, latitude, location_title);
    
        addMarkerListener(marker, markerContent);
        markerArr.push(marker);
}

  },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert("Error Loading Google Map Markers");
    }
});
////// END OF CODE FOR MARKERS TO SHOW ON MAP //////


////// GET FIRE ALERT TABLE START OF CODE //////
function getAlertTable(){
  $.ajax({
    url: 'admin/fire-alert-management/getAlertTable',
    type: 'get',
    dataType: 'json',
    success: function(response){

      createRows(response);
    }
  });

  $(".fireAlertManagerModal").modal('show');
}

$("#firealert-manager").click(function(){
  getAlertTable();
  // addCancelFcn();
});
////// GET FIRE ALERT TABLE END OF CODE //////


// TEMPLATES!
// Template for when any CRUD buttons are pressed, Cancel appears
function cancelTemplate(middleText, hiddenOptions, appendClass){
  $(".middle-details").empty();
  $(".middle-details").append(
    `
    <div class="alarm-notif">
      <h5>Click on ${middleText} a fire alert.</h5>
    </div>
    `
  );

  $(`${hiddenOptions[0]}`).hide();
  $(`${hiddenOptions[1]}`).hide();

  $(`${appendClass}`).empty();
  $(`${appendClass}`).append(
    `
      <i class="fa-sharp fa-solid fa-ban"></i>
      Cancel
    `);
}

// Template for when after cancel is pressed, CRUD buttons are shown
function crudTemplate(shownOptions, buttonClass, buttonContent){
  $(".middle-details").empty();
  $(`${shownOptions[0]}`).show();
  $(`${shownOptions[1]}`).show();

  $(`${buttonClass}`).empty();
  $(`${buttonClass}`).append(
    `
      ${buttonContent}
    `);
}


/////// ADD FIRE ALERT FUNCTION CODE START ///////
function addAlertFcn(){
 listenerHandler = map.addListener("click", (mapsMouseEvent) => {

    let longlat = mapsMouseEvent.latLng.toJSON();

    //  creates a geocoder to get specified address on map
   alertGeocoder.geocode({
    'latLng': longlat
  }, function (results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      if (results[0]) {
        let alertAddress = results[0].formatted_address;
        $("#locationdetails-input").val(alertAddress);
      }
    }
  });

    // sets the longitude and latitude of the clicked part of the map
    $("#longitude-input").val(longlat.lat);
    $("#latitude-input").val(longlat.lng);
    $(".addFireAlertModal").modal("show");

  });


  cancelTemplate("any location on the map to ADD", 
  ["#edit-firealert", "#delete-firealert"], "#add-firealert");

    $("#add-firealert").off('click').on('click', addCancelFcn)
}

function addCancelFcn(){
  crudTemplate
  (
    ["#edit-firealert", "#delete-firealert"],
  "#add-firealert", `<i class='bx bx-alarm-add'></i>Add Fire Alert`
  );

  if(listenerHandler){
    google.maps.event.removeListener(listenerHandler);
  }

    $("#add-firealert").off('click').on('click', addAlertFcn)
}

$("#add-firealert").on('click', addAlertFcn);
/////// ADD FIRE ALERT FUNCTION CODE END///////
 


/////// EDIT FIRE ALERT FUNCTION CODE START///////
function editCancelFcn(){
  crudTemplate
  (
    ["#delete-firealert", "#add-firealert"],
  "#edit-firealert", `<i class='bx bx-edit'></i> Edit Fire Alert`
  );

  $.ajax({
    url: 'admin/fire-alert-management/showMapAlerts',
    type: 'get',
    dataType: 'json',
    success: function(response){

      for (let i = 0; i < response['alert'].length; i++) {

      let fireStatus = "<b>Status: </b> " + response['alert'][i].status;
      let fireLocation = "<b>Address: </b>" + response['alert'][i].fire_location;
      let markerContent = `
        <div style="max-width: 300px;">
          <p>
            ${fireStatus}
          </p>

          <p>
            ${fireLocation}
          </p>
        </div>
        `;

        google.maps.event.clearListeners(markerArr[i], "click");
  
        addMarkerListener(markerArr[i], markerContent);
      }
  },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert("Error");
    }
});

if(listenerHandler){
  google.maps.event.removeListener(listenerHandler);
}

    $("#edit-firealert").off('click').on('click', editAlertFcn)
}

function editAlertFcn(){

  $.ajax({
    url: 'admin/fire-alert-management/showMapAlerts',
    type: 'get',
    dataType: 'json',
    success: function(response){
      console.log(response);
      for (let i = 0; i < markerArr.length; i++) {
        let firealert_id = response['alert'][i].firealarm_id;
        // temporary user_id
        let user_id = 1;
        let fire_location = response['alert'][i].fire_location;
        let longitude = response['alert'][i].longitude;
        let latitude = response['alert'][i].latitude;
        let status = response['alert'][i].status;

        google.maps.event.clearListeners(markerArr[i], "click");


        listenerHandler = markerArr[i].addListener("click", (mapsMouseEvent) => {

          $("#firealert_hidden_id").val(firealert_id);
          $("#user_id").val(user_id);
          $("#edit-longitude").val(longitude);
          $("#edit-latitude").val(latitude);
          $("#edit-location").val(fire_location);
          $("#status-selector").val(status);

          $(".editFireAlertModal").modal("show");
      
        });
    }
     
  },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert("Error");
    }
});
 
   cancelTemplate("any fire icon to EDIT", 
   ["#delete-firealert", "#add-firealert"], "#edit-firealert");
 
     $("#edit-firealert").off('click').on('click', editCancelFcn);
 }


$(".edit-longlat").click(function(){

  $(".editFireAlertModal").modal("hide");
  $(".middle-details").empty();
  $(".middle-details").append(
    `
    <div class="alarm-notif">
      <h5>Click on new location to EDIT longitude and latitude of the fire alert.</h5>
    </div>
    `
  );
  for (let i = 0; i < markerArr.length; i++) {
    google.maps.event.clearListeners(markerArr[i], "click");
}
  listenerHandler = map.addListener("click", (mapsMouseEvent) => {
 

    let newLongLat = mapsMouseEvent.latLng.toJSON();

    // sets the longitude and latitude of the clicked part of the map
    $("#edit-longitude").val(newLongLat.lat);
    $("#edit-latitude").val(newLongLat.lng);

    //  creates a geocoder to get specified address on map
   alertGeocoder.geocode({
    'latLng': newLongLat
  }, function (results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      if (results[0]) {
        let newAddress = results[0].formatted_address;
        $("#edit-location").val(newAddress);
      }
    }
  });

    $(".editFireAlertModal").modal("show");
  });
  

});


$("#edit-firealert").on('click', editAlertFcn);
/////// EDIT FIRE ALERT FUNCTION CODE END///////




////// DELETE FIRE ALERT FUNCTION CODE START //////
function deleteAlertFcn(){
  
cancelTemplate("any fire icon to DELETE", 
  ["#add-firealert", "#edit-firealert"], "#delete-firealert");
  
  $.ajax({
    url: 'admin/fire-alert-management/showMapAlerts',
    type: 'get',
    dataType: 'json',
    success: function(response){
      for (let i = 0; i < markerArr.length; i++) {
        let firealert_id = response['alert'][i].firealarm_id;

        google.maps.event.clearListeners(markerArr[i], "click");
  
        listenerHandler = markerArr[i].addListener("click", (mapsMouseEvent) => {
          $("#firealert_key_id").val(firealert_id);

          $(".deleteFireAlertModal").modal("show");
      
        });
    }
     
  },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert("Error");
    }
});

    $("#delete-firealert").off('click').on('click', cancelForDeleteFcn)
}

function cancelForDeleteFcn(){

  crudTemplate
  (
    ["#add-firealert", "#edit-firealert"],
  "#delete-firealert", `<i class="far fa-trash-alt"></i> Delete Fire Alert`
  );

    $.ajax({
      url: 'admin/fire-alert-management/showMapAlerts',
      type: 'get',
      dataType: 'json',
      success: function(response){

        for (let i = 0; i < response['alert'].length; i++) {

          
      let fireStatus = "<b>Status: </b> " + response['alert'][i].status;
      let fireLocation = "<b>Address: </b>" + response['alert'][i].fire_location;
      let markerContent = `
        <div style="max-width: 300px;">
          <p>
            ${fireStatus}
          </p>

          <p>
            ${fireLocation}
          </p>
        </div>
        `;

          google.maps.event.clearListeners(markerArr[i], "click");
    
          addMarkerListener(markerArr[i], markerContent);
        }
    },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert("Error");
      }
  });


    $("#delete-firealert").off('click').on('click', deleteAlertFcn)
}

$("#delete-firealert").on('click', deleteAlertFcn);

////// DELETE FIRE ALERT FUNCTION CODE END //////


};


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

       fire_location = (fire_location) ? fire_location : `No specified location`; 

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
       "<td align='center' colspan='12'>No record found.</td>" +
     "</tr>";

     $(".table tbody").append(tr_str);
  }
} 


