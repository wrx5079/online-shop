<?php 
	  require_once 'include/db_connect.php';
	  

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<div class="form-container">
		<div class="form ">
			<div class="label-cont ">
			<label class="tab-1 active" title="Вкладка 1">Авторизация</label>
			<label class="tab-1" title="Вкладка 2">Регистрация</label>
			</div>

			 <div class="form-cont"> 
			<form class="form_reg form1 active-2" method="post" action="reg/auth.php">
					<p></p>
					<input placeholder="Логин" class="input" type="text" id="auth_login" name="auth_login">
					<input placeholder="Пароль" class="input" type="password" id="auth_pass" name="auth_pass">
					<button name="do_login">вход</button>
			</form>
			
			
			<form class="form_reg form2" action="reg/handler_reg.php" method="post">
					<input placeholder="Логин" class="input" type="text" name="reg_login" id="reg_login">
					<input placeholder="Пароль" class="input" type="text" name="reg_pass" id="reg_pass">
					<input placeholder="Введите пароль еще раз" class="input" type="text" name="reg_pass2" id="reg_pass2">
				    <button name="do_signup">регистрация</button>
			
			</form>
			</div>
		</div>
	</div>


	<div class="conntainer">
		
		<?php
			include("include/block-header.php");
		?>

	<div class="block-left">
		
		<?php
			include("include/block-category.php");
			include("include/block-parameter.php");
		?>

	</div> 

	<div class="block-content">

	
	</div>

		<?php
			include("include/block-footer.php");
		?>
	

	</div>

	
	<script src="js/tabs.js"></script>
</body>
</html>