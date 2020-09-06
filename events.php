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
<div class="evewrap">
<?php
    $conn = new mysqli('localhost', 'root','','kalender');
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
     }  
    //$_SESSION['userid'] = $userid;
    $userid = 111;
    $sql= "SELECT event,datum FROM events WHERE userid='$userid' ORDER BY datum";
    $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       echo '<div class="eve">
         <p class="date">'.$row["datum"].'</p>
        <p class="not">'.$row["event"].'</p>
    </div>';
       
}    
}else{
    echo"anvendaren har inga events";
}
?>
</div>
<a href="credate.php"><div class="tocre">+ läggtill påminelse</div></a>
     
    
</body>
</html>