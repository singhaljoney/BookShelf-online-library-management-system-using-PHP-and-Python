
<?php
	include('conn.php');
	if(!isset($_SESSION))session_start();
	if(isset($_SESSION["logged"]))
	{
		if($_SESSION["logged"]=="user")
			?>
						<script type="text/javascript">
						<!--
						function Redirect(url) {
							window.location= url;
						}
						setTimeout('Redirect("../../main.php")', 100);
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
						setTimeout('Redirect("../admin.php")', 100);
						//-->
						</script>
	
	<?php
	}
	else
	{
		if(isset($_POST["name"]) && isset($_POST["pass"]))
		{
			$name = $_POST["name"];
			$pass = $_POST["pass"];
			if($name && $pass)
			{
				if($name=="ADMIN" && $pass=="MYSHELF")
					{
						$_SESSION["logged"] = "admin";
						$_SESSION["user"] = "-1";
			?>
						<script type="text/javascript">
						<!--
						function Redirect(url) {
							window.location= url;
						}
						setTimeout('Redirect("../admin.php")', 100);
						//-->
						</script>
	
	<?php
					}
				else
					{
						echo "Wrong ID and Password<br>";
					}
			}
			else
			{
				echo "Fill Both the Entries<br>";
			}
	
		}
		else
		{
			echo "Don't Try to be OverSmart<br>";
		}
	}
?>