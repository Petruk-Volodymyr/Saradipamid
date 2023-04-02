<?php 
	require_once"../connect.php";
	// Funkcja loginu
	if (@$_SESSION['user']) {
		header('location:index.php');
	}
	$log = $_POST['logi'];
	$hasl = md5($_POST['hasl']);
	$sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `login`='$log' AND `haslo`='$hasl';");
	if (mysqli_num_rows($sql)>0) {
		$row = mysqli_fetch_assoc($sql);
		$_SESSION['user'] = [

			"id" => $row['id'],
			"imie" => $row['imie'],
			"nazwisko" => $row['nazwisko'],
			"login" => $row['login'],
			"email" => $row['email']

		];
		header('Location: ../profile.php');
	}else{
		$_SESSION['wrongloging'] = 'Login lub hasło wpisano nie poprawnie';
		header('Location:../login.php');
	}
	
	
	
?>