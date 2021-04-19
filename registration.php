<!DOCTYPE html>
<html lang = "pl">
 <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formularz Rejestracyjny</title>
    <link rel="shortcut icon" href="images/agh.png"/>
	<link href="style.css" rel="stylesheet"> 	
	
 </head>

 <body> 
 
 <header>
		<div class="container">
        <img class="logo" src="images/agh.png" alt="logo"> 
			<h1>Biblioteka Główna <br> Formularz Rejestracyjny</h1>                      		
		</div>
	</header>

	<main>
		<div class="container">	

			<section>
				<form id="form" class="form" method="get" action="<?php print($_SERVER['PHP_SELF']);?>">					
					<div class="short-input">						
						<div class="form-control">
							<label for="first-name">Imię:</label><br>
							<input type="text" id="first-name" name="first-name" required>
							<small>Error message</small>
					    </div>
						<div class="form-control">
							<label for='last-name'>Nazwisko:</label><br>
							<input type="text" id="last-name" name="last-name" required>
							<small>Error message</small>
					    </div>
					</div>					
					<div class="form-control">
					<label for="student-index">Numer albumu:</label><br>
					<input type="text" id="student-index" name="student-index" required><br>
					<small>Error message</small>
					</div>
					<div class="form-control">
                    <div class="short-input">
					<div>										
					<label>Studia I stopnia: <input type="radio" name="c-studies" value="I"></label>
                    </div>
					<div>
                    <label>Studia II stopnia: <input type="radio" name="c-studies" value="II"></label>
                    </div>
					</div>
					<small>Error message</small>
					</div>
					<div class="form-control">
                    <label for="faculty">Wydział:</label><br>
                    <select name="faculty" id="faculty">
                            <option value="WGiG">Górnictwa i Geoinżynierii</option>
								<option value="WIMiIP">Inżynierii Metali i Informatyki Przemysłowej</option>
								<option value="WEAIiIB">Elektrotechniki, Automatyki, Informatyki i Inżynierii Biomedycznej</option>
								<option value="WIEiT">Informatyki, Elektroniki i Telekomunikacji</option>
								<option value="WIMiR">Inżynierii Mechanicznej i Robotyki</option>
								<option value="WGGiOS">Geologii, Geofizyki i Ochrony Środowiska</option>
								<option value="WGGiIS">Geodezji Górniczej i Inżynierii Środowiska</option>
								<option value="WIMiC">Inżynierii Materiałowej i Ceramiki</option>
								<option value="WO"> Odlewnictwa </option>
								<option value="WMN">Metali Nieżelaznych</option>
								<option value="WWNiG">Wiertnictwa, Nafty i Gazu</option>
								<option value="WZ">Zarządzania</option>
								<option value="WEiP">Energetyki i Paliw</option>
                                <option value="WFiIS">Fizyki i Informatyki Stosowanej</option>
                                <option value="WMS">Matematyki Stosowanej</option>
                                <option value="WH">Humanistyczny</option>
                    </select>
					<small>Error message</small>
					</div>
					<div class="form-control">
                    <label for="field-of-study">Kierunek studiów:</label><br>
					<input type="text" id="field-of-study" name="field-of-study" required><br>
					<small>Error message</small>
					</div>
					<div class="form-control">
                    <label for="phone-number">Telefon:</label><br>
					<input type="text" id="phone-number" name="phone-number" placeholder="przykład: 123456789" required><br>
					<small>Error message</small>
					</div>
					<div class="form-control">
					<label for="email">Email:</label><br>
					<input type="email" id="email" name="email" placeholder="przykład: myname@example.com" required>
					<small>Error message</small>
					</div>
					<div class="form-control">
					<label for="pwd">Hasło:</label><br>                    
                    <input type="password" id="pwd" name="pwd" required><br>
					<small>Error message</small>
                    </div>
					<div class="form-control">					
                    <label for="pwd2">Powtórz hasło:</label><br>                    
                    <input type="password" id="pwd2" name="pwd2" required><br>
					<small>Error message</small>
                    </div>
                    <button name="submit">Submit</button>		
					
				</form>
			</section>
			
		</div>
		
	</main>	
	
<?php
$servername = "localhost";
$username = "admin";
$password = "admin";
$db = "library";
$connection = new mysqli($servername, $username, $password, $db);

if($connection->connect_error){
    
die("Connect failed: ".$connection->connection_error);
    
}

if(isset($_GET['submit'])) {
	
	$firstname = $_GET['first-name'];
	$lastname = $_GET['last-name'];
	$studentindex = $_GET['student-index'];
	$cstudies = $_GET['c-studies'];
    $faculty = $_GET['faculty'];
    $fieldofstudy = $_GET['field-of-study'];
    $phonenumber = $_GET['phone-number'];
	$email = $_GET['email'];
	$pwd = $_GET['pwd'];
	$pwd2 = $_GET['pwd2'];	
	$fails = 0;

	$emailPattern = "/[a-z0-9\.-]+@[a-z0-9]+(\.[a-z0-9]+)*\.[a-z]{2,3}/i";
	$passwordPattern = "/[a-z0-9]{7,}./";
	
	
	if (strlen($firstname) <= 2) {		
		$fails++;
	}

	if (strlen($lastname) <= 2) {		
		$fails++;
	}	

	if (strlen($studentindex) !== 6) {		
		$fails++;
	}	

	if (strlen($phonenumber) !== 9) {		
		$fails++;
	}	

	if (preg_match($emailPattern, $email) !== 1) {		
		$fails++;
	}

	if (preg_match($passwordPattern, $pwd) !== 1) {		
		$fails++;
	}

	if ($pwd !== $pwd2) { 		
		$fails++;
	}	

	if ($fails === 0){
		$myMultiQuery = "INSERT INTO Students (firstname, lastname, studentindex, cstudies, faculty, fieldofstudy, phonenumber, email, pass) VALUES ('$firstname', '$lastname', '$studentindex', '$cstudies', '$faculty', '$fieldofstudy', '$phonenumber', '$email', '$pwd');";
		if ($connection->multi_query($myMultiQuery)){
            echo "<script type='text/javascript'>alert('Student {$firstname} {$lastname} (nr albumu: {$studentindex}, Studia {$cstudies} stopnia, {$faculty}, {$fieldofstudy}) został dodany do bazy Biblioteki Głównej! ');</script>";
        } else {
			echo "<script type='text/javascript'>alert('Wystąpił błąd. Student nie został dodany do bazy Biblioteki Głównej');</script>";
        }		    
	}	
	  
}

?>
<script type="text/javascript" src="script.js"></script>
</body>
</html>