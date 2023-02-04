let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("firelertmapmanagement"), {
    center: { lat: 10.352029690791822, lng: 123.91910785394363 },
    zoom: 16,
    mapId: 'c887c451d0ae25a6'
  });

  const fireImg = "images/fire.png"
  //Name
  //Latitude, Longitude
  //Image Url
  //scaled Size width, height
  const markers = [
    [
        "Fire Near University of San Carlos Talamban",
        10.353072075803802,
        123.91298865030441,
        fireImg,
        38,
        31,
        "University of San Carlos was close to getting a fire as there was an accident in the lab."
    ],

    [
        "Fire Near Jollibee Banilad",
        10.349568075191915, 
        123.913374888391,
        fireImg,
        38,
        31,
        "Jollibee Banilad was caught on fire."
    ],
    [
        "Oakridge Business Park Fire",
        10.343708802976499, 
        123.91613004382488,
        fireImg,
        38,
        31,
        "Oakridge Business Park fire almost extinguished."
    ]

  ];

   

  for (let i = 0; i < markers.length; i++) {
    const currMarker = markers[i];

    const marker = new google.maps.Marker({
        position: { lat: currMarker[1], lng: currMarker[2] },
        map,
        title: currMarker[0],
        icon: {
            url: fireImg,
            scaledSize: new google.maps.Size(currMarker[4], currMarker[5])
        },
        animation: google.maps.Animation.DROP
      });
    
      const infowindow = new google.maps.InfoWindow({
        content: currMarker[6],
        ariaLabel: "Uluru",
      });
    
      marker.addListener("click", () => {
        infowindow.open({
          anchor: marker,
          map,
        });
      });
    
  }
}

//10.352029690791822, 123.91910785394363 coordinates of banilad, mandaue city
//10.353072075803802, 123.91298865030441 USC
window.initMap = initMap;