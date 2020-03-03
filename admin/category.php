<?php 
session_start();
if($_SESSION['auth_admin'] == "yes_auth")
{
	define('myeshop', true);

	if(isset($_GET["logout"]))
	{
		unset($_SESSION['auth_admin']);
		header("Location: login.php");
	}

	$_SESSION['urlpage'] = "<a href='index.php'> Главная</a>/<a href='category.php'> Категории</a>"; 

	include("include/db_connect.php");
	include("include/functions.php");

	if ($_POST["submit_cat"])
	{
		$error = array();

		if (!$_POST["cat_type"]) $error[] = "Укажите тип товара!";
		if (!$_POST["cat_brand"]) $error[] = "Укажите название категории!";

		if(count($error))
		{
			$_SESSION['message'] = "<p id='form-error'>".implode('<br/>',$error)."</p>";
		}
		else
		{
			$cat_type = clear_string($_POST["cat_type"]);
			$cat_brand = clear_string($_POST["cat_brand"]);

			mysqli_query($connection,"INSERT INTO `categories`(`id`,`type`,`brand`) VALUES(
						NULL,
						'".$cat_type."',
						'".$cat_brand."'
				)");

			$_SESSION['message'] = "<p id='form-success'>Категория успешно добавлена!</p>";
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
	<div class="container"><?php 
		include("include/block-header.php");?>

		<div class="block-content">
			<div class="block-parameters">
				<p class="title-page">Категории</p>
			</div>
			<?php 
				if(isset($_SESSION['message']))
				{
					echo $_SESSION['message'];
					unset($_SESSION['message']);
				}
			?>
			<form method="post">
				<ul class="cat_product">
					<li>
					<label for="">Категории</label>
					<!-- <div ><a class="delete-cat">Удалить</a></div> -->
					

									<!-- Удаление категорий -->
					<?php 
					if($_POST["delete_cat"]){
						
					$delete = mysqli_query($connection,"DELETE FROM `categories` WHERE id='{$_POST["value_1"]}'");
						
						}
					  ?>
				
					<select name="cat_type" id="cat_type" size="10">
						<?php 
							$result = mysqli_query($connection, "SELECT * FROM `categories` ORDER BY type DESC");
							if(mysqli_num_rows($result) > 0)
							{
								$row = mysqli_fetch_assoc($result);
								do {
									echo '
										<option value="'.$row["id"].'">'.$row["type"].'-'.$row["brand"].'</option>
									 ';
								} while ($row = mysqli_fetch_assoc($result));
							}
						?>

					</select>
					</li>

					<li>
						<label for="">Тип товара</label>
						<input type="text" name="cat_type">
					</li>

					<li>
						<label for="">Бренд</label>
						<input type="text" name="cat_brand">
					</li>
					<li>
					
						<input id="value1" type="hidden" name="value_1">
					</li>
					<input type="submit" name="submit_cat" id="submit_form" 	 value="Добавить">
					<input name="delete_cat" type="submit" value="Удалить" id="delete-cat">
				</ul>
			</form>
		</div>
	</div>
	
	<script src="js/script_delete.js"></script>
	<script src="https://use.fontawesome.com/dc3665f7c6.js"></script>
</body>
</html>
<?php
}
else
{
	header("Location: login.php");
}
?>