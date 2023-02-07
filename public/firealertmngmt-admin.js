
$(document).ready(function() {

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

      // marker.addListener("click", () => {
      //   infowindow.open({
      //       anchor: marker,
      //       map,
      //     });
      // });

}

  },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
});

  
});



let mapAlerts;

// function initMap() {

//   $.ajax({
//     url: 'fire-alert-management/showMapAlerts',
//     type: 'get',
//     dataType: 'json',
//     success: function(response){
//        let markers = response;

//        for (let i = 0; i < markers['alert'].length; i++) {

//         // const currMarker = markers['alert'];
//         let latitude = parseFloat(markers['alert'][i].latitude);
//         let longitude = parseFloat(markers['alert'][i].longitude);
        
//         // console.log(latitude + " " + longitude);
       
//         var marker = new google.maps.Marker({
//             position: { lat: latitude + 1, lng: longitude + 1},
//             map,
//             title: markers['alert'][i].fire_location,
//             icon: {
//                 url: fireImg,
//                 scaledSize: new google.maps.Size(38, 31)
//             },
//             animation: google.maps.Animation.DROP
//           });
//         console.log(latitude + 1);
//           var infowindow = new google.maps.InfoWindow({
//             content: `<b>Status:</b> ${markers['alert'][i].status}`,
//             ariaLabel: "Uluru",
//           });
        
//           marker.addListener("click", () => {
//             infowindow.open({
//               anchor: marker,
//               map,
//             });
//           });
//       }
//     },
//     error: function(xhr, status, error) {
//       var err = eval("(" + xhr.responseText + ")");
//       alert(err.Message);
//     }
//   });

//   //Name
//   //Latitude, Longitude
//   //Image Url
//   //scaled Size width, height
//   const markers = [
//     [
//         "Fire Near University of San Carlos Talamban",
//         10.353072075803802,
//         123.91298865030441,
//         fireImg,
//         38,
//         31,
//         "University of San Carlos was close to getting a fire as there was an accident in the lab."
//     ],

//     [
//         "Fire Near Jollibee Banilad",
//         10.349568075191915, 
//         123.913374888391,
//         fireImg,
//         38,
//         31,
//         "Jollibee Banilad was caught on fire."
//     ],
//     [
//         "Oakridge Business Park Fire",
//         10.343708802976499, 
//         123.91613004382488,
//         fireImg,
//         38,
//         31,
//         "Oakridge Business Park fire almost extinguished."
//     ]

//   ];


// }

//10.352029690791822, 123.91910785394363 coordinates of banilad, mandaue city
//10.353072075803802, 123.91298865030441 USC
// window.initMap = initMap;

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