<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>  
  <meta content="text/html; charset=utf-8" http-equiv="content-type">
  <link href='http://fonts.googleapis.com/earlyaccess/nanumgothic.css' >
  <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
  <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
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
<body>

<div id="wrap">
	<div id="header">
    	<div class="icon">
        	<img src="image/header_menu.jpg" usemap="#logo" />
            <map name="logo">
            	<area shape="rect" coords="10,16,254,98" href="#" target="_self">
                <area shape="rect" coords="320,80,435,24" href="#" target="_self">
                <area shape="rect" coords="440,80,545,24" href="#" target="_self">
                <area shape="rect" coords="573,80,697,24" href="#" target="_self">
                <area shape="rect" coords="735,80,863,24" href="#" target="_self">
                <area shape="rect" coords="900,80,1077,24" href="#" target="_self">
            </map>
        </div><!--logojpg end-->
        <div class="header_container">
        	<h1><a href="#">2015 KOOKMIN UNIVERSITY CAPSTONE DESIGN</a></h1>
        	<h2>검색 트래픽 데이터와 서울 아파트 매매가격간의 상관관계</h2>
    	</div><!--header_container end-->
    </div><!--header end-->
    
    <div id="contents">
    	
        <div id="cont_nav">
            <div class="nav_container">
            	<img src="image/menubar.jpg" style="display:block; margin-left:auto; margin-right:auto;" usemap="startgraph" />
            <map name="startgraph">
            	<area shape="rect" coords="1,1,2,2" href="#" target="_self" >
                <area shape="rect" coords="50,196,1003,255" href="#" target="_self" style="border:1px solid #FFF;">
            </map>
            </div><!-- nav_container-->
        </div><!-- cont_nav-->
        
        <div id="cont_tit">
        <div class="tit_container">
        	<div id="slider"></div>
						<span id="dateval" style="font-size:20px;color:white;">2013 . 2</span>
         </div><!-- tit_container-->
        </div><!--cont_tit end-->
        
		<div id="cont_cont">	
                <div class="cont_container">
                	<div id="map"></div>    
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
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/seoul.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/chart.js"></script>

</body>
</html>
