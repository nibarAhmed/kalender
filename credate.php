<?php
session_start();
//there seems to be a weerd bug where if the session check gets placed in the body and the same code as the function that inserts  events in to the db the session will not be set. this is the only workaround i've found without redesigning the code completely.
if(isset($_SESSION['userid']))
$userid=$_SESSION['userid'];
echo $userid;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="credate.php" method="post">
        <input type="date" name="datum"  require>
        <input type="text" name="event" placeholder="eventbeskrivning" require>
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
        $sql = "INSERT INTO events(event,datum,userid) VALUES ('$event','$datum','$userid')";
        if($conn->query($sql))
        {
echo "<form action='events.php'>
    <input type='submit' value='event tillagt'>
</form>";
        }
}

        
    ?>    
</body>
</html>