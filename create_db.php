<?php

$servername = "localhost";
$username = "admin";
$password = "admin";

$connection = new mysqli($servername, $username, $password);

if($connection->connect_error){
 
    die("Connect failed: ".$connection->connection_error);
   
}

$sqlQuery = "CREATE DATABASE library";

if($connection->query($sqlQuery) === TRUE) {
  
    print("Stworzono nową bazę danych");
} else {
    print("Nie powiodło się: ". $connection->error);
    
}
$connection->close(); 

?>
