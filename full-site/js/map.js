var map;
function initMap() {
  var SS = {lat: 50.459533,lng: 30.409143};
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
new google.maps.LatLng(50.458541, 30.407911),
new google.maps.LatLng(50.458691, 30.410175),
new google.maps.LatLng(50.458466, 30.410250),
new google.maps.LatLng(50.457742, 30.409360),
new google.maps.LatLng(50.4579538, 30.408909),
new google.maps.LatLng(50.4579265, 30.408587),
new google.maps.LatLng(50.4576123, 30.408201),
new google.maps.LatLng(50.4575918, 30.407933),
new google.maps.LatLng(50.4578513, 30.407879),
new google.maps.LatLng(50.4578650, 30.408083)
];

// Настройки для полигона
var polygon = new google.maps.Polygon({
path: polygonCoords, // Координаты
strokeColor: '#FF0000',
strokeOpacity: 0.5,
strokeWeight: 1,
fillColor: '#FF0000',
fillOpacity: 0.3
});

// Добавляем на карту
polygon.setMap(map);

// Для новго маркера создаем контент и добавляем обьект в makersData
var marker1Content = '<div class="phoneytext" style="text-align:center;">SAN FRANCISCO CREATIVE HOUSE<hr>'+'<h2>пр-т Перемоги, 67</h2></div>';
var marker2Content = '<div class="phoneytext">супермаркет Фуршет<hr>'+'<p>пр-т Перемоги, 94/1</p></div>';
var marker3Content = '<div class="phoneytext" style="text-align:center;">Гімназія №73<hr>'+ '<p>пр-т Перемоги, 86</p></div>';
var marker4Content = '<div class="phoneytext" style="text-align:center;">Метро НИВКИ</div>';
var marker5Content = '<div class="phoneytext" style="text-align:center;">Парк Нивки</div>';
var marker6Content = '<div class="phoneytext">Гімназія №154<hr>'+ '<p>пр-т Перемоги, 63</p></div>';
var marker7Content = '<div class="phoneytext" style="text-align:center;">Метро Берестейська</div>';

var marker8Content = '<div class="phoneytext">Дитячий дошкільний<hr>'+'<p>заклад № 647</p></div>';
var marker9Content = '<div class="phoneytext">Банкет-хол "Nivki-hall"<hr>'+'<p>пр-т Перемоги</p></div>';
var marker10Content = '<div class="phoneytext">Ресторан японской кухни "Евразия"<hr>'+'<p>пр-т Перемоги, 84</p></div>';
var marker11Content = '<div class="phoneytext">Приватбанк<hr>'+'<p>пр-т Перемоги, 85</p></div>';
var marker12Content = '<div class="phoneytext">Дитячий дошкільний<hr>'+'<p>заклад № 530</p></div>';
var marker13Content ='<div class="phoneytext">Бизнес парк "Нивки Сити"<hr>'+'<p>пр-т Перемоги, 67</p></div>';
var marker14Content = '<div class="phoneytext>"Sport-Klub "Olimp"<hr>'+'<p>проспект Перемоги, 63Б</p></div>';
var marker15Content = '<div class="phoneytext">Поштомат Нова Пошта №1102<hr>'+'<p>пр-т Перемоги, 65</p></div>';
var marker16Content = '<div class="phoneytext">Аптека Країна Здоров’я<hr>'+'<p>пр-т Перемоги, 73/1</p></div>';
var marker17Content = '<div class="phoneytext">ТРЦ Lavina<hr>'+'<p>Берковецька, 6Д</p></div>';
var marker18Content = '<div class="phoneytext">Дитячий садок №550<hr>'+'<p>Артилерійський провулок, 1А</p></div>';
var marker19Content = '<div class="phoneytext">Фітнес клуб "Олімп"<hr>'+'<p>Кулібіна, 11</p></div>';


var markersData = [
  {lat:50.4585004, lng:30.408587,icon: '/img/pin/xbr33.png', content: marker1Content, main: true},
  {lat:50.459035, lng:30.398930,icon: '/img/pin/market.png', content: marker2Content},
  {lat:50.458999, lng:30.403250,icon: '/img/pin/school.png', content: marker3Content},
  {lat:50.458667, lng:30.403880,icon: '/img/pin/metro.png', content: marker4Content},
  {lat:50.459936, lng:30.408882,icon: '/img/pin/park.png', content: marker5Content},
  {lat:50.458463, lng:30.413444,icon: '/img/pin/school.png', content: marker6Content},
  {lat:50.459120, lng:30.419068,icon: '/img/pin/metro.png', content: marker7Content},

  {lat:50.462136, lng:30.410388,icon: '/img/pin/kids.png', content: marker8Content},
  {lat:50.459485, lng:30.408283,icon: '/img/pin/kafe.png', content: marker9Content},
  {lat:50.459414, lng:30.410212,icon: '/img/pin/kafe.png', content: marker10Content},
  {lat:50.458581, lng:30.411478,icon: '/img/pin/bank.png', content: marker11Content},
  {lat:50.457956, lng:30.417095,icon: '/img/pin/kids.png', content: marker12Content},
  {lat:50.458134, lng:30.406179,icon: '/img/pin/bank.png', content: marker13Content},
  {lat:50.457429, lng:30.413592,icon: '/img/pin/sport.png', content: marker14Content},
  {lat:50.458633, lng:30.411972,icon: '/img/pin/np.png', content: marker15Content},
  {lat:50.457837, lng:30.400256,icon: '/img/pin/clinic.png', content: marker16Content},
  {lat:50.495234, lng:30.362107,icon: '/img/pin/lavina.png', content: marker17Content},
  {lat:50.460050, lng:30.421084,icon: '/img/pin/kids.png', content: marker18Content},
  {lat:50.454677, lng:30.400241,icon: '/img/pin/sport.png', content: marker18Content}
]
// Конструктор для главного маркера.


// Детский сад №647 50.462136, 30.410388
// Банкет-хол "Nivki-hall" 50.459485, 30.408283
// Ресторан японской кухни "Евразия" пр-т Перемоги, 84  50.459414, 30.410212
// Приватбанк , пр-т Перемоги, 85 50.458581, 30.411478
// Детский сад №530 вулиця Миколи Василенка, 1в 50.457956, 30.417095
// Бизнес парк "Нивки Сити" проспект Перемоги, 67  50.458134, 30.406179
// проспект Перемоги, 63Б Sport-Klub "Olimp" 50.457429, 30.413592
// Поштомат ПриватБанку №1102  проспект Перемоги, 65  50.458633, 30.411972
// Аптека Країна Здоров’я проспект Перемоги, 73/1, 50.457837, 30.400256

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
