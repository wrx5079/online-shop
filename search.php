<?php 
	  require_once 'include/db_connect.php';
	  include 'functions/functions.php';

	  $search = clear_string($_GET["q"]);

	  $count = mysqli_query($connection,"SELECT COUNT(*) FROM `products` WHERE `title` LIKE '%$search%' AND visible='1'");
	  $temp = mysqli_fetch_assoc($count);

	 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Поиск - <?php echo $search;?></title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
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

		<ul >
		<?php
			// if ($temp[0] > 0){
		              //постраничная навигация товаров
			

                            // вывод товара
			$result = mysqli_query($connection,"SELECT * FROM `products` WHERE `title` LIKE '%$search%' AND visible='1' ");
			
			while (($row = mysqli_fetch_assoc($result)))
			{
				echo '
				<li>
				<div class="block-images-grid">
					<img src="uploads_images/'.$row["images"].'" />
				</div>
				<p class="style-title-grid"><a href="view_content.php?id='.$row['products_id'].'">'.$row["title"].'</a></p>
				<p class="style-price-grid"><strong></strong>'.$row["price"].' СОМ.</p>
				<a class="add-cart-style-grid">Купить</a>
				</li>
				';
			}
		// }
		// else
		// {
		// 	echo "товары не найдены";
		// }
		?>
	
	

	</ul>
	</div>

		<?php
			include("include/block-footer.php");
		?>
	

	</div>

	
<script src="https://use.fontawesome.com/dc3665f7c6.js"></script>
</body>
</html>