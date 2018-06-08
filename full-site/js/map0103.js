var map;
function initMap() {
  var SS = {lat: 50.462033,lng: 30.409143};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: SS,
    scrollwheel: false,
    navigationControl: false,
    mapTypeControl: false,
    scaleControl: false,
    draggable: true,
    styles:[{"featureType": "all","elementType": "labels", "stylers": [{"visibility": "on" }] },
    { "featureType": "all", "elementType": "labels.text.fill", "stylers": [{"saturation": 36 },{"color": "#000000" }, { "lightness": 40} ] },
    { "featureType": "all", "elementType": "labels.text.stroke", "stylers": [{"visibility": "on" }, { "color": "#000000"}, { "lightness": 16} ] },
    { "featureType": "all", "elementType": "labels.icon", "stylers": [ {"visibility": "off" }] },
    { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [ { "color": "#000000"}, { "lightness": 20} ] },
    {"featureType": "administrative","elementType": "geometry.stroke","stylers": [{ "color": "#000000"}, { "lightness": 17}, { "weight": 1.2} ] },
    { "featureType": "administrative.locality", "elementType": "labels.text.fill", "stylers": [{"color": "#c4c4c4" }] },
    {"featureType": "administrative.neighborhood","elementType": "labels.text.fill","stylers": [{ "color": "#707070"    }]},
    {"featureType": "landscape", "elementType": "geometry","stylers": [ {"color": "#000000" }, {"lightness": 20 } ] },
    {"featureType": "poi","elementType": "geometry","stylers": [ { "color": "#000000" }, {"lightness": 21 }, {"visibility": "on"} ] },
    {"featureType": "poi.business","elementType": "geometry","stylers": [ { "visibility": "on" } ] },
    { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [ { "color": "#be2026" }, { "lightness": "0" }, { "visibility": "on" } ] },
    {"featureType": "road.highway","elementType": "geometry.stroke","stylers": [ { "visibility": "off"}    ]},
    { "featureType": "road.highway", "elementType": "labels.text.fill", "stylers": [{ "visibility": "off" } ] },
    { "featureType": "road.highway", "elementType": "labels.text.stroke", "stylers": [ { "visibility": "off" }, { "hue": "#ff000a"  }] },
    { "featureType": "road.arterial", "elementType": "geometry", "stylers": [ { "color": "#000000"}, { "lightness": 18 } ] },
    { "featureType": "road.arterial", "elementType": "geometry.fill", "stylers": [ {"color": "#575757" } ] },
    { "featureType": "road.arterial", "elementType": "labels.text.fill", "stylers": [{ "color": "#ffffff"}] },
    { "featureType": "road.arterial", "elementType": "labels.text.stroke", "stylers": [ {"color": "#2c2c2c" } ]},
    { "featureType": "road.local", "elementType": "geometry", "stylers": [ { "color": "#000000" }, { "lightness": 16 } ] },
    { "featureType": "road.local", "elementType": "labels.text.fill", "stylers": [ { "color": "#999999" }  ] },
    { "featureType": "road.local", "elementType": "labels.text.stroke", "stylers": [{ "saturation": "-52" }  ]  },
    { "featureType": "transit", "elementType": "geometry", "stylers": [ { "color": "#000000" }, { "lightness": 19 } ]},
    { "featureType": "water", "elementType": "geometry", "stylers": [ { "color": "#000000"  }, { "lightness": 17 } ] } ]
  });

var polygonCoords = [
new google.maps.LatLng(50.433919, 30.513405),
new google.maps.LatLng(50.433924, 30.512895),
new google.maps.LatLng(50.433408, 30.512668),
new google.maps.LatLng(50.433336, 30.513424),
new google.maps.LatLng(50.433919, 30.513405)
];

// Настройки для полигона
var polygon = new google.maps.Polygon({
path: polygonCoords, // Координаты
strokeColor: '#FF0000',
strokeOpacity: 0.8,
strokeWeight: 2,
fillColor: '#FF0000',
fillOpacity: 0.5

});

// Добавляем на карту
polygon.setMap(map);

// Для новго маркера создаем контент и добавляем обьект в makersData
var marker1Content = '<div class="phoneytext" style="text-align:center;">SAN FRANCISCO CREATIVE HOUSE<hr>'+
'<h2>пр-т Перемоги, 67</h2></div>';
var marker2Content = '<div class="phoneytext">супермаркет Фуршет<hr>'+
'<p>пр-т Перемоги, 94/1</p></div>';
var marker3Content = '<div class="phoneytext" style="text-align:center;">Спеціалізована школа №73<hr>'+
'<p>пр-т Перемоги, 86</p></div>';
var marker4Content = '<div class="phoneytext" style="text-align:center;">Метро НИВКИ</div>';
var marker5Content = '<div class="phoneytext" style="text-align:center;">Парк Нивки</div>';
var marker6Content = '<div class="phoneytext">Гімназія №154<hr>'+
'<p>пр-т Перемоги, 63</p></div>';
var marker7Content = '<div class="phoneytext" style="text-align:center;">Метро Берестейська</div>';

var markersData = [
  {lat:50.458004, lng:30.405925,icon: '../img/pin/xbr33.png', content: marker1Content, main: true},
  {lat:50.459035, lng:30.398930,icon: '../img/pin/market.png', content: marker2Content},
  {lat:50.458999, lng:30.403250,icon: '../img/pin/school.png', content: marker3Content},
  {lat:50.458667, lng:30.403880,icon: '../img/pin/metro.png', content: marker4Content},
  {lat:50.459936, lng:30.408882,icon: '../img/pin/park.png', content: marker5Content},
  {lat:50.458463, lng:30.413444,icon: '../img/pin/school.png', content: marker6Content},
  {lat:50.459120, lng:30.419068,icon: '../img/pin/metro.png', content: marker7Content}
]
// Конструктор для главного маркера.
function MainMarkerWithBubble(lat, lng, icon, content) {
  this.marker = new google.maps.Marker({
    map: map,
    position: new google.maps.LatLng(lat, lng),
    icon: icon,
    width: 50
  });
  this.infobubble = new InfoBubble({
    content: content,
    shadowStyle: 1,
    padding: 10,
    backgroundColor: 'rgba(30,14,0,0.5)',
    borderRadius: 1,
    arrowSize: 10,
    borderWidth: 1,
    borderColor: '#ff000b',
    disableAutoPan: true,
    hideCloseButton: true,
    arrowPosition: 5,
    backgroundClassName: 'phoney',
    arrowStyle: 2
    // width: 400
    // height: 180
  });
};

// Конструктор для обычных маркеров.
function MarkerWithBubble(lat, lng, icon, content) {
  this.marker = new google.maps.Marker({
    map: map,
    position: new google.maps.LatLng(lat, lng),
    icon: icon,
  });
  this.infobubble = new InfoBubble({
    content: content,
    shadowStyle: 1,
    padding: 10,
    backgroundColor: 'rgba(30,14,0,0.7)',
    borderRadius: 1,
    arrowSize: 10,
    borderWidth: 1,
    borderColor: '#ff000b',
    disableAutoPan: true,
    hideCloseButton: true,
    arrowPosition: 30,
    backgroundClassName: 'phoney',
    arrowStyle: 2
  });
};


var initialisedMarkers = [];

//Создаем маркера с окнами и добавляем их в массив
markersData.forEach(function(marker) {
  if(marker.main) {
    initialisedMarkers.push(new MainMarkerWithBubble(marker.lat, marker.lng, marker.icon, marker.content));
  } else {
    initialisedMarkers.push(new MarkerWithBubble(marker.lat, marker.lng, marker.icon, marker.content));
  }
});

// Для закрытия окон
function closeAllMakers() {
  initialisedMarkers.forEach(function(markerWithBubble){
    markerWithBubble.infobubble.close();
  });
};

map.addListener('click', closeAllMakers); // Закрываем все по клику по карте

//Закрываем все открываем по клику один
initialisedMarkers.forEach(function(markerWithBubble) {
  markerWithBubble.marker.addListener('click', function() {
    closeAllMakers();
    markerWithBubble.infobubble.open(map, markerWithBubble.marker);
  });
});

} // end initMap
