<?php 
	
	session_start();

	require_once"../connect.php";


?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 

	$imie = $_POST['imie'];
	$nazw = $_POST['nazw'];
	$log = $_POST['logi'];
	$mail = $_POST['mail'];
	$data = $_POST['data'];
	$has = $_POST['pass'];
	$phas = $_POST['pass-conf'];
	$sql = mysqli_query($conn, "SELECT `login` FROM `users` WHERE `login` = '$log'");
	$row = mysqli_fetch_assoc($sql);
	$logos = $row['login'];
	if ($log === $logos) {
		$_SESSION['wronglog'] = 'Login jest zajęty';
		header('Location: ../signup.php');
	}else {
		if ($has === $phas) {
			echo "string";
		
		$has = md5($has);
		$reg = mysqli_query($conn, "INSERT INTO `users` (`id`, `imie`, `nazwisko`, `login`, `haslo`, `email`, `wiek`) VALUES (NULL, '$imie', '$nazw', '$log', '$has', '$mail', '$data') ");
		header('location: ../login.php');
		
		}else{
			$_SESSION['wrongpass'] = 'Hasło się różni';
			header('Location: ../signup.php');
		}
	}
	

	?>
</body>
</html>