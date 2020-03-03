<?php 
	  require_once 'include/db_connect.php';
	  include 'functions/functions.php';

	  $cat = clear_string($_GET["cat"]);
	  $type = clear_string($_GET["type"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Поиск по апраметрам</title>
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

		if($_GET["brand"]) 
		{
			$checkbrand = implode(',',$_GET["brand"]);
		}

		if(!empty($checkbrand) )
		{
			
				$querybrand = "AND brand_id IN ($checkbrand)";
				
		}

		$result = mysqli_query($connection,"SELECT * FROM `products` WHERE visible='1' $querybrand ");
		
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
				
				<p class="style-price-grid"><strong></strong>'.$row["price"].' СОМ</p>
				<a class="add-cart-style-grid">Купить</a>
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

	
	<script src="https://use.fontawesome.com/dc3665f7c6.js"></script>
</body>
</html>










