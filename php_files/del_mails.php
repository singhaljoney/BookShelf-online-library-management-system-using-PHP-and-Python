<?php
session_start();
?>	
<?php
if(isset($_SESSION["logged"]))
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
				include('../include/conn.php');
				if(isset($_GET["mid"]))
					{
						$mid = $_GET["mid"];
						$qry = "delete from mails where mid = $mid";
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