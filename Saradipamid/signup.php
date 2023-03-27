<?php 

	session_start();
	
	require_once"connect.php";

	if (!$conn) {
		echo "Baza zdechła";
	}


?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Zarejstruj</title>
	<link rel="stylesheet" href="style1.css">
</head>
<body>
	<div>
		<form action="vendor/scsignup.php" method="POST">
			<input name="imie" type="text" placeholder="Imię" required><br>
			<input name="nazw" type="text" placeholder="Nazwisko" required><br>
			<input name="logi" type="text" placeholder="Login" required><br>
			<input name="mail" type="email" placeholder="Email" required><br>
			<input name="data" type="date" placeholder="Data" required><br>
			<input name="pass" type="password" placeholder="Hasło" required><br>
			<input name="pass-conf" type="password" placeholder="Napisz ponownie hasło" required><br>
			<input type="submit" value="Zarejstruj"><br><br>
			<?php
			
			if (@$_SESSION['wronglog']) {
				echo "<p>".@$_SESSION['wronglog']."</p>";
			}
			unset($_SESSION['wronglog']);
			if (@$_SESSION['wrongpass']) {
				echo "<p>".@$_SESSION['wrongpass']."</p>";
			}
			unset($_SESSION['wrongpass']);
				
				
			?>
			
		</form>
	</div>
	

</body>
</html>