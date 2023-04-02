<?php 
	require_once"connect.php";
	$com = "SELECT noski.id, noski.nazwa, noski.cena, noski.foto, typy.typ, typy.opis FROM noski, typy WHERE noski.typ = typy.typ ORDER BY noski.id DESC LIMIT 5; ";
	$casd = mysqli_query($conn, $com);
	$ile = mysqli_query($conn, "SELECT id FROM noski;");

?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="UTF-8">
	<title>Saradipamid</title>
	<link rel="stylesheet" href="style.css">
	
</head>
<body>
	<!-- Nagłówek -->
	<header>
		<!-- Logo firmy -->
		<div class="menu menu1">
			
			<p><a style="font-size: 30px; text-decoration: none;" href="index.php">Saradipamid</a></p>

		</div>
		<!-- Wspomagające przeciski -->
		<div class="menu menu2">
			
			<a href="#towar">Towary</a>
			<a href="#stop">O nas</a>

		</div>
		<!-- Login -->
		<div class="menu menu3">
			
			<div class="log">
				<?php 

				if (@$_SESSION['user']) {
					echo "

					<a href='profile.php' style='text-decoration: none;'>Witaj ".@$_SESSION['user']['imie']."</a>

					";
				}else {
					echo "
						<a href='login.php'>
							<img src='img/BBD/profile.png' alt=''>
						</a> 
				";
				}

				?>
				
			</div>

		</div>

	</header>
	<br>
	<!-- Wszystkie towary -->
	<article id="towar">


		
		<?php 

		while ($row = mysqli_fetch_assoc($casd)) {

			echo 
			"
			<a class='to' href='insert.php?id=".$row['id']."'>
				<div class='tow'>
					
					<img src='".$row['foto']."'>
					<div>
						<h1 style='font-size: 30px;'>".$row['nazwa']."</h1>
						<p>Typ:".$row['typ']."</p>
						<p>Cena:".$row['cena']."$</p>
						
					</div>
				</div>
			</a>
			"
			;
		}

		?>

		<?php 

		for ($i=1; $i <= ceil(mysqli_num_rows($ile)/5); $i++) { 
			echo $i." ";
		}

		?>

	</article>
	<br>
	<!-- Stopka -->
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
			<h2>Copyright&copy Nosky Karpaty Interprice 2023</h2>

		</div>

	</footer>

</body>
</html>
<?php 

 mysqli_close($conn)

?>