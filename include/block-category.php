<div id="block-category">


										<!-- Телевизоры -->
	<ul class="nav">
		<li class="nav__item"><a class="nav__item-link" href="#tv"><i class="fa fa-desktop" aria-hidden="true"></i>Телевизоры</a>
			<div id="tv" class="category-section">
				<a class="nav__submenu-link" href="view_cat.php?type=tv"><strong>Все модели</strong></a>
				        <!-- Вывод категорий -->
		<?php

			$result = mysqli_query($connection,"SELECT * FROM `categories` WHERE type='tv' ");
		
		if (mysqli_num_rows($result) > 0)
		{
			$row = mysqli_fetch_assoc($result);
			
			do 
			{
				echo'<a class="nav__submenu-link" href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>' ;
			}
				while ($row = mysqli_fetch_assoc($result)) ;
			}
		?>
				
			</div>
		</li>


                                  <!-- Ноутбуки -->



		<li class="nav__item"><a class="nav__item-link" href="#notebook"><i class="fa fa-laptop" aria-hidden="true"></i>Ноутбуки</a>
			<div id="notebook" class="category-section">
				<a class="nav__submenu-link" href="view_cat.php?type=notebook"><strong>Все модели</strong></a>
				<?php

			$result = mysqli_query($connection,"SELECT * FROM `categories` WHERE type='notebook' ");
		
		if (mysqli_num_rows($result) > 0)
		{
			$row = mysqli_fetch_assoc($result);
			
			do 
			{
				echo'<a class="nav__submenu-link" href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>' ;
			}
				while ($row = mysqli_fetch_assoc($result)) ;
			}
		?>
			</div>
		</li>
		

                                     <!-- Планшеты -->


		<li class="nav__item"><a class="nav__item-link" href="#notepad"><i class="fa fa-tablet" aria-hidden="true"></i>Планшеты</a>
			<div id="notepad" class="category-section">
				<a class="nav__submenu-link" href="view_cat.php?type=notepad"><strong>Все модели</strong></a>
				<?php

			$result = mysqli_query($connection,"SELECT * FROM `categories` WHERE type='notepad' ");
		
		if (mysqli_num_rows($result) > 0)
		{
			$row = mysqli_fetch_assoc($result);
			
			do 
			{
				echo'<a class="nav__submenu-link" href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>' ;
			}
				while ($row = mysqli_fetch_assoc($result)) ;
			}
		?>
			</div>
		</li>

		<li class="nav__item">
			<a href="#exit" class="nav__item-link">
				<i class="fas fa-sign-out-alt"></i> Выход
			</a>
		</li>
	</ul>
</div>