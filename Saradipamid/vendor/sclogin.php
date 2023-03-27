<!-- <?php 
	session_start();
	require_once"../connect.php";
	$log = $_POST['logi'];
	$hasl = md5($_POST['hasl']);
	$sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `login`='$log' AND `haslo`='$hasl';");
	$row = mysqli_fetch_assoc($sql);
	if ($sql) {
		// $_SESSION['user'];
		echo $row['imie'];
	}else{
		echo "Nie ma takigo konta";
	}
	
	
	
?> -->