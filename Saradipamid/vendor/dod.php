<!-- <?php 

	require_once"../connect.php";
	if (!$_SESSION['user']) {
		header('location:../index.php');
	}
	$tow = $_GET['tow'];
	$gdzie = $_POST['adres'];
	$user = @$_SESSION['user']['id'];
	// Dodanie do bazy danych
	mysqli_query($conn, "INSERT INTO `zamowienia` (`id_zam`, `id_tow`, `id_klienta`, `gdzie`, `dataczas`) VALUES (NULL, '$tow', '$user', '$gdzie', CURRENT_TIMESTAMP) ");
	header("location:../alltow.php?page=1")

?> -->