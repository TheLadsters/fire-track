
$(document).ready(function() {
  
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });


////// GET FIRE HYDRANT TABLE START OF CODE //////
function checkImg(hydrant){
  let imgUrl = (hydrant.img_url) ? assetUrl + '/' + hydrant['img_url'] : "images/no_img_available.png";
return imgUrl;
}

$('#hydrant_table').DataTable({
  'ajax': 'admin/admin-hydrant-map/getHydrantTable',
  'columns': [
    {'data': 'address'},
    {'data': 'longitude', "bSortable": false},
    {'data': 'latitude', "bSortable": false},
    {'data': 'name'},
    {'data': 'status'},
    {'data': 'created_at', visible: false, searchable: false},
    {
      "mData": null,
      "bSortable": false,
      "mRender": function(hydrant, type, full) {
        return `
                <img src="${checkImg(hydrant)}" width="120" height="100" />
              `;
      }
    },
    {
      "mData": null,
      "bSortable": false,
      "mRender": function(hydrant, type, full) {
        return `
                <a class="edit editColHydrant" data-bs-toggle="modal" id="${hydrant['hydrant_id']}" data-bs-target=".editFireHydrantModal">
                  <i class='bx bx-cog' style='color:#6b66f5' data-toggle="tooltip" title="Edit">
                  </i>
                </a>

                <a class="delete deleteColHydrant" data-bs-toggle="modal" id="${hydrant['hydrant_id']}" data-bs-target=".deleteHydrantModal">
                <i class='bx bxs-x-circle' style='color:#ff0000' data-toggle="tooltip" title="Delete">
                </i>
              </a>
              `;
      }
    }
  ],
  "order": [5, 'desc']
});

$("#firehydrant-manager").click(function(){
  $(".fireHydrantManagerModal").modal({backdrop: 'static', keyboard: false});
  $(".fireHydrantManagerModal").modal('show');
});

// on clicking edit hydrant in fire hydrant management
$('#hydrant_table tbody').on('click', '.editColHydrant', function(){
    let hydrant_id = $(this).attr('id');

    $.ajax({
      type: 'post',
      url: 'admin/admin-hydrant-map/getOneMapHydrant/' + hydrant_id,
      dataType: 'json',    
      success: function(response){ 
        let longitude = response['data'].longitude;
        let latitude = response['data'].latitude;
        let location = response['data'].address;
        let status = response['data'].status;
        let hydrantType = response['data'].hydrant_type_id;
        let hydrantImgUrl = response['data'].img_url;
        let hydrantPhoto = (hydrantImgUrl) ? assetUrl + '/' + response['data'].img_url : 
        "images/no_img_available.png";

        $("#edit-longitude").val(longitude);
        $("#edit-latitude").val(latitude);
        $("#edit-hydrant-address").val(location);
        $("#status-selector").val(status);
        $("#type-selector").val(hydrantType);
        $("#firehydrant_hidden_id").val(hydrant_id);
        $(".img-thumbnail").attr("src", hydrantPhoto);

      },
      error: function(jqXHR, textStatus, errorThrown) { 
           console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
       }
    });
});

// delete hydrant in fire hydrant manager
$('#hydrant_table tbody').on('click', '.deleteColHydrant', function(){
  let hydrant_id = $(this).attr('id');
  $('.deleteHydrantModal #firehydrant_key_id').val(hydrant_id);
});

////// GET FIRE HYDRANT TABLE END OF CODE //////


  //variables
  const centerPoint = new google.maps.LatLng(10.352029690791822, 123.91910785394363);
  const hydrantImg = "images/fire-hydrant.png";
  let hydrantMarker;
  let hydrantMarkerArr = [];
  let hydrantListenerHandler;
  let hydrantMap;
  let geocoder;
  //end of variables
  


// creation of MAP
 hydrantMap = new google.maps.Map(document.getElementById("firehydrantmap"), {
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

// creation of GEOCODER
geocoder = new google.maps.Geocoder();
// end of creation of GEOCODER

// TEMPLATES
function cancelHydrantTemplate(middleText, hiddenOptions, appendClass){
  $(".middle-details-hydrant").empty();
  $(".middle-details-hydrant").append(
    `
    <div class="hydrant-notif">
      <h5>Click on ${middleText} a fire hydrant.</h5>
    </div>
    `
  );

  $(`${hiddenOptions[0]}`).hide();
  $(`${hiddenOptions[1]}`).hide();
  $('#firehydrant-manager').hide();

  $(`${appendClass}`).empty();
  $(`${appendClass}`).append(
    `
      <i class="fa-sharp fa-solid fa-ban"></i>
      Cancel
    `);
}

function crudHydrantTemplate(shownOptions, buttonClass, buttonContent){
  $(".middle-details-hydrant").empty();
  $(`${shownOptions[0]}`).show();
  $(`${shownOptions[1]}`).show();
  $('#firehydrant-manager').show();

  $(`${buttonClass}`).empty();
  $(`${buttonClass}`).append(
    `
      ${buttonContent}
    `);
}
// END OF TEMPLATES


// code to show hydrant markers on map
$.ajax({
  url: 'admin/admin-hydrant-map/showMapHydrants',
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



 /////// ADD FIRE HYDRANT FUNCTION CODE START///////
function addHydrantFcn(){
  hydrantListenerHandler = hydrantMap.addListener("click", (mapsMouseEvent, event) => {
 
     let hydrantLongLat = mapsMouseEvent.latLng.toJSON();

    //  creates a geocoder to get specified address on map
     geocoder.geocode({
      'latLng': hydrantLongLat
    }, function (results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          let hydrantAddress = results[0].formatted_address;
          $("#hydrant-address").val(hydrantAddress);
        }
      }
    });
 
     // sets the longitude and latitude of the clicked part of the map
     $("#hydrant-longitude").val(hydrantLongLat.lat);
     $("#hydrant-latitude").val(hydrantLongLat.lng);

     $(".addFireHydrantModal").modal("show");
 
   });
 
   cancelHydrantTemplate("any location on the map to ADD", 
   ["#edit-firehydrant", "#delete-firehydrant"], "#add-firehydrant");
 
     $("#add-firehydrant").off('click').on('click', addCancelFcn);
 }
 
 function addCancelFcn(){
  crudHydrantTemplate
   (
     ["#edit-firehydrant", "#delete-firehydrant"],
   "#add-firehydrant", `<i class='bx bx-alarm-add'></i> Add Fire Hydrant`
   );
 
   if(hydrantListenerHandler){
     google.maps.event.removeListener(hydrantListenerHandler);
   }
 
     $("#add-firehydrant").off('click').on('click', addHydrantFcn);
 }
 
 $("#add-firehydrant").on('click', addHydrantFcn);
 /////// ADD FIRE HYDRANT FUNCTION CODE END///////


 /////// EDIT FIRE HYDRANT FUNCTION CODE START///////
 function editHydrantCancelFcn(){
  crudHydrantTemplate
  (
    ["#delete-firehydrant", "#add-firehydrant"],
  "#edit-firehydrant", `<i class='bx bx-edit'></i> Edit Fire Hydrant`
  );

  $.ajax({
    url: 'admin/admin-hydrant-map/showMapHydrants',
    type: 'get',
    dataType: 'json',
    success: function(response){
      for (let i = 0; i < response['hydrant'].length; i++) {

      let hydrantAddress = response['hydrant'][i].address;
      let hydrantType = response['hydrant'][i].name;
      let hydrantStatus = response['hydrant'][i].status;
      let hydrantImgUrl = response['hydrant'][i].img_url;
      let hydrantPhoto = (hydrantImgUrl) ? assetUrl + '/' + response['hydrant'][i].img_url : "images/no_img_available.png";
      
      let markerContent = 
        `
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
        `
        
        google.maps.event.clearListeners(hydrantMarkerArr[i], "click");
  
        addMarkerListener(hydrantMarkerArr[i], markerContent);
      }
  },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert("Error");
    }
});

if(hydrantListenerHandler){
  google.maps.event.removeListener(hydrantListenerHandler);
}

    $("#edit-firehydrant").off('click').on('click', editHydrantFcn);
}

function editHydrantFcn(){

  $.ajax({
    url: 'admin/admin-hydrant-map/showMapHydrants',
    type: 'get',
    dataType: 'json',
    success: function(response){
      for (let i = 0; i < hydrantMarkerArr.length; i++) {
        let firehydrant_id = response['hydrant'][i].hydrant_id;
        // temporary user_id
        let user_id = $('#user_id').val();
        let longitude = parseFloat(response['hydrant'][i].longitude).toFixed(15);
        let latitude = parseFloat(response['hydrant'][i].latitude).toFixed(15);
        let hydrantAddress = response['hydrant'][i].address;
        let hydrantType = response['hydrant'][i].hydrant_type_id;
        let hydrantStatus = response['hydrant'][i].status;
        let hydrantImgUrl = response['hydrant'][i].img_url;
        let hydrantPhoto = (hydrantImgUrl) ? assetUrl + '/' + response['hydrant'][i].img_url : 
                          "images/no_img_available.png";

        google.maps.event.clearListeners(hydrantMarkerArr[i], "click");


        hydrantListenerHandler = hydrantMarkerArr[i].addListener("click", (mapsMouseEvent) => {

          $("#firehydrant_hidden_id").val(firehydrant_id);
          $("#user_id").val(user_id);
          $("#edit-longitude").val(longitude);
          $("#edit-latitude").val(latitude);
          $("#edit-hydrant-address").val(hydrantAddress);
          $("#status-selector").val(hydrantStatus);
          $("#type-selector").val(hydrantType);
          $(".img-thumbnail").attr("src",hydrantPhoto);

          $(".editFireHydrantModal").modal("show");
      
        });
    }
     
  },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert("Error");
    }
});
 
cancelHydrantTemplate("any hydrant icon to EDIT", 
   ["#delete-firehydrant", "#add-firehydrant"], "#edit-firehydrant");
 
     $("#edit-firehydrant").off('click').on('click', editHydrantCancelFcn);
 }


$(".edit-hydrant-longlat").click(function(){

  $(".editFireHydrantModal").modal("hide");
  $(".middle-details-hydrant").empty();
  $(".middle-details-hydrant").append(
    `
    <div class="alarm-notif">
      <h5>Click on new location to EDIT longitude and latitude of the fire hydrant.</h5>
    </div>
    `
  );

  for (let i = 0; i < hydrantMarkerArr.length; i++) {
    google.maps.event.clearListeners(hydrantMarkerArr[i], "click");
}
  hyrantListenerHandler = hydrantMap.addListener("click", (mapsMouseEvent) => {
 

    let newLongLat = mapsMouseEvent.latLng.toJSON();
    // sets the longitude and latitude of the clicked part of the map
    $("#edit-longitude").val(newLongLat.lat);
    $("#edit-latitude").val(newLongLat.lng);

    //  creates a geocoder to get specified address on map
    geocoder.geocode({
      'latLng': newLongLat
    }, function (results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          let hydrantAddress = results[0].formatted_address;
          $("#edit-hydrant-address").val(hydrantAddress);
        }
      }
    });


    $(".editFireHydrantModal").modal("show");
  });
  

});


$("#edit-firehydrant").on('click', editHydrantFcn);

 /////// EDIT FIRE HYDRANT FUNCTION CODE END///////


////// DELETE FIRE HYDRANT FUNCTION CODE START //////
function deleteHydrantFcn(){
  
  cancelHydrantTemplate("any hydrant icon to DELETE", 
    ["#add-firehydrant", "#edit-firehydrant"], "#delete-firehydrant");
    
    $.ajax({
      url: 'admin/admin-hydrant-map/showMapHydrants',
      type: 'get',
      dataType: 'json',
      success: function(response){
        for (let i = 0; i < hydrantMarkerArr.length; i++) {
          let hydrant_id = response['hydrant'][i].hydrant_id;
  
          google.maps.event.clearListeners(hydrantMarkerArr[i], "click");
    
          hydrantListenerHandler = hydrantMarkerArr[i].addListener("click", (mapsMouseEvent) => {
            $("#firehydrant_key_id").val(hydrant_id);
  
            $(".deleteHydrantModal").modal("show");
        
          });
      }
       
    },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert("Error");
      }
  });
  
      $("#delete-firehydrant").off('click').on('click', cancelForHydrantDeleteFcn);
  }
  
  function cancelForHydrantDeleteFcn(){
  
    crudHydrantTemplate
    (
      ["#add-firehydrant", "#edit-firehydrant"],
    "#delete-firehydrant", `<i class="far fa-trash-alt"></i> Delete Fire Hydrant`
    );
  
      $.ajax({
        url: 'admin/admin-hydrant-map/showMapHydrants',
        type: 'get',
        dataType: 'json',
        success: function(response){
  
          for (let i = 0; i < response['hydrant'].length; i++) {
  
            let hydrantAddress = response['hydrant'][i].address;
            let hydrantType = response['hydrant'][i].name;
            let hydrantStatus = response['hydrant'][i].status;
            let hydrantImgUrl = response['hydrant'][i].img_url;
            let hydrantPhoto = (hydrantImgUrl) ? assetUrl + '/' + response['hydrant'][i].img_url : "images/no_img_available.png";
            let markerContent = 
              `
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
              `
            google.maps.event.clearListeners(hydrantMarkerArr[i], "click");
      
            addMarkerListener(hydrantMarkerArr[i], markerContent);
          }
      },
        error: function(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          alert("Error");
        }
    });
  
  
      $("#delete-firehydrant").off('click').on('click', deleteHydrantFcn)
  }
  
  $("#delete-firehydrant").on('click', deleteHydrantFcn);
  
  ////// DELETE FIRE HYDRANT FUNCTION CODE END //////


});
