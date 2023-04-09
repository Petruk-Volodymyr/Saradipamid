<?php 
	// połączenie z bazą i początek sesji
	require_once"../connect.php";
	// sprawndzenie czy istnieje koszyk lub czy jest zalogowany użytkownik
	if ((!@$_SESSION['user'])||(!@$_SESSION['my_array'])) {
		// jak nie ma koszyku lub nie jest zalogowany zostaje wysłany na stronę logowania 
		header('location:../login.php');
	}else{
		// jak masywa istnieję będzie policzona ilość elementuw
		$ile = count(@$_SESSION['my_array']);
		// w zależności od ilości elemetów w masywie będzie wypewniona pętla
		for ($i=0; $i < $ile; $i++) { 
			$zmienna = $_SESSION['my_array'][$i];
			// zapytanie do bazy danych żeby odzyskać towary z podobnymi id
			$idtw = mysqli_query($conn, "SELECT id FROM noski WHERE id IN('$zmienna')");
			$wyp = mysqli_fetch_assoc($idtw);
			$tow = $wyp['id'];
			$gdzie = $_POST['adres'];
			$user = @$_SESSION['user']['id'];
			// zapytanie na dodanie do bazy danych tyle razy ile jest elementów w masywie
			$sql = mysqli_query($conn, "INSERT INTO `zamowienia` (`id_zam`, `id_tow`, `id_klienta`, `gdzie`, `dataczas`) VALUES (NULL, '$tow', '$user', '$gdzie', CURRENT_TIMESTAMP)");
		}
		// po wykonaniu pętli masywa koszyka będzie zniszczona
		unset($_SESSION['my_array']);
		// po wykonaniu szkryptu strona wróci do koszyk.php
		header('location:../kosz.php');
	}
	

?>