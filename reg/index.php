<?php 
	  require_once 'include/db_connect.php';
	  include 'functions/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Интернет-Магазин</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="conntainer">
		
		<?php
			include("include/block-header.php");
		?>


	<div id="block-left">
		
		<?php
			include("include/block-category.php");
			include("include/block-parameter.php");
		?>

	</div>

	<div id="block-content">

		<ul id="block-product-grid">
		<?php


                            // вывод товара на страницу
			$result = mysqli_query($connection,"SELECT * FROM `products` WHERE visible='1' ");
		
		if (mysqli_num_rows($result) > 0)
		{
			$row = mysqli_fetch_assoc($result);
			
			do 
			{
				echo '
				<li>
				<div class="block-images-grid">
					<img id="img" src="uploads_images/'.$row["images"].'" />
				</div>
				<p class="style-title-grid"><a href="view_content.php?id='.$row['products_id'].'">'.$row["title"].'</a></p>
				<ul class="reviews-and-counts-grid">
					<li></li>
					<li></li>
				</ul>
				<a class="add-cart-style-grid"></a>
				<p class="style-price-grid"><strong></strong>'.$row["price"].' СОМ.</p>
				<div class="mini-features">'.$row["mini_features"].'</div>
				</li>
				';
			}
				while ($row = mysqli_fetch_assoc($result)) ;
			}
		?>
	</ul>
	</div>

		<?php
			include("include/block-footer.php");
		?>
	

	</div>

	

</body>
</html>