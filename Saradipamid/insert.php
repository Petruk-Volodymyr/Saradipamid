<?php 

		$conn = mysqli_connect('localhost', 'root', '', 'saradipamid');
		$ide = $_GET['id'];
		$poc = "SELECT * FROM noski, typy WHERE noski.id=$ide and noski.typ = typy.typ;";
		$opo = mysqli_query($conn, $poc);
		$row = mysqli_fetch_assoc($opo);


?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="styl_inse.css">
</head>
<body>
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
	<?php
	echo "		 <article>
	 	
	 	<div class='type1'>
	 		
	 		<img src='".$row['foto']."' alt=''>

	 	</div>
	 	<div class='type2'>
	 		<div class='oczko'>
	 		<h1 style='text-align: center;'>".$row['nazwa']."</h1><br>
		 		<div class='typ'>Typ:".$row['typ']."</div>
		 		<div class='cena'>Cena:".$row['cena']."$</div>
		 		<div class='opis'>
		 			
		 			<p>
		 				
		 				".$row['opis']."

		 			</p>

		 		</div>
		 		<br>
		 		<br>
		 		<br>
		 		<br>
		 		<p><input type='submit' value='Zamów' style='cursor: pointer;'></p>
			</div>

	 	</div>

	 </article>	";

	 ?>


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
<?php 

 mysqli_close($conn)

 ?>