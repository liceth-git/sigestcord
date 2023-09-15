<?php
$severname ="localhost";
$username = "root";
$password ="";
$baseSG = "sigestcor";

$conn = new mysqli($severname,$username,$password,$baseSG);
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
    
}
else{
echo" conectada correctamente";
}
?>