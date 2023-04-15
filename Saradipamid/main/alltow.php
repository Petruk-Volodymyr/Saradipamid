<?php 
	require_once"../connect/connect.php";
	$ile = mysqli_query($conn, "SELECT id FROM noski;");
	$page = $_GET['page'];
	$offset = ($page - 1) * 10;
	if ($page < 1) {
		header('location:alltow.php?page=1');
	}
	$com = "SELECT noski.id, noski.nazwa, noski.cena, noski.foto, typy.typ, typy.opis FROM noski, typy WHERE noski.typ = typy.typ ORDER BY noski.id DESC LIMIT 10 OFFSET $offset; ";
	$casd = mysqli_query($conn, $com);

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
			
			<a href="index.php">Saradipamid</a>

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

					<a href='../profile/kosz.php'><svg xmlns='http://www.w3.org/2000/svg' width='36' height='36' viewBox='0 0 24 24' fill='none' stroke='#252525' stroke-width='2' stroke-linecap='round'	stroke-linejoin='round'><circle cx='10' cy='20.5' r='1'/><circle cx='18' cy='20.5' r='1'/><path d='M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1'/></svg></a>
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
	<br>
	<hr>
	<br>
	<!-- Wszystkie towary -->
	<article id="towar">
		
		<?php 

		while ($row = mysqli_fetch_assoc($casd)) {

			echo 
			"
			<a class='to' href='../baza-danych/insert.php?id=".$row['id']."'>
				<div class='tow'>
					<!-- Obraz z bazy danych -->
					<img src='".$row['foto']."'> 
					<div>
					<!-- Nazwa z bazy danych -->
						<h1 style='font-size: 30px;'>".$row['nazwa']."</h1>
					<!-- Typ towaru z bazy danych -->
						<p>Typ:".$row['typ']."</p>
					<!-- Cena towaru z bazy danych -->
						<p>Cena:".$row['cena']."$</p> 
						
					</div>
				</div>
			</a>
			"
			;
		}

		?>
		


	</article>
	<!-- Strona z towarem -->
	<div id="form-str">
		<?php 
		$pre = $page - 1;
		$nxt = $page + 1;
		$max = ceil(mysqli_num_rows($ile)/10);
		if ($page<2) {
			$pre = $page;
		}
		if ($page > $max) {
			header('location:alltow.php?page='.$max.'');
		}
		
		echo "<a href='alltow.php?page=$pre'>&#8249;</a>";
		

		 ?>
		<select onchange="window.location.href=this.options[this.selectedIndex].value" name="" id="strona">
			<option value=""><?php echo $page;?></option>
			<?php 
			
			for ($i=1; $i <= $max; $i++) { 
				echo "<option value='alltow.php?page=$i'>$i</option>";
			}

		?>

		</select>
		<?php echo "<a href='alltow.php?page=$nxt'>&#8250;</a>"; ?>
	</div>
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