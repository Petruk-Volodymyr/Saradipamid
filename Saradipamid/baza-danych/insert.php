<?php 

		require_once"../connect/connect.php";
		$ide = $_GET['id'];
		$poc = "SELECT * FROM noski, typy WHERE noski.id=$ide and noski.typ = typy.typ;";
		$opo = mysqli_query($conn, $poc);
		$row = mysqli_fetch_assoc($opo);


?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="UTF-8">
	<title>Towar: <?= $row['nazwa']?></title>
	<link rel="stylesheet" href="styl_inse.css">
</head>
<body>
	<!-- Formularz zamówienia -->
	<div class="lal">
		<div class="buba">

			<div class="beba">
								
				<h1 style="cursor: pointer;" onclick="of()">&#10006;</h1>
				<br><br>
				<?php 

				if (!@$_SESSION['user']) {
					echo "<a href='login.php'>Zaloguj</a>";
				}else{
					echo "
				<h1>Ty ".@$_SESSION['user']['nazwisko']." ".@$_SESSION['user']['imie']."</h1>
				<br>
				<h2>Chcesz zamówić ".$row['nazwa'].", za ".$row['cena']."$</h2>
				<br>
				<br>
				<br>
				
				<form action='../vendor/dod.php?tow=$ide' method='POST'>
					<input name='adres' type='text' placeholder='Wpisz adres' required>
					<input type='submit' value='Zamów'>

				</form>
				 ";
				}

				 ?>
				

			</div>
		</div>
	</div>
	<script>
		function on() {
			document.querySelector('.lal').style.display = 'block';
		}
		function of() {
			document.querySelector('.lal').style.display = 'none';
		}

	</script>
	<!-- Nagłówek -->
	<header>
		<!-- Logo firmy -->
		<div class="menu menu1">
			
			<p><a style="font-size: 30px; text-decoration: none;" href="index.php">Saradipamid</a></p>

		</div>
		<!-- Wspomagające przeciski -->
		<div class="menu menu2">

			<a href='../main/alltow.php?page=1'>Towary</a>
			<a href="#stop">O nas</a>

		</div>
		<!-- Login -->
		<div class="menu menu3">
			
			<div class="log">
				<?php 

				if (@$_SESSION['user']) {
					echo "

					<a href='../profile/kosz.php'><svg xmlns='http://www.w3.org/2000/svg' width='36' height='36' viewBox='0 0 24 24' fill='none' stroke='#252525' stroke-width='2' stroke-linecap='round'	stroke-linejoin='round'><circle cx='10' cy='20.5' r='1'/><circle cx='18' cy='20.5' r='1'/><path d='M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1'/></svg></a>
					<a href='profile.php'>Witaj ".@$_SESSION['user']['imie']."</a>

					";
				}else {
					echo "
						<a href='../baza-danych/login.php'>
							<svg xmlns='http://www.w3.org/2000/svg' width='36' height='36' viewBox='0 0 24 24' fill='none' stroke='#252525'stroke-width='2' stroke-linecap='round' stroke-linejoin='round'><path d='M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2'></path><circle cx='12' cy='7' r='4'></circle></svg>
						</a> 
				";
				}

				?>
				
			</div>

		</div>

	</header>
	<!-- Towar -->
	<hr>
	<?php
	echo "		
	<article>
	 	
	 	<div class='type1'>
	 		
	 		<img src='".$row['foto']."' alt=''>

	 	</div>
	 	<div class='type2'>
	 		<div class='wsp'>
	 		<h1 style='text-align: center;'>".$row['nazwa']."</h1><br>
		 		<div class='typ'>".$row['typ']."</div>
		 		<div class='cena'>".$row['cena']."$</div>
		 		<div class='opis'>
		 			
		 			<p>
		 				
		 				".$row['opis']."

		 			</p>

		 		</div>
		 		<br>
		 		<br>
		 		<br>
		 		<br>
		 		<p><input onclick='on()' type='submit' value='Zamów'></p>
		 		<form method='POST' action='../vendor/dodkosz.php'>
			 		<input type='hidden' name='towar' value='".$ide."'>";
			 		if (!@$_SESSION['my_array']) {
			 			$czekkosz = null;
			 		}else{
			 			$czekkosz = in_array($ide, @$_SESSION['my_array']);
			 		}
					 if ($czekkosz) {	 	
					 	echo "<p>Towar już jest w twoim 
					 	<a href='../profile/kosz.php'>koszyku</a>.</p>";
					 }else {
					 	echo "<input type='submit' value='Dodaj do koszyka' name='send'>";
					 }
				echo "			
		 		</form>
		 		
			</div>

	 	</div>

	 </article>	";
	 

	 ?>


	<br>
	<!-- Stopka -->
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