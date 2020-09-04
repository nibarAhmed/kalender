<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="credate.php" method="post">
        <input type="date" name="datum" require>
        <input type="text" name="event" require>
        <input type="submit" value="klar" name="submit">
    </form>
    <?php
    //$_SESSION['userid'] = $userid;
    $userid = 111;
   
    $conn = new mysqli('localhost', 'root','','kalender');
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
     }  

         $datum = $_POST['datum'];
        $event = $_POST['event'];
        if (empty($event)) {
            echo"error";
        }elseif($datum == 0000-00-00) {
            echo"error";
        }else{
        $sql = "INSERT INTO events(event,datum,userid) VALUES ('$event','$datum','$userid')";
        
        $conn->query($sql);
echo "<form action='events.php'>
    <input type='submit' value='event tillagt'>
</form>";
        }
        
     
     
     
    ?>
</body>
</html>