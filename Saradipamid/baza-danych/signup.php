<?php 
	
	require_once"../connect/connect.php";
	if (@$_SESSION['user']) {
		header('Location:../main/index.php');
	}
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
	<a class="pow" href="login.php">&#8592;Powrót</a>
	<div>
	<!-- Formularz rejestracyjny -->
		<form action="../vendor/scsignup.php" method="POST">
			<input name="imie" type="text" placeholder="Imię" autocomplete="off" required><br>
			<input name="nazw" type="text" placeholder="Nazwisko" autocomplete="off" required><br>
			<input name="logi" type="text" placeholder="Login" autocomplete="off" required><br>
			<input name="mail" type="email" placeholder="Email" required><br>
			<input name="data" min="1900-01-01" type="date" placeholder="Data" required><br>
			<input name="pass" type="password" placeholder="Hasło" autocomplete="off" minlength="8" required><br>
			<input name="pass-conf" type="password" placeholder="Napisz ponownie hasło" autocomplete="off" required><br>
			<input name="sub" type="submit" value="Zarejstruj"><br><br>
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
<?php 

 mysqli_close($conn)

?>