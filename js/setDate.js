// JavaScript Document
function setDate(FORM, year, month, day) {

  var current, year, month, day, days, i, j;
  current = new Date();
  year = (year) ? year : current.getFullYear();
  var k = 8;
  for (i=0, j=year-k; i < (k+1); i++, j++) FORM.year.options[i] = new Option(j, j);
  month = (month) ? month : current.getMonth()+1;
  
  for (i=0; i < 12; i++) {
    j = (i < 9) ? '0'+(i+1) : i+1;
    FORM.month.options[i] = new Option(j, j);
  }
  day = (day) ? day : current.getDate();
  days = new Date(new Date(year, month, 1)-86400000).getDate();
  FORM.day.length = 0;
  for (i=0, j; i < days; i++) {
    j = (i < 9) ? '0'+(i+1) : i+1;
    FORM.day.options[i] = new Option(j, j);
  }
  FORM.year.value = year;
  FORM.month.options[month-1].selected = true;
  FORM.day.options[day-1].selected = true;

}