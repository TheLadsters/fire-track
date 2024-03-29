
$(document).ready( function () {
  var editAlertFcn = initMap();
  var minDateAlert, maxDateAlert;

  let date_now = new Date(Date.now());
  let stringDate = `Date Accessed: ${(date_now.getMonth()+1)}/${date_now.getDate()}/${date_now.getFullYear()}`;

  function newAlertDateInputs(){
    minDateAlert = new DateTime($('#minAlert'), {
      format: 'YYYY-MM-DD'
  });
  
  maxDateAlert = new DateTime($('#maxAlert'), {
      format: 'YYYY-MM-DD'
  });
  
  }
  newAlertDateInputs();

  
  let aTable= $('#alertTable').DataTable({
    'ajax': 'admin/fire-alert-management/getAlertTable',
    dom: 'Bfrtip',
    buttons: [
      $.extend( true, {}, {
        extend: 'excelHtml5',
        title: 'Fire Alert Manager - FireTrack App',
        filename: 'Fire Alert Manager - FireTrack App',
        sheetName:'Fire Alerts in FireTrack',
        messageTop: function(){
          return `List of all the fire alerts that are inputted in the FireTrack App.
          ${minMaxAlertDateText}
          `
        } 
      ,
        messageBottom: `${stringDate}`,
        text: `<i class='bx bxs-file-export'></i> Export as Excel`,
        exportOptions: {
          columns: [ 0, 1, 2, 3, 4, 5]
      }
    }),
        $.extend( true, {}, {
          extend: 'pdfHtml5',
          title: 'Fire Alert Manager - FireTrack App',
          filename: 'Fire Alert Manager - FireTrack App',
          messageTop: function(){
            return `List of all the fire Alerts that are inputted in the FireTrack App.
            ${minMaxAlertDateText}
            `
          },
          messageBottom:`${stringDate}`,
          text: `<i class='bx bxs-file-pdf' ></i> Export as PDF`,
          exportOptions: {
            columns: [ 0, 1, 2, 3, 4, 5]
        }
      }),
    ],
    'columns': [
        {'data': 'fire_location', "width": "20%"},
        {'data': 'longitude', "width": "20%"},
        {'data': 'latitude'},
        {'data': 'status'},
        {'data' : 'created_at', visible: true, searchable: true},
        {'data': 'updated_at',  visible: true, searchable: true },
        {
          "mData": null,
          "bSortable": false,
          "mRender": function(alert, type, full) {
            return `
                    <a class="edit editColAlert" data-bs-toggle="modal" id="${alert['firealarm_id']}" data-bs-target=".editFireAlertModal">
                    <i class='bx bxs-edit-alt' style='color:#6b66f5' data-toggle="tooltip" title="Edit" ></i>                      </i>
                    </a>

                    <a class="delete deleteColAlert" data-bs-toggle="modal" id="${alert['firealarm_id']}" data-bs-target=".deleteFireAlertModal">
                    <i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete">
                    </i>
                  </a>
                  `;
          }
        }
    ],

    order : [[4, 'desc']],
  });

  $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = minDateAlert.val();
        var max = maxDateAlert.val();
        var date = new Date( data[4] );
 
        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    }
);


let minMaxAlertDateText = "";

$('#minAlert, #maxAlert').on('change', function () {
  // Gets the current daterange if there are and places it in excel and pdf
let minAlertDateInput = $("#minAlert").val();
let maxAlertDateInput =  $("#maxAlert").val();

if(minAlertDateInput == "" && maxAlertDateInput != ""){
  minMaxAlertDateText = `Time Period: Before "${maxAlertDateInput}"`;
}
else if(minAlertDateInput != "" && maxAlertDateInput ==""){
  minMaxAlertDateText = `Time Period: After "${minAlertDateInput}"`;
}
else if(minAlertDateInput == "" && maxAlertDateInput == ""){
  minMaxAlertDateText = ``;
}
else{
  minMaxAlertDateText = `Time Period From: "${minAlertDateInput}" to "${maxAlertDateInput}"`;
}
aTable.draw();

});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


// Refilter the table
$('#minAlert, #maxAlert').on('change', function () {
  aTable.draw();
});

$("#clearAlertDates").click(function(){
  $('#minAlert, #maxAlert').val("");
  newAlertDateInputs();
  aTable.clear().draw();
  aTable.ajax.reload();
  minMaxAlertDateText = "";
});

  // on clicking edit alert in fire alert management
$('#alertTable tbody').on('click', '.editColAlert', function(){
    let alert_id = $(this).attr('id');

    $.ajax({
      type: 'post',
      url: 'admin/fire-alert-management/getOneMapAlert/' + alert_id,
      dataType: 'json',    
      success: function(response){ 
        let longitude = response['data'].longitude;
        let latitude = response['data'].latitude;
        let location = response['data'].fire_location;
        let status = response['data'].status;

        $("#edit-longitude").val(longitude);
        $("#edit-latitude").val(latitude);
        $("#edit-location").val(location);
        $("#status-selector").val(status);
        $("#firealert_hidden_id").val(alert_id);
      },
      error: function(jqXHR, textStatus, errorThrown) { 
           console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
       }
    });

    // editAlertFcn();
});

// delete alert in fire alert manager
$('#alertTable tbody').on('click', '.deleteColAlert', function(){
  let alert_id = $(this).attr('id');
  $('.deleteFireAlertModal #firealert_key_id').val(alert_id);
});

});



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
    mapId: '2f892cd49e6fa90f',
    disableDefaultUI: true,
    zoomControl: true
  });

  var input = document.getElementById('alertSearchBox');
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

  // let long = parseFloat(response['alert'][0].longitude).toFixed(15);
  // let lat = parseFloat(response['alert'][0].latitude).toFixed(15);

  // creation of GEOCODER
  alertGeocoder = new google.maps.Geocoder();
// end of creation of GEOCODER

$.ajax({
    url: 'admin/fire-alert-management/showMapAlerts',
    type: 'get',
    dataType: 'json',
    success: function(response){
      if(response['alert'].length > 0){
        let long= parseFloat(response['alert'][0].longitude).toFixed(15);
        let lat = parseFloat(response['alert'][0].latitude).toFixed(15);
        let pos = new google.maps.LatLng(long, lat);
        map.setCenter(pos);
      }

    for (let i = 0; i < response['alert'].length; i++) {

      let longitude = parseFloat(response['alert'][i].longitude).toFixed(15);
      let latitude = parseFloat(response['alert'][i].latitude).toFixed(15);
      let fireStatus = "<b>Status: </b> " + response['alert'][i].status;
      let fireLocation = "<b>Address: </b>" + response['alert'][i].fire_location;
      let markerContent = `
        <div style="max-width: 200px;">
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
      if(response['alert'][i].status == "Fire Out"){
        marker.setVisible(false);
      }
  
}

  },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert("Error Loading Google Map Markers");
    }
});
////// END OF CODE FOR MARKERS TO SHOW ON MAP //////



$("#firealert-manager").click(function(){
  $(".fireAlertManagerModal").modal({backdrop: 'static', keyboard: false});
  $(".fireAlertManagerModal").modal('show');
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
  $('#firealert-manager').hide();

  $(`${appendClass}`).empty();
  $(`${appendClass}`).append(
    `
      <i class="fa-sharp fa-solid fa-ban"></i>
      Cancel
    `);

    $(`.fa-sharp .fa-solid`).click(function(){
      // if(listenerHandler){
        google.maps.event.removeListener(listenerHandler);
      // }
    });
}

// Template for when after cancel is pressed, CRUD buttons are shown
function crudTemplate(shownOptions, buttonClass, buttonContent){
  $(".middle-details").empty();
  $(`${shownOptions[0]}`).show();
  $(`${shownOptions[1]}`).show();
  $('#firealert-manager').show();

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
  "#add-firealert", `<i class="fas fa-plus-circle"></i> Add Fire Alert`
  );

  if(listenerHandler){
    google.maps.event.removeListener(listenerHandler);
  }

    $("#add-firealert").off('click').on('click', addAlertFcn)
}

$("#add-firealert").on('click', addAlertFcn);

$(".addNewAlert").on('click', addAlertFcn);
/////// ADD FIRE ALERT FUNCTION CODE END///////
 


/////// EDIT FIRE ALERT FUNCTION CODE START///////
function editCancelFcn(){
  crudTemplate
  (
    ["#delete-firealert", "#add-firealert"],
  "#edit-firealert", `<i class='bx bxs-edit'></i> Edit Fire Alert`
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
        <div style="max-width: 200px;">
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
      for (let i = 0; i < markerArr.length; i++) {
        let firealert_id = response['alert'][i].firealarm_id;
        let fire_location = response['alert'][i].fire_location;
        let longitude = response['alert'][i].longitude;
        let latitude = response['alert'][i].latitude;
        let status = response['alert'][i].status;

        google.maps.event.clearListeners(markerArr[i], "click");


        listenerHandler = markerArr[i].addListener("click", (mapsMouseEvent) => {

          $("#firealert_hidden_id").val(firealert_id);
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

  cancelTemplate(`new location to EDIT longitude and latitude of`,
  ["#add-firealert", "#delete-firealert"], "#edit-firealert");


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
  "#delete-firealert", `<i class="fas fa-trash-alt"></i> Delete Fire Alert`
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
return editAlertFcn;
};



