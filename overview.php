<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
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
    echo "<div class="dag">$row[0] $row[1]</div>";

}
}


    }
    
}
getEvent($mysqli);
?>
</body>
</html>
