<?php
$host= "localhost";
$name= "root";
$pass="";
$dbName = "sportusrbiji";
global $conn;
$conn= mysqli_connect($host,$name,$pass,$dbName);

if(!$conn){
    echo"Konekcija nije uspesna";
}
?>
