<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="UTF-8">
	<title>Saradipamid</title>
	<link rel="stylesheet" href="style.css">
	
</head>
<body>
	<div class="lal">
		<div class="buba" onclick="of()">

			<div class="beba">
				
				<iframe src="https://www.youtube.com/embed/88cvrY82yVU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>


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
			
			<a href="#otz">Komentarze</a>
			<a href="#towar">Towary</a>
			<a href="#stop">O nas</a>

		</div>
		<div class="menu menu3"></div>

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
					<button class="knopka1" onclick="on()">
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
	<article id="otz">
		
		<div class="koment koment1">
			<h1>
				WorekSpermy
			</h1>
			<br>
			<p>
				hack because lose, unskilled without
			</p>
			<img src="" alt="">
		</div>
		<div class="koment koment2">
			<h1>
				Sensey
			</h1>
			<br>
			<p>
				Cholera, Atak Tytanów to arcydzieło
			</p>
			<img src="" alt="">
		</div>
		<div class="koment koment3">
			<h1>
				Natural
			</h1>
			<br>
			<p>
				Za komunizm i dwor. Ale ja amerykańczyk
			</p>
			<img src="" alt="">
		</div>
		<div class="koment koment4">
			<h1>
				Blanche
			</h1>
			<br>
			<p>
				Ja pidaras
			</p>
			<img src="" alt="">
		</div>
		<div class="koment koment5">
			<h1 style="color: #EFF5F9;">
				Żenia
			</h1>
			<br>
			<p style="color: #EFF5F9;">
				Ja brudny pizdabol
			</p>
			<img src="" alt="">
		</div>

	</article>
	<br>
	<article id="towar">
		
		<?php 

		$conn = mysqli_connect('localhost', 'root', '', 'saradipamid');
		$com = "SELECT noski.id, noski.nazwa, noski.cena, noski.foto, typy.typ, typy.opis FROM noski, typy WHERE noski.typ = typy.typ; ";
		$casd = mysqli_query($conn, $com);
		
		while ($row = mysqli_fetch_assoc($casd)) {

			echo 
			"
				<div class='tow'>
					
					<img src='".$row['foto']."'>
					<div>
						<h1 style='font-size: 30px;'>".$row['nazwa']."</h1>
						<p>Typ:".$row['typ']."</p>
						<p>Cena:".$row['cena']."$</p>
						<a href='insert.php?id=".$row['id']."'><input type='submit' value='Zamów'></a>
					</div>
				</div>
			"
			;
		}

		?>



	</article>
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
				<p>Jak masz jakiś problem to możesz napisać do naszego specjalisty Wiktora, który ci pomoże, ale jak powiesz coś złego. To ciebie wyżucimy do kanały.</p>
				<br>
				<h2>Cpyright&copy Nosky Karpaty Interprice 2023</h2>

			</div>

	</footer>

</body>
</html>