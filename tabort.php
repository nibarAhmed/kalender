<?php
session_start();
$conn = new mysqli('localhost', 'root','','kalender');
$conn->set_charset("utf8");
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
 }
 $userid=$_SESSION['userid'];

 $datum=$_POST['datum'];
 $event=$_POST['event'];

 $sql="DELETE FROM events WHERE event='$event' AND datum='$datum' AND userid='$userid'";
 $conn->query($sql);

 header("location:events.php");
?>