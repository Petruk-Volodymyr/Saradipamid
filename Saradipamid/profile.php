<?php 
	session_start();
	if (!$_SESSION['user']) {
		header('location:index.php');
	}
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="UTF-8">
	<title>Profile:<?= @$_SESSION['user']['imie'] ?></title>
	<link rel="stylesheet" href="styleprof.css">
</head>
<body>
	<!-- nagłówek -->
	<header>
		
		<div class="menu menu1">
			
			<p><a style="font-size: 30px; text-decoration: none;" href="index.php">Saradipamid</a></p>

		</div>
		<div class="menu menu2">
			
			<a href="#stop">O nas</a>

		</div>
		<div class="menu menu3"></div>

	</header>
	<hr>
<!-- 		<h1><?= @$_SESSION['user']['imie'] ?></h1>
	<h1><?= @$_SESSION['user']['nazwisko'] ?></h1>
	<h3><?= @$_SESSION['user']['login'] ?></h3>
	<h4><?= @$_SESSION['user']['email'] ?></h4>
	<a href="vendor/logout.php">Wyloguj</a> -->
	<article>
		
		<div class="profil">
			
			<div>
				<img src="img/BBD/profile.png" alt="">
				<h3><?= @$_SESSION['user']['login'] ?></h3>
			</div>
			<div>
				
				<h1><?= @$_SESSION['user']['imie'] ?> <?= @$_SESSION['user']['nazwisko'] ?></h1>
				<p><?= @$_SESSION['user']['email'] ?></p>

				<a href="vendor/logout.php">Wyloguj</a>

			</div>

		</div>

	</article>
	<!-- stoka -->
	<footer id="stop">
		
		<div class="fot1">
			
			<h1>O nas</h1>
			<br>
			<p>Jesteśmy firmą z Karpat. Produkujemy najlepsze skarpetki na całą Urkainę. Nasze skarpetki mogą wytrzymać bombę.</p>
			<br>
			<h2>Kontakt:</h2><a href="#">skarpetkikarpaty@gmail.com</a>

		</div>
		<div class="fot2">
			
			<h1>Wsparcie</h1>
			<br>
			<p>Jak masz jakiś problem to możesz napisać do naszego specjalisty Wiktora.</p>
			<br>
			<h2>Cpyright&copy Nosky Karpaty Interprice 2023</h2>

		</div>

	</footer>

</body>
</html>