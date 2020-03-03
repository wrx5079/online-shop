<?php
	$connection = mysqli_connect('localhost', 'root', '', 'shop_db');
	if ($connection == false)
	{
		echo 'Не удалось подключиться к баззе данных! <br>';
		echo mysqli_connect_error();
		exit();
	}
	session_start();
?>