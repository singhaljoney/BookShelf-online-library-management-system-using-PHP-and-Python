<?php
if(!isset($_SESSION))session_start();
?>
<html>
	<head>
		<title>Admin-MyShelf</title>
	</head>
	
	<body>
	<?php
		
		if(isset($_SESSION["logged"]))
		{
			if($_SESSION["logged"]=="user")
				?>
						<script type="text/javascript">
						<!--
						function Redirect(url) {
							window.location= url;
						}
						setTimeout('Redirect("../main.php")', 100);
						//-->
						</script>
	
	<?php
			else if($_SESSION["logged"]=="admin")
				?>
						<script type="text/javascript">
						<!--
						function Redirect(url) {
							window.location= url;
						}
						setTimeout('Redirect("admin.php")', 100);
						//-->
						</script>
	
	<?php
		}
		else
		{
					echo "<center>";
					echo "<h1>ADMIN PORTAL</h1>";
	?>		
					<form method = "post" action="php_files/admlogin.php">
						UserName :<input type="text" name="name" id="name"><br/><br/>
						PassWord :<input type="password" name="pass" id="pass"><br/><br/>
						<input type="submit" Value="Login">
		<?php	
					echo "</center>";
		
		}
	?>

	</body>
</html>