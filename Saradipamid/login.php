<?php 

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
	<title>Zaloguj</title>
	<link rel="stylesheet" href="style1.css">
</head>
<body>
	<div>
		<form action="vendor/sclogin.php" method="POST">
			<input name="logi" type="text" placeholder="Login"><br>
			<input name="hasl" type="password" placeholder="Hasło"><br>
			<input type="submit" value="Zaloguj"><br><br>
			<p>Nie masz konta?-<a href="signup.php">załóż konto</a>!</p>	
		</form>
	</div>
	

</body>
</html>