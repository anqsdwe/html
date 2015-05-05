// JavaScript Document
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