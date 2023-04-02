<?php 
	
	require_once"connect.php";
	// Sprawdzanie istnienia urzytkownika
	if (@$_SESSION['user']) {
		header('Location:index.php');
	}

?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Zaloguj</title>
	<link rel="stylesheet" href="style1.css">
</head>

<body>
	<!-- Przycisk dla powrtu na stronę -->
	<a class="pow" href="index.php">&#8592;Powrót</a>
	<div>
		<!-- Formularz loginu -->
		<form action="vendor/sclogin.php" method="POST">
			<input name="logi" type="text" placeholder="Login"><br>
			<input name="hasl" type="password" placeholder="Hasło"><br>
			<input type="submit" value="Zaloguj"><br><br>
			<p>Nie masz konta?-<a href="signup.php">załóż konto</a>!</p><br><br>
				
			<?php
				// Problem z loginem
				if (@$_SESSION['wrongloging']) {
					echo "<p>".@$_SESSION['wrongloging']."</p>";
				}
				unset($_SESSION['wrongloging']);
				
				
			?>

		</form>
	</div>
	

</body>
</html>
<?php 

 mysqli_close($conn)

?>