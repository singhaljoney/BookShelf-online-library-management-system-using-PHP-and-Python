<?php
if(!isset($_SESSION))session_start();
?>

<?php
	if(isset($_SESSION["logged"]))
	{
		if($_SESSION["logged"]=="admin")
				?>
						<script type="text/javascript">
						<!--
						function Redirect(url) {
							window.location= url;
						}
						setTimeout('Redirect("../index.php")', 100);
						//-->
						</script>
	
	<?php
		else if($_SESSION["logged"]=="user")
		{
			header("location:php_files/profile.php");
		}
	}
	else
				?>
						<script type="text/javascript">
						<!--
						function Redirect(url) {
							window.location= url;
						}
						setTimeout('Redirect("index.php")', 100);
						//-->
						</script>
	
	<?php
?>