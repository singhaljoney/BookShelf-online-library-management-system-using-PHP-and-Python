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
				if(isset($_POST["motto"]))
				{
					$uid = $_SESSION["user"];
					$motto = mysql_escape_string($_POST["motto"]);
					$qry = "update users set motto = '$motto' where uid='$uid'";
					$res = mysql_query($qry) or die(mysql_error());
				}
				?>
						<script type="text/javascript">
						<!--
						function Redirect(url) {
							window.location= url;
						}
						setTimeout('Redirect("profile.php")', 100);
						//-->
						</script>
	
	<?php
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
	  