// JavaScript Document
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
  })(jQuery);