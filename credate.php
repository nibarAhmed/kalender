<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="credate.php" method="post">
        <input type="date" name="datum">
        <input type="text" name="event">
        <input type="submit" value="klar">
    </form>
    <?php
    $_SESSION['userid'] = $userid;
    $datum = $_POST['datum'];
    $event = $_POST['event'];
    $conn = new mysqli('localhost', 'root','','kalender');
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
     
 }
 
     $sql = "INSERT INTO events(event,datum,userid,week) VALUES ('$event','$datum','$userid','$week')";
     $conn->query($sql);
    
    ?>
</body>
</html>