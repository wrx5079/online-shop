 <?php 
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		define('myeshop', true);
		include("../include/db_connect.php")

			$delete = mysqli_query($connection,"DELETE FROM `categories` WHERE id='{$_POST["id"]}'");
			$row = mysqli_fetch_assoc($delete);
			echo "delete";
   }


?>
