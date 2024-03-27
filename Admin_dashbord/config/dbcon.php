<?php 
$host = "localhost";
$username = "root";
$passsword ="";
$database = "stylishyou";

// creation du connexion avec base de donnee
$con = mysqli_connect($host, $username, $passsword, $database);

// verification du connexion avec base de donnee
if(!$con){
    die("Connection Failed ! : ". mysqli_connect_error());
}

?>