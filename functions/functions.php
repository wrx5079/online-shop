<?php
	
	function clear_string($cl_str)
	{
		$cl_str = strip_tags($cl_str); // удаление всех html тегов и PHP
	  	//$cl_str = mysqli_real_escape_string($connection, $cl_str); // очистка спец символов
	  	$cl_str = trim($cl_str); // удаление пробелов

	  	return $cl_str;
	}
?>