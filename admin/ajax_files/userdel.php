<?php
	include('../php_files/conn.php');
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
			{
				if(isset($_GET["uid"]))
					{
						$uid = $_GET["uid"];
						$qry = "delete from users where uid = $uid";
						$res = mysql_query($qry) or die(mysql_error());
						$qry = "delete from books where uid = $uid";
						$res = mysql_query($qry) or die(mysql_error()) ;
						$qry = "delete from reviews where uid = $uid";
						$res = mysql_query($qry) or die(mysql_error());
					}			
			}
	}
	else
	{
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
	}
?>
	
	
	