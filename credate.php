<?php
session_start();
//there seems to be a weerd bug where if the session check gets placed in the body and the same code as the function that inserts  events in to the db the session will not be set. this is the only workaround i've found without redesigning the code completely.
if(isset($_SESSION['userid']))
$userid=$_SESSION['userid'];


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
<a href="events.php"><p class="tilbe">< gå tillbaka</p></a>
    <form class="logwrap" action="credate.php" method="post">
        <input class="textin" type="date" name="datum"  require>
        <input class="textin" type="text" name="event" placeholder="eventbeskrivning" require>
        <input type="submit" value="klar" name="submit">
    </form>
    
    <?php
    $conn = new mysqli('localhost', 'root','','kalender');
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
     }  
if(isset($_POST['submit']))
{
 if(isset($_POST['datum']))
 $datum = $_POST['datum'];
 else
 echo "välj ett datum";

if(isset($_POST['event']))
        $event = $_POST['event'];
        else
        echo "vänligen skriv in en eventbeskrivning";
        //inserting in to the db and checking so that the event is inserted.

        if (empty($event)) {
            echo"eventbeskrivning saknas";
        }elseif($datum == 0000-00-00) {
            echo"datum saknas";
        }else{
        $sql = "INSERT INTO events(event,datum,userid) VALUES ('$event','$datum','$userid')";
        if($conn->query($sql))
        {
            header("location:events.php");
        }
}
}
        
    ?>    
    
</body>
</html>