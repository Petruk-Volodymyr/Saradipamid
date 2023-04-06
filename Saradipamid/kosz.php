<!-- <?php 

	require_once"connect.php";
		
		print_r($_SESSION['my_array']);
		echo "<br>";
		$ile = count($_SESSION['my_array']);
		echo $ile;



?> -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kosz</title>
	<link rel="stylesheet" href="style_kosz.css">
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
			
			<a href='alltow.php?page=1'>Towary</a>
			<a href="#stop">O nas</a>

		</div>
		<!-- Login -->
		<div class="menu menu3">
			
			<div class="log">
				<?php 

				if (@$_SESSION['user']) {
					echo "
					<a href='profile.php'>Witaj ".@$_SESSION['user']['imie']."</a>

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

	<article>
		
		<div class="konfig-kosz">
		<h1>Masz <?= $ile?> towary w swoim koszyku:</h1>

				<?php 

				for ($i=0; $i < $ile; $i++) { 
					$id = $_SESSION['my_array'][$i];
					$sql = mysqli_query($conn, "SELECT * FROM noski WHERE id = '$id'");
					while ($row = mysqli_fetch_assoc($sql)) {
					echo "
					<div class='towar'>
				
						<img src='".$row['foto']."' alt=''>
						<div class='info'>
							<h1>".$row['nazwa']."</h1>
							<h3>".$row['cena']."$</h3>
						</div>
					</div>";
					}
				}

				?>

			

		</div>
		<div class="konfig-kosz"></div>

	</article>
	<!-- Stopka -->
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
			<h2>Copyright&copy Nosky Karpaty Interprice 2023</h2>

		</div>

	</footer>
</body>
</html>