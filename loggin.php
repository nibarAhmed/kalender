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
$x = $_POST['x'];//holler koll på om du skapat skapat ett tidigare konto.
   $conn = new mysqli('localhost', 'root','','kalender');
   $conn->set_charset("utf8");
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM login WHERE user='$user' AND password='$password'";
$query = $conn->query($sql);

$resultat = $query->fetch_assoc();
switch($x){
    case 1:        
if (!empty($resultat)) {
    echo "<form action='kal.html' method='post'>
    <input type='submit' value='välkommen'>
</form>";
}else {
    echo "<form action='loggin.html' method='post'>
    <input type='submit' value='prövaigen'>
</form>";
    } 
break;
case 2:
    if(!empty($resultat)) {
        echo "<form action='logg.html' method='post'>
        <input type='submit' value='det här användaren fis redan'>
    </form>";
    }else {
        $sql = "INSERT INTO login (user,password) VALUES ('$user','$password')";
$conn->query($sql);
        echo "<form action='lokal.html' method='post'>
        <input type='submit' value='välkommen'>
    </form>";
        } 
break;
}



?>
</body>
</html>