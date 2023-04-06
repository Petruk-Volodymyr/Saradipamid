<?php
	require_once"connect.php";
	if (!$_SESSION['user']) {
		header('location:index.php');
	}
	$prof = @$_SESSION['user']['id'];
	$sql = mysqli_query($conn, "SELECT zamowienia.id_zam, noski.nazwa, zamowienia.gdzie, zamowienia.dataczas FROM `zamowienia`, `users`, `noski` WHERE zamowienia.id_klienta = '$prof' AND zamowienia.id_tow = noski.id GROUP BY id_zam DESC; ");
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
		<br>
		<div class="historia">
			<h1>Historia zamówień:</h1>
			<br>
			<!-- Historia zamówień -->
			<table>
				
				<?php
				// Sprawdzanie ilości towaru
				if (mysqli_num_rows($sql)<1) {
					echo "Nie robiłeś zakup, no morzesz <a href='alltow.php?page=1'>zaciąć</a>!";
				}else {
					echo "
					<tr>
						<th>Nazwa</th>
						<th>Adres</th>
						<th>Data zamówienia</th>
					</tr>
					";
					while ($row = mysqli_fetch_assoc($sql)) {
					echo "
						<tr>
							<td>".$row['nazwa']."</td>
							<td>".$row['gdzie']."</td>
							<td>".$row['dataczas']."</td>
						</tr> 
					";
					}
				}
				

				?>
				

			</table>

		</div>

	</article>
	<br>
	<br>
	<br>
	<!-- stopka -->
	<?php 

	for ($i=1; $i <= 10; $i++) { 
		echo "<br>";
	}

	?>
	<footer id="stop">
		
		<div class="fot1">
			
			<h1>O nas</h1>
			<br>
			<p>Jesteśmy firmą z Karpat. Produkujemy najlepsze skarpetki na całą Urkainę. Nasze skarpetki mogą wytrzymać bombę.</p>
			<br>
			<h2>Kontakt:</h2><a href="#">skarpetkikarpaty@notgmail.com</a>

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
<?php 

 mysqli_close($conn)

?>