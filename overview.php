<?php
session_start();

$mysqli=new mysqli("localhost", "root", "", "kalender");
$mysqli->set_charset("utf8");
//get the week range from the client.
function getEvent($mysqli)
{
    if(isset($_POST['rangeFrom'])&&isset($_POST['rangeTo'])&&isset($_SESSION['userid']))
    {
        $rangeFrom=$_POST['rangeFrom'];
        $rangeTo=$_POST['rangeTo'];
       $userId=$_SESSION['userid'];
      
      

    $sql="select datum, event from login join events on login.userid=events.userid where login.userid='$userId' and datum<='$rangeTo' and datum>='$rangeFrom' order by datum";

if($result=$mysqli->query($sql))
{
while($row=$result->fetch_row())
{
    echo "<div class='dag'><p class='dd'>$row[0]</p><p class='de'>$row[1]</p></div>";

}
}


    }
    
}
getEvent($mysqli);
?>