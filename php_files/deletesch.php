<?php
include('../include/conn.php');
	if(!isset($_SESSION["logged"]))
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
	else
	{
		if($_SESSION["logged"]=="admin")
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
		else if($_SESSION["logged"]=="user")
		{
				$sid = $_GET["sid"];
				$qry = "delete from schedule where sid = $sid";
				$res = mysql_query($qry) or die(mysql_error());				
				?>
						<script type="text/javascript">
						<!--
						function Redirect(url) {
							window.location= url;
						}
						setTimeout('Redirect("schedule.php")', 100);
						//-->
						</script>
	
	<?php			
		}
	}
?>