<div id="block-parameter">
	<p class="header-title">Поиск по параметрам</p>
	

	<form action="search_filter.php" method="GET">
		

		<p class="title-filter">Производители</p>

		<ul class="checkboxbrend">

			<!-- Выбор товаров по фильтру -->
			<?php 
				$result = mysqli_query($connection,"SELECT * FROM `categories` WHERE type='tv'");
				if(mysqli_num_rows($result ) > 0)
				{
					$row = mysqli_fetch_assoc($result);
					do
					{
						$checked_brand = "";
						if($_GET["brand"])
						{
							if(in_array($row["id"],$_GET["brand"] ))
							{
								$checked_brand = "checked";
							}
						}

						echo '<li><input class="checkbox_style" '.$checked_brand.' type="checkbox" name="brand[]" value="'.$row["id"].'" id="checkbrend'.$row["id"].'"><label for="checkbrend'.$row["id"].'">'.$row['brand'].'</label></li>';
						
					}
					while ($row = mysqli_fetch_assoc($result)); 
				}
			?>
		</ul>

		<ul class="checkboxbrend">

			<!-- Выбор товаров по фильтру -->
			<?php 
				$result = mysqli_query($connection,"SELECT * FROM `categories` WHERE type='notebook'");
				if(mysqli_num_rows($result ) > 0)
				{
					$row = mysqli_fetch_assoc($result);
					do
					{
						$checked_brand = "";
						if($_GET["brand"])
						{
							if(in_array($row["id"],$_GET["brand"] ))
							{
								$checked_brand = "checked";
							}
						}

						echo '<li><input class="checkbox_style" '.$checked_brand.' type="checkbox" name="brand[]" value="'.$row["id"].'" id="checkbrend'.$row["id"].'"><label for="checkbrend'.$row["id"].'">'.$row['brand'].'</label></li>';
						
					}
					while ($row = mysqli_fetch_assoc($result)); 
				}
			?>
		</ul>

		<ul class="checkboxbrend">

			<!-- Выбор товаров по фильтру -->
			<?php 
				$result = mysqli_query($connection,"SELECT * FROM `categories` WHERE type='notepad'");
				if(mysqli_num_rows($result ) > 0)
				{
					$row = mysqli_fetch_assoc($result);
					do
					{
						$checked_brand = "";
						if($_GET["brand"])
						{
							if(in_array($row["id"],$_GET["brand"] ))
							{
								$checked_brand = "checked";
							}
						}

						echo '<li><input class="checkbox_style" '.$checked_brand.' type="checkbox" name="brand[]" value="'.$row["id"].'" id="checkbrend'.$row["id"].'"><label for="checkbrend'.$row["id"].'">'.$row['brand'].'</label></li>';

					}
					while ($row = mysqli_fetch_assoc($result)); 
				}
			?>
		</ul>

		<input type="submit" name="submit" id="button-parametr-search" value="Найти">


	</form>

	



</div>