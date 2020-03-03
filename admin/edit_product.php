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

	$_SESSION['urlpage'] = "<a href='index.php'> Главная</a> / <a href='tovar.php'> Товары</a> / <a >Изменение товара</a>"; 

	include("include/db_connect.php");
	include("include/functions.php");

	$id = clear_string($_GET["id"]);

	//Удаление картинки
	$action = clear_string($_GET["action"]);
	if(isset($action))
	{
		switch ($action) {
			case 'delete':
				if(file_exists("../uploads_images/".$_GET["img"]))
				{
					unlink("../uploads_images/".$_GET["img"]);
				}
				break;
		}
	}



if($_POST["submit_save"])
{
	$errors = array();

	//Проверка полей

	if(!$_POST["form_title"])
	{
		$errors[] = "Укажите название товара";
	}

	if(!$_POST["form_price"])
	{
		$errors[] = "Укажите цену";
	}

	if(!$_POST["form_category"])
	{
		$errors[] = "Укажите категорию";
	}
	else
	{
		$result = mysqli_query($connection, "SELECT * FROM `categories` WHERE id='{$_POST["form_category"]}'");
		$row = mysqli_fetch_assoc($result);
		$selectbrand = $row["brand"];
	}

		if(isset($_FILES["upload_image"]))
		{
			$errors_img = array();
			$file_name = clear_string($_FILES['upload_image']['name']);
			$file_size = $_FILES['upload_image']['size'];
			$file_tmp = $_FILES['upload_image']['tmp_name'];
			$fyle_type = $_FILES['upload_image']['type'];
			$file_ext = strtolower(end(explode('.',$_FILES['upload_image']['name'])));

			$expensions = array("jpeg", "jpg","png");
			if(move_uploaded_file($file_tmp,'../uploads_images/'.$file_name))
			{
				mysqli_query($connection,"UPDATE `products` SET `images`='$file_name' WHERE
				 `products_id` = '$id'");

			}
			
		}


	//Проверка чекбоксов

		if($_POST["check_visible"])
		{
			$chk_visible = "1";
		}
		else
		{
			$chk_visible = "0";
		}

		//Проверка на ошибки

	if (count($errors))
	{
		$_SESSION['message'] = "<p id ='form-error'>".implode('<br/>',$errors)."</p>";
	}
	else
	{

		$querynew = "title='{$_POST["form_title"]}',price='{$_POST["form_price"]}',brand='$selectbrand',mini_description='{$_POST["txt1"]}',description='{$_POST["txt2"]}',mini_features='{$_POST["txt3"]}',features='{$_POST["txt4"]}',visible='$chk_visible',type_of_goods='{$_POST["form_type"]}',brand_id='{$_POST["form_category"]}'";
		$update = mysqli_query($connection,"UPDATE `products` SET $querynew WHERE products_id = '$id'");


		$_SESSION['message'] = "<p id='form-succes'>Товар успешно изменен!</p>";
		

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
?>

		<div class="block-content">

			<div class="block-parameters">
				<p class="title-page">Изменение товара</p>
			</div> 

			<?php  
				if(isset($_SESSION['message']))
				{
					echo $_SESSION['message'];
					unset($_SESSION['message']);
				}
			?>
			
			
			<?php 

				$result = mysqli_query($connection,"SELECT * FROM `products` WHERE products_id='$id' ");
								if(mysqli_num_rows($result) > 0)
								{
									$row = mysqli_fetch_assoc($result);
									do
									{
										echo '
				<form enctype="multipart/form-data" method="post" class="form_tovar-2">
				<div class="block_add_product-2">
				<ul class="edit-tovar">
					<li>
						<label for="form_title">Название товара</label>
						<input type="text" name="form_title" value="'.$row['title'].'">
					</li>
					
					<li>
						<label for="form_price">Цена</label>
						<input type="text" name="form_price" value="'.$row['price'].'">
					</li>	

						

					 ';
								

			
								$category = mysqli_query($connection,"SELECT * FROM `categories` ");
								if(mysqli_num_rows($category) > 0)
								{
									$result_cat = mysqli_fetch_assoc($category);

									if($row["type_of_goods"] == "tv")$type_tv = "selected";
									if($row["type_of_goods"] == "notebook")$type_notebook = "selected";
									if($row["type_of_goods"] == "notepad")$type_notepad = "selected";

									echo '<li>
						<label for="form_type">Тип товара</label>
						<select name="form_type" id="type" size="1">
							<option '.$type_tv.' value="tv">Телевизоры</option>
							<option '.$type_notebook.' value="notebook">Ноутбуки</option>
							<option '.$type_notepad.' value="notepad">Планшеты</option>
						</select>
					</li>	

					<li>
						<label >Категория</label>
						<select name="form_category" size="10">';
									do
									{
										echo '<option value="'.$result_cat["id"].'">'.$result_cat["type"].'-'.$result_cat["brand"].'</option> ';
									}
									while ($result_cat = mysqli_fetch_assoc($category));
								}

								echo '
									</select>
					</li>
				</ul>
									';

                        if (strlen($row["images"]) > 0 && file_exists("../uploads_images/".$row["image"]))
							{

								$img = '../uploads_images/'.$row["images"];	

								echo'
				<label class="stylelabel">Основная картинка</label>
					
									';
							}
							else
							{
								echo '
				<label class="stylelabel">Основная картинка</label>
				<div class="img-upload">
					<input type="hidden" name="MAX_FILE_SIZE" value="5000000">
					<input type="file" name="upload_image">
				</div>
				</div>';
							}
				
								echo '<div class="add_product_block3">
				<h3><p class="h3click">Краткое описание товара</p></h3>
				<div class="add_descrip1">
					<textarea name="txt1" id="descrip1" cols="100" rows="20">'.$row["mini_description"].'</textarea>
				</div>

				<h3><p class="h3click"> Описание товара</p></h3>
				<div class="add_descrip2">
					<textarea name="txt2" id="descrip2" cols="100" rows="20">'.$row["description"].'</textarea>
				</div>

				<h3><p class="h3click">Краткая характеристика товара</p></h3>
				<div class="add_descrip3">
					<textarea name="txt3" id="descrip3" cols="100" rows="20">'.$row["mini_features"].'</textarea>
				</div>

				<h3><p class="h3click"> Характеристика товара</p></h3>
				<div class="add_descrip4">
					<textarea name="txt4" id="descrip4" cols="100" rows="20">'.$row["features"].'</textarea>
				</div> ';

				if ($row["visible"] == '1') $checked = "checked";
								echo'
				<h3 class="h3title">Настройки товара</h3>
				<input type="checkbox" name="check_visible" id="check_visible" '.$checked.'><label for="check_visible">Показывать товар</label>

				<input type="submit" id="submit_form" name="submit_save" value="Сохранить">
				</div>
			</form>
								';
							}while($row = mysqli_fetch_assoc($result));
						}
							?>


						
	
		</div>
	</div>
	
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