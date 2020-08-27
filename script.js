var date=new Date();
date.setDate(1);
date.setMonth(0);
date.setFullYear(2020);
var test=" ";
//the for loop is based on the amount of days of the year. this is so that we are able to generate the right amount of days
for(var i=0; i<366; i++)
{
     test+=date.toDateString()+'</br>';
    document.getElementById('date').innerHTML=test;
    //here we check if the date has reached 1 we the month changes to the next month and the date changes as well. if date isn't one we continue to generate days until we reach 1.
if(date==1)
{
date.setMonth(date.getDate()+1);
date.setDate(date.getDate()+1);
}
else
date.setDate(date.getDate()+1);
}