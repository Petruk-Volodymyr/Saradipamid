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
<!-- 	<h1><?= @$_SESSION['user']['imie'] ?></h1>
	<h1><?= @$_SESSION['user']['nazwisko'] ?></h1>
	<h3><?= @$_SESSION['user']['login'] ?></h3>
	<h4><?= @$_SESSION['user']['email'] ?></h4>
	<a href="vendor/logout.php">Wyloguj</a> -->
	<div class="lal">
		<div class="buba">

			<div class="beba">
								
				<h1 style="cursor: pointer;" onclick="of()">&#10006;</h1>

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
	<header>
		
		<div class="menu menu1">
			
			<p><a style="font-size: 30px; text-decoration: none;" href="index.php">Saradipamid</a></p>

		</div>
		<div class="menu menu2">
			
			<a href="#towar">Towary</a>
			<a href="#stop">O nas</a>

		</div>
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
	<article id="witr">
		
		<section>
			
			<div>
				
				<div>
					
					<h1 style=" color: #433D29;font-size: 30px;">Bardzo dorbe skarpetki.<br>Kupuj teraz i będzie ci dobrze.</h1>
					<br>
					<p style="color: #433D29;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic quae dolorem, commodi. Recusandae iusto, temporibus est quia, labore, enim voluptatem facere nostrum dicta quos laborum laudantium, maiores doloremque natus odit.
					Earum tempore officiis, ratione temporibus omnis accusantium natus, iure assumenda ipsum ducimus iusto perspiciatis id quaerat, esse placeat qui voluptate, sunt ullam. Ullam deleniti, adipisci incidunt odit eaque, repudiandae eligendi!</p>
					<br>
					<button class="knopka1">
						► Ogarni filmik
					</button>
					<button class="knopka2">
						Więcej informacji
					</button>

				</div>

			</div>

		</section>

	</article>
	<br>
	<h1 class="nag"><p>Ostatnie towary</p></h1>
	<br>
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
	<h1 class="nag"><a href="">Więcej</a></h1>
	<br>
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