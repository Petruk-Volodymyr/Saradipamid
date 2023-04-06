<?php 

	require_once"../connect.php";
	// if (@$_SESSION['user']) {
	// 	header('location:index.php');
	// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
		<?php 

		// Sprawdzamy czy istnieje masywa, jak nie to tworzymy ją
		if (!isset($_POST['send'])) {
		    $_SESSION['my_array'] = array();
		}

		if (isset($_POST['towar'])) {
		    $number = $_POST['towar'];
		    // Sprawdzamy czy istnije element w masywie
		    if (!in_array($number, $_SESSION['my_array'])) {
		        // Jak elementu jeszcze nie ma to dodajemy go
		        $_SESSION['my_array'][] = $number;
		    }
		}

		header('location:../kosz.php');

	?>
</body>
</html>