
var map = L.map('map').setView([37.561, 126.986], 11);			
						
L.tileLayer('https://{s}.tiles.mapbox.com/v3/{id}/{z}/{x}/{y}.png', {
	maxZoom: 18, attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' + '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' + 'Imagery © <a href="http://mapbox.com">Mapbox</a>', id: 'examples.map-20v6611k' }).addTo(map);
						
// 마우스 호버 효과
var info = L.control();
					
info.onAdd = function (map) {
	this._div = L.DomUtil.create('div', 'info');
	this.update();
	return this._div;
};
					
info.update = function (props) {
	this._div.innerHTML = '<h4>서울 아파트 실거래가</h4>' +  (props ?
		'<b>' + props.name + '</b><br />' + props.density + ' 원 / m<sup>2</sup>': '구 위에 마우스를 올려보세요!');
};
					
info.addTo(map);
					
					
// 농도에 따른 색깔 선정
function getColor(d) {
	return d > 1000 ? '#800026' :
			d > 500  ? '#BD0026' :
			d > 200  ? '#E31A1C' :
			d > 100  ? '#FC4E2A' :
			d > 50   ? '#FD8D3C' :
			d > 20   ? '#FEB24C' :
			d > 10   ? '#FED976' :
					   '#FFEDA0';
}
						
					
function style(feature) {
		return {
			weight: 2,
			opacity: 1,
			color: 'white',
			dashArray: '3',
			fillOpacity: 0.7,
			fillColor: getColor(feature.properties.density)
		};
}
					
function highlightFeature(e) {
		var layer = e.target;
					
		layer.setStyle({
			weight: 5,
			color: '#666',
			dashArray: '',
			fillOpacity: 0.7
		});
					
		if (!L.Browser.ie && !L.Browser.opera) {
			layer.bringToFront();
		}
					
		info.update(layer.feature.properties);
}
					
var geojson;
					
function resetHighlight(e) {
	geojson.resetStyle(e.target);
	info.update();
}
					
var popup = L.popup();

function onMapClick(e) {
	var layer = e.target;
    popup
		.setLatLng(e.latlng)
        .setContent('<div id="chart_div" style="width:500px; height:300px;"></div>')
        .openOn(map);
	drawChart(layer.feature.properties);
}
					
function onEachFeature(feature, layer) {
	layer.on({
	mouseover: highlightFeature,
	mouseout: resetHighlight,
	click: onMapClick
	});
}
					
geojson = L.geoJson(statesData, {
			style: style,
			onEachFeature: onEachFeature
			}).addTo(map);
					
map.attributionControl.addAttribution('data &copy; <a href="http://www.r-one.co.kr/rone/">부동산통계정보시스템</a>');
					
					
var legend = L.control({position: 'bottomright'});
					
legend.onAdd = function (map) {
				var div = L.DomUtil.create('div', 'info legend'),
				grades = [0, 10, 20, 50, 100, 200, 500, 1000],
				labels = [],
				from, to;
					
				for (var i = 0; i < grades.length; i++) {
					from = grades[i];
					to = grades[i + 1];
					
					labels.push('<i style="background:' + getColor(from + 1) + '"></i> ' +
								from + (to ? '&ndash;' + to : '+'));
				}
					
				div.innerHTML = labels.join('<br>');
				return div;
			};
					
legend.addTo(map);