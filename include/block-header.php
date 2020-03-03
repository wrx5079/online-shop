<div class="navigation">
		
		<div class="nav-menu">

			<ul class="menu">
				<img src="../images/uyt1.png" alt="" class="logotype">
				<li class="nav-item"><a href="#" class="nav-link">О нас</a></li>
				<li class="nav-item"><a href="#" class="nav-link">Магазины</a></li>
				<li class="nav-item"><a href="#" class="nav-link">Новости</a></li>
				<li class="nav-item"><a href="#" class="nav-link">Контакты</a></li>
			</ul>
		</div>
		<div class="header-rigth-menu">
			<?php 
			 if( isset($_SESSION['loged_user']) )
			 {
	  			// $_SESSION['loged_user'][login];
	  				
	  		echo '<li><p class="login_user">'.$_SESSION['loged_user'][login].'</p></li>
	  			<li><i class="fa fa-user-circle" aria-hidden="true"></i><a class="nav-link" href="logout.php">выйти</a></li>
	  				';
	         }
	         else
	         {
	         	echo '<li class="nav-item">
			<i class="fa fa-user-circle" aria-hidden="true"></i><a class="nav-link" href="login.php">вход</a></li>';
	         }
			?>
			
			
		</div>

		
</div>





<div class="social_search_block">
<div class="search-block">
	 <form method="GET"  action="search.php?=" class="searsh"> 
		<input type="text" id="input-search" name="q" placeholder="Поиск">
		<!-- <a href="#" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a> -->
	 </form> 
</div> 

<div class="social-menu">

			<ul class="social-icon">
				<li><a href="#" class="social-link"><i class="fa fa-facebook-square" aria-hidden="true"></i>
</a></li>
				<li><a href="#" class="social-link"><i class="fa fa-twitter-square" aria-hidden="true"></i>
</a></li>
				<li><a href="#" class="social-link"><i class="fa fa-pinterest-square" aria-hidden="true"></i>
</a></li>
				<li><a href="#" class="social-link"><i class="fa fa-youtube-play" aria-hidden="true"></i>
</a></li>
				<li><a href="#" class="social-link"><i class="fa fa-instagram" aria-hidden="true"></i>
</a></li>
			</ul>
</div>
</div>
