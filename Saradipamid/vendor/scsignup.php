<?php 

	require_once"../connect/connect.php";
	$sub = $_POST['sub'];
	if ((@$_SESSION['user']) || (!isset($sub))) {
		header('Location:../main/index.php');
	}

	// imie
	$imie = $_POST['imie'];
	// nazwisko
	$nazw = $_POST['nazw'];
	// login
	$log = $_POST['logi'];
	// mail
	$mail = $_POST['mail'];
	// data urodzenia
	$data = $_POST['data'];
	// hasło
	$has = $_POST['pass'];
	// sprawdzanie hasła
	$phas = $_POST['pass-conf'];
	// wyszukiwanie użytkownika z takim samym loginem lub mailem
	$sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `login` = '$log' OR `email` = '$mail'");
	$row = mysqli_fetch_assoc($sql);
	$logos = $row['login'];
	$mailo = $row['email'];
	// jak login lub majl są zajęci osoba będzie zwrócona do strony rejestracyjnej
	if (($log === $logos) || ($mail === $mailo)) {
		$_SESSION['wronglog'] = 'Login lub poczta jest zajęta';
		header('Location: ../baza-danych/signup.php');
	}
	// jak nie ma zajątego logina lub mailu to wykonuje skrypt rejstracyjny
	else {
		// jeżeli hasła są takie same to wykonuje skrypt rejestracyjny
		if ($has === $phas) {
		// kodowanie md5 dla bezpieczeństwa hasła
		$has = md5($has);
		// zapytanie do bazy danych dla rejestracji
		$reg = mysqli_query($conn, "INSERT INTO `users` (`id`, `imie`, `nazwisko`, `login`, `haslo`, `email`, `wiek`) VALUES (NULL, '$imie', '$nazw', '$log', '$has', '$mail', '$data') ");
		header('location: ../baza-danych/login.php');
		
		}
		// jeżeli hasło się róż ni to osaba będzie zwrócona do strony rejestracyjnej
		else{
			$_SESSION['wrongpass'] = 'Hasło się różni';
			header('Location: ../baza-danych/signup.php');
		}
	}
	
?>