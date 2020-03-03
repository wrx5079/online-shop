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

	$_SESSION['urlpage'] = "<a href='index.php'> Главная</a> / <a href='tovar.php'> Товары</a>"; 

	include("include/db_connect.php");
	include("include/functions.php");

// Сортировка товаров

$cat = $_GET["cat"];
$type = $_GET["type"];

if (isset($cat))
{
	switch ($cat) {
		case 'all':

		$cat_name = 'Все товары';
		$url = "cat=all&";
		$cat = "";

		break;

		case 'tv':
		
		$cat_name = 'Телевизоры';
		$url = "cat=tv&";
		$cat = "AND type_of_goods='tv'";

		break;

		case 'notebook':
		
		$cat_name = 'Ноутбуки';
		$url = "cat=notebook&";
		$cat = "AND type_of_goods='notebook'";

		break;

		case 'notepad':
		
		$cat_name = 'Планшеты';
		$url = "cat=notepad&";
		$cat = "AND type_of_goods='notepad'";

		break;

		default:

		$cat_name = $cat;

		$cat = "AND type_of_goods='$type' AND brand='$cat'";
	}
}
else
{
	    $cat_name = 'Все товары';
	    $url = "";
	    $cat = "";
}



// Удаление товара
$action = $_GET["action"];
	
	if (isset($action))
	{
		$id = (int)$_GET["id"];
		switch ($action) {
			case 'delete':
				
				$delete = mysqli_query($connection,"DELETE FROM `products` WHERE products_id = '$id'");

			break;
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
		include("include/block-header.php");

		$all_count = mysqli_query($connection,"SELECT * FROM `products`");
		$all_count_result = mysqli_num_rows($all_count);

?>
		<div class="block-content">
			<div class="block-parameters">

				<ul id="options-list">
			<li><span>Товары</span></li>
			<li><a href="#" id="select-links"><?php echo $cat_name; ?></a></li>
			<li><i class="fa fa-arrow-left" aria-hidden="true"></i>
</li>
				</ul>
			<div id="onclick_link" class="list-links">
				<ul>
					<li><a href="index.php?cat=all"><strong>Все товары</strong></a></li>
					<li><a href="index.php?cat=tv"><strong>Телевизоры</strong></a></li>
					<?php 

						$result2 = mysqli_query($connection,"SELECT * FROM `categories` WHERE type='tv' ");
		
						if (mysqli_num_rows($result2) > 0)
						{
							$row2 = mysqli_fetch_assoc($result2);
							
							do 
							{
								echo '<li><a href="index.php?type='.$row2["type"].'&cat='.$row2["brand"].'">'.$row2["brand"].'</a></li>';
							}
							while ($row2 = mysqli_fetch_assoc($result2)) ;
		
						}
					?>
				</ul>

				<ul>
					
					<li><a href="index.php?cat=notebook"><strong>Ноутбуки</strong></a></li>
					<?php 

						$result2 = mysqli_query($connection,"SELECT * FROM `categories` WHERE type='notebook' ");
		
						if (mysqli_num_rows($result2) > 0)
						{
							$row2 = mysqli_fetch_assoc($result2);
							
							do 
							{
								echo '<li><a href="index.php?type='.$row2["type"].'&cat='.$row2["brand"].'">'.$row2["brand"].'</a></li>';
							}
							while ($row2 = mysqli_fetch_assoc($result2)) ;
		
						}
					?>
				</ul>

				<ul>
					
					<li><a href="index.php?cat=notepad"><strong>Планшеты</strong></a></li>
					<?php 

						$result2 = mysqli_query($connection,"SELECT * FROM `categories` WHERE type='notepad' ");
		
						if (mysqli_num_rows($result2) > 0)
						{
							$row2 = mysqli_fetch_assoc($result2);
							
							do 
							{
								echo '<li><a href="index.php?type='.$row2["type"].'&cat='.$row2["brand"].'">'.$row2["brand"].'</a></li>';
							}
							while ($row2 = mysqli_fetch_assoc($result2)) ;
		
						}
					?>
				</ul>
			</div>
		
	</div> 

	<div class="block-info">
		<p class="count-style">Всего товаров - <span><?php echo $all_count_result ?></span></p>

		<p id="add-style"><a href="add_product.php">Добавить товар</a></p>
	</div>
	
	<ul class="block-tovar">
		
	<?php

                            // вывод товара
			$result = mysqli_query($connection,"SELECT * FROM `products`  WHERE visible='1' $cat");
		
		if (mysqli_num_rows($result) > 0)
		{
			$row = mysqli_fetch_assoc($result);
			
			do 
			{
				echo '
				<li>
				<p>'.$row["title"].'</p>
				<img id="img" src="../uploads_images/'.$row["images"].'" alt="">
				<div class="link-action" > 
				<a class="green" href="edit_product.php?id='.$row["products_id"].'">изменить </a>  <a href="index.php?'.$url.'id='.$row["products_id"].'&action=delete" class="delete"> удалить </a>
				</div>
				</li>

				';
			}
				while ($row = mysqli_fetch_assoc($result)) ;
			}
		?>



	</ul>
	

</div>
</div>
	
	<script src="js/script.js"></script>
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