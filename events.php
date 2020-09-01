<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
}
   

?>
<a href="credate.php"><p>till skapa</p></a>
</body>
</html>