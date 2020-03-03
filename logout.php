<?php 
	require_once 'include/db_connect.php';

	unset($_SESSION['loged_user']);

	header('Location:/');
?>