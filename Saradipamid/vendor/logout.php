<?php 

	require_once"../connect.php";
	unset($_SESSION['user']);
	header('Location:../index.php');

?>