<?php 
	  require_once 'include/db_connect.php';
	  include 'functions/functions.php';

	  $id = clear_string($_GET["id"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Интернет-Магазин</title>
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

		
		<?php


                            // вывод товара на страницу
			$result2 = mysqli_query($connection,"SELECT * FROM `products` WHERE products_id='$id' AND visible='1' ");
		
		if (mysqli_num_rows($result2) > 0)
		{
			$row2 = mysqli_fetch_assoc($result2);
			
			do 
			{
				
            echo '
            <div class="block-product_view">
				<div class="product_category_brand"><p id="nav-brand"><a href="view_cat.php?type='.$row2["type_of_goods"].'">Телевизоры</a><strong>|</strong> <span>'.$row2["brand"].'</span> </p></div>

				<div ><p class="content-title">'.$row2["title"].'</p></div>

			<div class="block-content-info">
				<div class="block-img"><img src="uploads_images/'.$row2["images"].'" /></div>
				<div class="block-all">
					<div class="block-1"></div>
					<div class="block-2"></div>
				</div>

				<div class="mini-description">
				<p class="style-price">'.$row2["price"].' СОМ</p>
				<p class="add-cart-product">купить</p>
				<p class="opisanie">Описание</p>
				<p class="content-text">'.$row2["mini_description"].'</p>
				</div>
			</div>
			</div>
				';
			}
				while ($row2 = mysqli_fetch_assoc($result)) ;

			$result = mysqli_query($connection,"SELECT * FROM `products` WHERE products_id='$id' AND visible='1' ");
			$row = mysqli_fetch_assoc($result);

			echo '<div class="block-descrip">
					<div class="block-descrip-tabs">

						<div class="label-tabs ">
							<label class="label-tab-1 active1" title="Вкладка 1">Описание</label>
							<label class="label-tab-1" title="Вкладка 2">Характеристика</label>
						</div>
							
					

						<div class="tabs_content active-2 tabs-content-1">
							<div >'.$row['description'].'</div>
						</div>
						<div class="tabs_content tabs-content-2">
							<div >'.$row['features'].'</div>
						</div>
					</div>
				</div>
			 ';
			}
		?>
	
	</div>

		<?php
			include("include/block-footer.php");
		?>
	

	</div>

	
<script src="js/tabs-2.js"></script>
<script src="https://use.fontawesome.com/dc3665f7c6.js"></script>
</body>
</html>











<!-- 
	echo '
			<div class="tabs">
			<div class="tabs_nav tabs-nav">
				<div class="tabs-nav_item is-active" data-tab-name="tab-1">Описание</div>
				<div class="tabs-nav_item" data-tab-name="tab-2">Характеристика</div>
			</div>
			<div class="tabs_content">
			<div class="tab is-active tab-1">Содержание таба1</div>
			<div class="tab tab-2">Содержание таба2</div>
			</div>
			
		</div>
'; -->