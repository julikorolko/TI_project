<?php
$servername = "localhost";
$username = "admin";
$password = "admin";
$db = "library";

$connection = new mysqli($servername, $username, $password, $db);

if($connection->connect_error){
    
die("Connect failed: ".$connection->connection_error);
}

$myQuery = "CREATE TABLE Students (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    studentindex INT(6) NOT NULL,
    cstudies VARCHAR(3) NOT NULL,
    faculty VARCHAR(20) NOT NULL,
    fieldofstudy VARCHAR(50) NOT NULL,
    phonenumber INT(9) NOT NULL,
    email VARCHAR(50),
    pass VARCHAR(30),    
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if($connection->query($myQuery)) {
   
    print("Tabela została stworzona pomyślnie");
} else {
    print("Błąd tworzenia tabeli: ". $connection->error . "<br>");   
}


?>