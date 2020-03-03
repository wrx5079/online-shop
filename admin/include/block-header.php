<?php 
	defined('myeshop') or die ('Доступ запрещен!');
?>

<div class="block-header">
	
	<div class="block-left">
		<h3>Панель управления</h3>
		<!-- <p id="link-nav"><?php echo $_SESSION['urlpage']; ?></p>  -->
	</div>
	<div class="block-cat">
	
			<a href="index.php">Товары</a> 
			<a href="category.php">Категории</a>
	</div>
	<div class="block-right">
		<p><a href="administrators.php">Администратор</a><i class="fa fa-user" aria-hidden="true"></i>
<a href="?logout">Выйти</a> </p>
		<p id="link-nav"></p>
	</div>
	
</div>

