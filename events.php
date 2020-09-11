<?php
session_start();
?>
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
     $userid=$_SESSION['userid'];
    if(isset($_SESSION['userid']))
    {
     $userid=$_SESSION['userid'];

    $sql= "SELECT event,datum FROM events WHERE userid='$userid' ORDER BY datum";
    $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       echo '<div class="eve">
         <p class="date">'.$row["datum"].'</p>
        <p class="not">'.$row["event"].'</p>
        <form action="tabort.php" method="post">
        <input class="tabr" type="submit" value="ta bort">
        <input type="hidden" name="datum" value="'.$row["datum"].'">
        <input type="hidden" name="event" value="'.$row["event"].'">
        </form>
    </div>';
       
}    
}else{
    echo"<div class='eve'>du har inga påminelser</div>";
}
    }
?>
</div>
<a href="credate.php"><div class="tocre">+ lägg till pominelse</div></a>
<a href="index.php"><div class="tocre">tilbaka till din vecka</div></a>
     
    
</body>
</html>