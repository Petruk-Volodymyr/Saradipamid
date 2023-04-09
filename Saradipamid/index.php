<?php 
	require_once"connect.php";
	$com = "SELECT noski.id, noski.nazwa, noski.cena, noski.foto, typy.typ, typy.opis FROM noski, typy WHERE noski.typ = typy.typ ORDER BY noski.id DESC LIMIT 5; ";
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

					<a href='kosz.php'><svg xmlns='http://www.w3.org/2000/svg' width='36' height='36' viewBox='0 0 24 24' fill='none' stroke='#252525' stroke-width='2' stroke-linecap='round'	stroke-linejoin='round'><circle cx='10' cy='20.5' r='1'/><circle cx='18' cy='20.5' r='1'/><path d='M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1'/></svg></a>
					<a href='profile.php'>Witaj ".@$_SESSION['user']['imie']."</a>

					";
				}else {
					echo "
						<a href='login.php'>
							<svg xmlns='http://www.w3.org/2000/svg' width='36' height='36' viewBox='0 0 24 24' fill='none' stroke='#252525'stroke-width='2' stroke-linecap='round' stroke-linejoin='round'><path d='M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2'></path><circle cx='12' cy='7' r='4'></circle></svg>
						</a> 
				";
				}

				?>
				
			</div>

		</div>

	</header>
	<br>
	<!-- Witryna -->
	<article id="witr">
		
		<section>
			
			<div>
				
				<div>
					
					<h1 style=" color: #433D29;font-size: 30px;">Bardzo dorbe skarpetki.<br>Kupuj teraz i będzie ci dobrze.</h1>
					<br>
					<p style="color: #433D29;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic quae dolorem, commodi. Recusandae iusto, temporibus est quia, labore, enim voluptatem facere nostrum dicta quos laborum laudantium, maiores doloremque natus odit.
					Earum tempore officiis, ratione temporibus omnis accusantium natus, iure assumenda ipsum ducimus iusto perspiciatis id quaerat, esse placeat qui voluptate, sunt ullam. Ullam deleniti, adipisci incidunt odit eaque, repudiandae eligendi!</p>

				</div>

			</div>

		</section>

	</article>
	<br>
	<h1 class="nag"><p>Ostatnie towary</p></h1>
	<br>
	<!-- Ostatnie towary -->
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



	</article>
	<br>
	<!-- Zobaczyć wszystkie towary -->
	<h1 class="nag"><a href="alltow.php?page=1">Więcej</a></h1>
	<br>
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
<?php 

 mysqli_close($conn)

?>