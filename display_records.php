<?php
$servername = "localhost";
$username = "admin";
$password = "admin";
$db = "library";

$connection = new mysqli($servername, $username, $password, $db);

if($connection->connect_error){
    
die("Connect failed: ".$connection->connection_error);
}


$querySelect = "SELECT id, firstname, lastname, studentindex, cstudies, faculty, fieldofstudy, phonenumber, email, pass, reg_date FROM students";
    $result = $connection->query($querySelect);

echo "<table>"; 
echo "<font size='12' face='Bold Italic'><tr>";
echo("Biblioteka Główna - Baza Danych<tr><td>");
echo("Id <td> First name </td><td> Last name </td><td> Student index </td><td> C-studies </td><td> Faculty </td><td> Field of study </td><td> Phone number </td><td> Email </td><td> Password </td><td> Registration date </td>");
if ($result->num_rows > 0){

while ($row = $result->fetch_assoc()) {   
    
    echo "<tr><td>" . $row['id'] . "</td><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row['studentindex'] . "</td><td>" . $row['cstudies'] . "</td><td>" . $row['faculty'] . "</td><td>" . $row['fieldofstudy'] . "</td><td>" . $row['phonenumber'] . "</td><td>" . $row['email'] . "</td><td>" . $row['pass'] . "</td><td>" . $row['reg_date'] ."</td></tr>";
}

}
else {
    print("No results");
}
echo "</table>"; 

$connection->close();


?>

<style type="text/css">

body {
background: url("images/books.jpg");
color: #fff; 
}

</style>
