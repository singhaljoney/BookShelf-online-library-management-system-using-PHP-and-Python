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
				if(isset($_GET["rid"]))
					{
					
					
						$rid = $_GET["rid"];
						//echo $rid;
						$qry = "delete from reviews where rid = $rid";
						$res = mysql_query($qry) or die(mysql_error());
						//header("location:".$_SERVER['HTTP_REFERER']);
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
	
	
	