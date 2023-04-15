<?php 

	require_once"../connect/connect.php";
	if (!@$_SESSION['user']) {
		header('location:../main/login.php');
	}
		if (!@$_SESSION['my_array']) {
			$ile = 0;
		}else{
			$ile = count(@$_SESSION['my_array']);
		}
		
		echo "<br>";


?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="UTF-8">
	<title>Kosz</title>
	<link rel="stylesheet" href="style_kosz.css">
</head>
<body>
		<!-- Nagłówek -->
	<header>
		<!-- Logo firmy -->
		<div class="menu menu1">
			
			<p><a style="font-size: 30px; text-decoration: none;" href="../main/index.php">Saradipamid</a></p>

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
					
					<a href='../profile/profile.php'>Witaj ".@$_SESSION['user']['imie']."</a>

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

	<article>
		
		<div class="konfig-kosz">
		 
		<?php 
			
			if ($ile > 1 && $ile < 5) {
				echo "

					<h1>Masz ".$ile." towary w swoim koszyku:</h1>

				";
			}elseif ($ile == 1 || $ile % 20 == 1) {
				echo "

					<h1>Masz ".$ile." towar w swoim koszyku:</h1>

				";
			}else{
				echo "

					<h1>Masz ".$ile." towarów w swoim koszyku:</h1>

				";
			}
			if (@$_SESSION['my_array']) {
				echo "<form action='' method='POST'><input type='submit' name='czmp' value='Usuń wszystko z kosza'></form>";
			}

		?> 

				<?php 

				for ($i=0; $i < $ile; $i++) { 
					$id = $_SESSION['my_array'][$i];
					$sql = mysqli_query($conn, "SELECT * FROM noski WHERE id = '$id'");
					while ($row = mysqli_fetch_assoc($sql)) {
					echo "
					<div class='towar'>
				
						<img src='".$row['foto']."' alt=''>
						<div class='info'>
							<form action='' method='POST'>
								<input type='hidden' name='ustow' value='$id'>
								<button name='czmo'><svg xmlns='http://www.w3.org/2000/svg' width='36' height='36' viewBox='0 0 24 24' fill='none' stroke='#252525'stroke-width='2' stroke-linecap='round' stroke-linejoin='round'><polyline points='3 6 5 6 21 6'></polyline><path d='M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2'></path><line x1='10' y1='11' x2='10' y2='17'></line><line x1='14' y1='11' x2='14' y2='17'></line></svg></button>
							</form>
							<h1>".$row['nazwa']."</h1>
							<h3>".$row['cena']."$</h3>
						</div>
					</div>";
					}
				}
				$ust = @$_POST['ustow'];
				if (isset($_POST['czmo'])) {
					$licz = array_search($ust, @$_SESSION['my_array']);
					
					unset($_SESSION['my_array'][$licz]);
					@$_SESSION['my_array'] = array_values(@$_SESSION['my_array']);
					
					header('location:../profile/kosz.php');
				}
				if (isset($_POST['czmp'])) {
					unset($_SESSION['my_array']);
					header('location:../profile/kosz.php');
				}
				if (empty(@$_SESSION['my_array'])) {
					unset($_SESSION['my_array']);
				}
				?>


		</div>
		<div class="konfig-kosz">

			<?php 

				if (@$_SESSION['my_array']) {
					echo "
					<div>
					<h1>Zamów</h1>
						<form action='../vendor/zamkosz.php' method='POST'>
							<h4>Wpisz adres zamieszkania:</h4>
							<input type='text' name='adres' required>
							<input type='submit' value='Zamów' name='zamow'>

						</form>
					</div>
					";
				}

			?>
			

		</div>
	</article>
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
<?php 
	mysqli_close($conn);
?>
</html>