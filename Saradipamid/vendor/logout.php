<?php 
	// Wylogój
	require_once"../connect/connect.php";
	// unset($_SESSION['user']);
	header('Location:../main/index.php');
	session_unset();
?>