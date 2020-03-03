<?php 

	  include("../include/db_connect.php");
	  
	  $data = $_POST;

	  if( isset($data['do_login']) )
	  {
	  	$errors = array();

	  	$login = filter_var(trim($_POST['auth_login']),FILTER_SANITIZE_STRING);
	  	$pass = filter_var(trim($_POST['auth_pass']),FILTER_SANITIZE_STRING);
	  	$pass = md5($pass);


	  	$result = mysqli_query($connection,"SELECT * FROM `reg_users` WHERE `login` = '$login' AND `password` = '$pass' ");
			
	  	$user = mysqli_fetch_assoc($result);

	  	if(count($user) == 0)
	  	{
	  		echo  'Такой пользователь не найден';
	  		// header('../login.php');
	  		exit();
	  	}

	  }
	 
	 
	  $_SESSION['loged_user'] = $user;
	  header('Location:/');
	  echo 'Вы успешно авторизованы перейти на <a href="/">главную страницу</>';
	  

?>


