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

$user=$_POST['user'];
$password = $_POST['password'];

$x = $_POST['x'];//holler koll på om du skapat ett tidigare konto.
   $conn = new mysqli('localhost', 'root','','kalender');
   $conn->set_charset("utf8");
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT userid FROM login WHERE user='$user' AND password='$password'";

$query = $conn->query($sql);

$resultat = $query->fetch_assoc();
switch($x){
    case 1:        
if (!empty($resultat)) {
$resultt = $conn->query($sql);
     if ($resultt->num_rows > 0) {
        while($row = $resultt->fetch_assoc()) {
           $userid=$row['userid'];
        } }
        header("location:index.php");
}else {
    header("location:loggin.html");
    } 
break;
case 2:
    if(!empty($resultat)) {
        header("location:skapa.html");
    }else {
        $sql = "INSERT INTO login (user,password) VALUES ('$user','$password')";
$conn->query($sql);
    $sql = "SELECT userid FROM login WHERE user='$user' AND password='$password'";
    $resultt = $conn->query($sql);
     if ($resultt->num_rows > 0) {
        while($row = $resultt->fetch_assoc()) {
           $userid=$row['userid'];
        } }
        header("location:index.php");
        } 
break;
}

$_SESSION['userid']=$userid;
echo $userid;
?>
</body>
</html>