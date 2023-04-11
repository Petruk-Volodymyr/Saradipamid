<?php
	require_once"connect.php";
	if (!$_SESSION['user']) {
		header('location:index.php');
	}
	$prof = @$_SESSION['user']['id'];
	$sql = mysqli_query($conn, "SELECT noski.id, noski.foto, noski.nazwa, zamowienia.gdzie, DATE(zamowienia.dataczas) FROM `zamowienia`, `users`, `noski` WHERE zamowienia.id_klienta = '$prof' AND zamowienia.id_tow = noski.id GROUP BY id_zam DESC;");
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
			
			<a href='alltow.php?page=1'>Towary</a>
			<a href="#stop">O nas</a>

		</div>
		<div class="menu menu3"></div>

	</header>
	<hr>
	<article>
		
		<div class="profil">
			
			<div>
				<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
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
			<h1 style="float: left;">Historia zamówień:</h1>
			<a style="float: right;" href='kosz.php'><svg xmlns='http://www.w3.org/2000/svg' width='36' height='36' viewBox='0 0 24 24' fill='none' stroke='#252525' stroke-width='2' stroke-linecap='round'	stroke-linejoin='round'><circle cx='10' cy='20.5' r='1'/><circle cx='18' cy='20.5' r='1'/><path d='M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1'/></svg></a>
			<br>
			<!-- Historia zamówień -->
			<div class="bloki">	
				<?php
				// Sprawdzanie ilości towaru
				if (mysqli_num_rows($sql)<1) {
					echo "Nie robiłeś zakup, no morzesz <a href='alltow.php?page=1'>zaciąć</a>!";
				}else {
					while ($row = mysqli_fetch_assoc($sql)) {

					echo "
						<a href='insert.php?id=".$row['id']."' class='zamow'>
							<img src='".$row['foto']."' alt=''>
							<div class='inf'>
								<h4>".$row['DATE(zamowienia.dataczas)']."</h4>
								<h1>Nazwa:".$row['nazwa']."</h1>
								<p>Adres:".$row['gdzie']."</p>
							</div>
						</a>

					";
					}
				}
				

				?>
				
					

				</div>


		</div>

	</article>
	<br>
	<br>
	<br>
	<!-- Stopka -->
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

		</div>
		<div class="fot2">
			
			<h1>Wsparcie</h1>
			<br>
			<p>Jak masz jakiś problem to możesz napisać do naszego specjalisty Wiktora.</p>
			<br>
			<h2>Kontakt:</h2><a href="#">skarpetkikarpaty@gmail.com</a>
			<br><br>
			<h2>Copyright&copy Nosky Karpaty Interprice 2023</h2>

		</div>

	</footer>

</body>
</html>
<?php 

 mysqli_close($conn)

?>