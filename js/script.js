var map = new L.Map('map').setView([37.56022, 127.01], 11);
// new L.TileLayer(
    // 'http://{s}.tiles.mapbox.com/v3/osmbuildings.map-c8zdox7m/{z}/{x}/{y}.png',
    // { attribution: 'Map tiles © MapBox', minZoom: 10, maxZoom: 13 }
// ).addTo(map);
/*
new L.TileLayer('http://{s}.tile.cloudmade.com/{key}/{styleId}/256/{z}/{x}/{y}.png', {
      key: 'd4fc77ea4a63471cab2423e66626cbb6',
      attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
      styleId: 22677,
      minZoom: 10,
      maxZoom: 13
    }).addTo(map);
*/
new L.TileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png',{
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="http://cartodb.com/attributions">CartoDB</a>',
      minZoom: 10,
      maxZoom: 13
    }).addTo(map);

function getColor(d) {
  return d > 17000 ? '#004529' :
         d > 14000  ? '#006837' :
         d > 11000  ? '#238443' :
         d > 8000  ? '#41ab5d' :
         d > 5000  ? '#78c679' :
                      '#addd8e';
}

var feature;
for (var i = 0, il = data.features.length; i < il; i++) {
  feature = data.features[i];
  feature.properties.color = getColor(feature.properties.value);
  feature.properties.height = feature.properties.value;
}

new L.BuildingsLayer().addTo(map).geoJSON(data);



var legend = L.control({position: 'bottomright'});

legend.onAdd = function (map) {

  var div = L.DomUtil.create('div', 'info legend'),
    grades = [0, 5000, 8000, 11000, 14000, 17000],
    labels = [],
    from, to;

  for (var i = 0; i < grades.length; i++) {
    from = grades[i];
    to = grades[i + 1];

    labels.push(
      '<i style="background:' + getColor(from + 1) + '"></i> ' +
      from + (to ? '&ndash;' + to : '+'));
  }

  div.innerHTML = labels.join('<br>');
  return div;
};

legend.addTo(map);