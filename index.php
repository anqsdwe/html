<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>  
  <meta content="text/html; charset=utf-8" http-equiv="content-type">
  <link href='http://fonts.googleapis.com/earlyaccess/nanumgothic.css' >
  <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
  <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script> 
  <script type="text/javascript" src="js/setDate.js"></script>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script src="js/jquery-1.9.1.min.js"></script>  
  <script src="jquery-ui-/jquery-ui.js" ></script>
  <script src="JQRange/jQDateRangeSlider-withRuler-min.js"></script>
 <link rel="stylesheet" href="JQRange/css/iThing.css" type="text/css" />
	
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="icon" href="/image/sunglasses.ico">
  <title>Main Page</title>
  
  <style>
  	.info {
			padding: 6px 8px;
			font: 14px/16px Arial, Helvetica, sans-serif;
			background: white;
			background: rgba(255,255,255,0.8);
			box-shadow: 0 0 15px rgba(0,0,0,0.2);
			border-radius: 5px;
		}
		.info h4 {
			margin: 0 0 5px;
			color: #777;
		}

		.legend {
			text-align: left;
			line-height: 18px;
			color: #555;
		}
		.legend i {
			width: 18px;
			height: 18px;
			float: left;
			margin-right: 8px;
			opacity: 0.7;
		}
  </style>

</head>
<body onLoad="setDate(document.forms[0])">

<div id="wrap">
	<div id="header">
    
        <div class="header_container">
        	<img src="image/header_menu.jpg" align="middle" usemap="#logo" />
            <map name="logo">
            	<area shape="rect" coords="10,16,254,98" href="#" target="_self">
                <area shape="rect" coords="320,80,435,24" href="#" target="_self">
                <area shape="rect" coords="440,80,545,24" href="#" target="_self">
                <area shape="rect" coords="573,80,697,24" href="#" target="_self">
                <area shape="rect" coords="735,80,863,24" href="#" target="_self">
                <area shape="rect" coords="900,80,1077,24" href="#" target="_self">
            </map>
        	<h1><a href="#">2015 KOOKMIN UNIVERSITY CAPSTONE DESIGN</a></h1>
        	<h2>검색 트래픽 데이터와 서울 아파트 매매가격간의 상관관계</h2>
    	</div><!--header_container end-->
    </div><!--header end-->
    
    <div id="contents">
    	
        <div id="cont_tit">
        	<img src="image/menubar.jpg" style="display:block; margin-left:auto; margin-right:auto;" usemap="#cont" />
            <map name="cont">
            	<area shape="rect" coords="1,1,2,2" href="#" target="_self">
                <area shape="rect" coords="797,196,1003,255" href="#" target="_self">
            </map>
        </div><!--cont_tit end-->
    
    	<div id="cont_cont">
		
                <div class="cont_container">
			
		<div id="slider"> 
						
				<!-- 슬라이더 !-->
                	    </div>
			<span id="dateval" style="font-size:20px;color:white;">2013 . 2</span>			

	
	<script>	
  //<!--
  (function($){
    $(document).ready(function(){
      $("#slider").dateRangeSlider({
        bounds: {min: new Date(2013, 1), max: new Date(2015, 2)},
        defaultValues: {min: new Date(2013, 1), max: new Date(2013,1)},
		valueLabels:"change",
		durationIn:1000,
		durationOut:1000,
		range:{min:{months:1}, max: {months:1}},
		step:{months:1},
		formatter:function(val){
        var month = val.getMonth() + 1,
          year = val.getFullYear();
        return year + "년 " + month+"월";
      },
        scales: [{
          next: function(val){
            var next = new Date(val);
            return new Date(next.setMonth(next.getMonth() + 1));
          },
          label: function(val){
            return "";
          }
        }]//scales
      });//dateRangeSlider arguments
    });//ready function

$("#slider").bind("valuesChanging", function(e, data){
  var dateValues = $("#slider").dateRangeSlider("values").min;
      var month = dateValues.getMonth() + 1,
          year = dateValues.getFullYear();
    
  $('#dateval').text(year+" . " + month);
  });
  })(jQuery);</script><!--- !-->
                	<div id="map">
                    <script type="text/javascript" src="js/seoul.js"></script>
					<script type="text/javascript">
					
						google.load("visualization", "1", {packages:["corechart"]});
      					google.setOnLoadCallback(drawChart);
      					function drawChart(d) {
							var current, year, month
							current = new Date();
							year = (year) ? year : current.getFullYear();
							month = (month) ? month : current.getMonth();
        					var data = google.visualization.arrayToDataTable([
          						['Year/Month', '트래픽 데이터', '실거래가'],
          						[year+'/'+(month-3),  1000,      400],
          						[year+'/'+(month-2),  1170,      460],
         					 	[year+'/'+(month-1),  660,       1120],
          						[year+'/'+month,  1000,      d.density]
       					 	]);
							
        					var options = {
							title: d.name+' 매매가 예측 그래프',
         					hAxis: {title: 'Year/Month',  titleTextStyle: {color: '#333'}},
         					vAxis: {minValue: 0}
        					};

       				 		var chart = new google.visualization.AreaChart(
								document.getElementById('chart_div'));
       						chart.draw(data, options);
      					}
						
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
								'<b>' + props.name + '</b><br />' + props.density + 
								' 원 / m<sup>2</sup>': '구 위에 마우스를 올려보세요!');
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
					
								labels.push(
									'<i style="background:' + getColor(from + 1) + '"></i> ' +
									from + (to ? '&ndash;' + to : '+'));
							}
					
							div.innerHTML = labels.join('<br>');
							return div;
						};
					
						legend.addTo(map);
						
						
						
						
                    </script>
                    
                    
					
                    </div>    
                    <!--<div id="chart_div" style="width:400; height:300"></div>-->
                </div><!--cont_container end-->
    	</div><!--cont_cont end-->
    </div><!---contents end-->
    
    <div id="footer">
    	<div class="footer_container">
        	<ul>
            	<li><a href="#"><strong>사이트 제작자 : Fantastic Apartment</strong></a></li>
                <li><a href="http://kookmin.ac.kr" target="_blank">목적 : CAPSTONE DESIGN</a></li>
				<li><a href="#">연락처:02-910-4114</a></li>
                <li><a href="http://www.r-one.co.kr/rone/" target="_blank">Source of Data</a></li>
        	</ul>
        </div><!--foote_container end-->
    </div><!--footer end-->
    
</div><!--wrap div end-->

</body>
</html>
