<?php 
	session_start();
	define('myeshop', true);
	include("include/db_connect.php");
	include("include/functions.php");


	if ($_POST["submit_enter"])
	{
		$login = clear_string($_POST["input_login"]);
		$pass = clear_string($_POST["input_pass"]);


		
		if($login && $pass)
		{
			//$pass = md5($pass);
             
            $result = mysqli_query($connection,"SELECT * FROM `admin` WHERE login = '$login' AND password = '$pass'");
            if(mysqli_num_rows($result) > 0)
            {
            	$row = mysqli_fetch_assoc($result);

            	$_SESSION['auth_admin'] = 'yes_auth';

            	header("Location: index.php");
            }
            else
            {
            	$errors = "Неверный Логин или Пароль.";
            }

		}
		else
		{
			$errors = "Заполните все поля!";
		}
	}

            
            

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<title>Панель управления</title>
</head>
<body>
	<div class="form-container">

		<?php 
		if($errors)
		{
			echo '<p id="errors">'.$errors.'</p>';
		}
	?> 
		<div class="form ">
			<div class="label-cont ">
			<label class="tab-1 active" title="Вкладка 1">Авторизация</label>
			<!-- <label class="tab-1" title="Вкладка 2">Регистрация</label> -->
			</div>

			 <div class="form-cont"> 
			<form class="form_reg form1 active-2" method="post" >
					<p></p>
					<input placeholder="Логин" class="input" type="text" id="input_login" name="input_login">
					<input placeholder="Пароль" class="input" type="password" id="input_pass" name="input_pass">
					<input type="submit" name="submit_enter" id="submit_enter" value="войти">
			</form>
			
			
			<!-- <form class="form_reg form2" action="reg/handler_reg.php" method="post">
					<input placeholder="Логин" class="input" type="text" name="reg_login" id="reg_login">
					<input placeholder="Пароль" class="input" type="text" name="reg_pass" id="reg_pass">
					<input placeholder="Введите пароль еще раз" class="input" type="text" name="reg_pass2" id="reg_pass2">
				    <button name="do_signup">регистрация</button>
			
			</form> -->
			</div>
		</div>
	</div>



</body>
</html>