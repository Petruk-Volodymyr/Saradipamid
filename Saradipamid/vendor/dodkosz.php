<?php 
	// połączenie z bazą i początek sesji
	require_once"../connect.php";

	if (!@$_SESSION['user']) {
		header('location:../login.php');
	}else{
		// Sprawdzamy czy istnieje masywa, jak nie to tworzymy ją
		if (!$_SESSION['my_array']) {
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
		// po wykonaniu skryptu wracamy do strony z towarem jaki dodaliśmy do kuszu
		header('location:../insert.php?id='.$number.'');
	}

?>