//this is a prototype. this prototype adds functionality to the date object that enables us to get the number of the current week.
Date.prototype.getWeekNumber = function(){
    var d = new Date(Date.UTC(this.getFullYear(), this.getMonth(), this.getDate()));
    var dayNum = d.getUTCDay() || 7;
    d.setUTCDate(d.getUTCDate() + 4 - dayNum);
    var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
    return Math.ceil((((d - yearStart) / 86400000) + 1)/7)
  };
//this is the date object that we will use to generate the kalender with.
//this date object will hold the current date. this will be used to generate the week number. it needs to be current because the user is going to see the events for the current week.
var currentDate=new Date();

//this function will print out the week as well as the days of the week.
function generateWeek(currentDate)
{
document.getElementById("weekNumber").innerHTML= currentDate.getWeekNumber();
var days=["monday", "tue", "wednesday", "thursday", "fri", "saterday", "sunday"];
var daysStr=" ";
for(var i=0; i<7; i++)
{
    document.getElementById("day").innerHTML+=days[i]+'</br>';
}

}
function getDateRangeWeek(weekNo){
  var d1 = new Date();
  numDaysPastLastMonday = eval(d1.getDay()- 1);
  d1.setDate(d1.getDate() - numDaysPastLastMonday);
  var weekNoToday = d1.getWeekNumber();
  var weeksInTheFuture = eval( weekNo - weekNoToday );
  d1.setDate(d1.getDate() + eval( 7 * weeksInTheFuture ));
  var rangeIsFrom = d1.getFullYear()+"-"+eval( d1.getMonth()+1) +"-" +d1.getDate();
  d1.setDate(d1.getDate() + 6);
  var rangeIsTo =d1.getFullYear()+'-'+ eval(d1.getMonth()+1) +"-" + d1.getDate() + "-";
  return    [ rangeIsFrom, rangeIsTo];

}
//now we are going to send the info above to php
$(document).ready(sendWeek(currentDate));
function sendWeek(currentDate)
{
    var range=getDateRangeWeek(currentDate.getWeekNumber());
    var rangeFrom=range[0];
    var rangeTo=range[1];
    $.ajax({
      url: "overview.php",
      type: "post",
      data:
      {
        rangeFrom: rangeFrom,
        rangeTo: rangeTo
      },
      //we are only going to send the range of the week to our php script. we actually do not expect a responce from our php script since rom that point onwords everything will be handeled by our php script. therefore we will get the responce function to return true so that if needed it's possible to verify tha the requrest has succeeded.
      success: function(data)
      {
        document.getElementById("event").innerHTML=data;
      }
    
    });
    

}
