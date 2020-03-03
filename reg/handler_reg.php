<?php
	include("../include/db_connect.php");
	include("../functions/functions.php");

session_start();

	$data = $_POST;
	if(isset($data['do_signup']))
	{
		$errors = array();
		if(trim($data['reg_login']) == '')
		{
			$errors[] = 'Введите логин!';
		}

		if($data['reg_pass'] == '')
		{
			$errors[] = 'Введите пароль!';
		}

		if($data['reg_pass2'] != $data['reg_pass'])
		{
			$errors[] = 'Пароли не совпадают!';
		}

		



		if (empty($errors))
		{
			//если массив не пустой можно регистрировать
	$login = strtolower(clear_string($_POST['reg_login']));
	$pass = strtolower(clear_string($_POST['reg_pass']));
	$pass2 = strtolower(clear_string($_POST['reg_pass2']));
	$name = strtolower(clear_string($_POST['reg_name']));
	$email = strtolower(clear_string($_POST['reg_email']));
	$phone = strtolower(clear_string($_POST['reg_phone']));

	$pass = md5($pass);
	$pass2 = md5($pass2);
	
	$ip = $_SERVER['REMOTE_ADDR'];




	mysqli_query ($connection,"INSERT INTO `reg_users` (`id`, `login`, `password`, `password2`, `name`, `email`, `phone`, `datetime`, `ip`) 
		VALUES (
		NULL, 
		'".$login."', 
		'".$pass."', 
		'".$pass2."', 
		'".$name."', 
		'".$email."', 
		'".$phone."', 
		NOW(), 
		'".$ip."')");
        echo "Вы успешно зарегистрированы";
       	
      

		}


		else
		{
			echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
		}
	}

?>


