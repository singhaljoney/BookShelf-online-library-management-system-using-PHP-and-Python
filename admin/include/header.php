<?php
if(!isset($_SESSION))session_start();
?>
<?php
	if(isset($_SESSION["logged"]))
		{if($_SESSION["logged"]=="admin")
			{
?>
				<html>
					<head>
						<title>Admin-MyShelf</title>
						<script type="text/javascript" src="js_files/allusers.js"></script>
						<script type="text/javascript" src="js_files/users.js"></script>
						<script type="text/javascript" src="js_files/allbooks.js"></script>
						<script type="text/javascript" src="js_files/allreviews.js"></script>
						<script type="text/javascript" src="js_files/books.js"></script>
						<script type="text/javascript" src="js_files/reviews.js"></script>
						<script type="text/javascript" > function ad() {alert(document.getElementById("search").value);}   </script>
						
					</head>
				<?php
				echo "<center>";
				echo "<h1>ADMIN PORTAL</h1>";
				echo "
						<input type='button' onClick=view(); class='menubtn' value='All Users'>
						<input type='button' class='menubtn' onClick=user_search(''); value='Search Users'>
						<input type='button' class='menubtn' onClick=books(); value='All Books'>
						<input type='button' class='menubtn' onClick=book_search(); value='Search Books'>
						<input type='button' class='menubtn' onClick=reviews(); value='All Reviews'>
						<input type='button' class='menubtn' onClick=review_search(); value='Search Reviews'>
						<input type='button' class='menubtn' onClick=window.location='php_files/logout.php'; value='LogOut'>
						";
				echo "</center><br><br><hr>";
				?>
<?php
			}
			else
				echo "NOT AUTHENTICATED";
		}
	else
		{
				echo "NOT AUTHENTICATED";
		}
?>