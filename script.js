//this is a prototype. this prototype adds functionality to the date object that enables us to get the number of the current week.
Date.prototype.getWeekNumber = function(){
    var d = new Date(Date.UTC(this.getFullYear(), this.getMonth(), this.getDate()));
    var dayNum = d.getUTCDay() || 7;
    d.setUTCDate(d.getUTCDate() + 4 - dayNum);
    var yearStart = new Date(Date.UTC(d.getUTCFullYear(),0,1));
    return Math.ceil((((d - yearStart) / 86400000) + 1)/7)
  };
//this is the date object that we will use to generate the kalender with.
var date=new Date();
date.setDate(1);
date.setMonth(0);
date.setFullYear(2020);
//this date object will hold the current date. this will be used to generate the week number. it needs to be current because the user is going to see the events for the current week.
var currentDate=new Date();

function generateCalendar(date)
{
var dateStr=" ";
//the for loop is based on the amount of days of the year. this is so that we are able to generate the right amount of days
for(var i=0; i<366; i++)
{
     dateStr+=date.toDateString()+'</br>';
    document.getElementById('date').innerHTML=dateStr;
    //here we check if the date has reached 1  the month changes to the next month and the date changes as well. if date isn't one we continue to generate days until we reach 1.
if(date==1)
{
date.setMonth(date.getDate()+1);
date.setDate(date.getDate()+1);
}
else
date.setDate(date.getDate()+1);
}
}
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
generateWeek(currentDate);