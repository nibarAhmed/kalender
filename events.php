<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="kalender.css">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">

</head>
<body>
    
<?php
    $conn = new mysqli('localhost', 'root','','kalender');
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
     }  
    //$_SESSION['userid'] = $userid;
    $userid = 111;
    $sql= "SELECT event,datum FROM events WHERE userid='$userid'";
        
    $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       echo $row['datum'], $row['event'];
       
       
    }    
}else{
    echo"anvendaren har inga events";
}
   

?>

<a href="credate.php"><div class="tocre">till skapa</div></a>
<div class="event">
    <div class="eve">
        <p class="datum">2020-09-03</p>
        <p class="not">fotbollsmach på söndag</p>
    </div>
</div>
</body>
</html>