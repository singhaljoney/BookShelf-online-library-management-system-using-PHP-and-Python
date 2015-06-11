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
				if(isset($_POST["url"]))
				{
					$uid = $_SESSION["user"];
					$bid = mysql_escape_string($_POST["bid"]);
					$url = mysql_escape_string($_POST["url"]);
					$qry = "update books set url = '$url' where bid='$bid'";
					$res = mysql_query($qry) or die(mysql_error());
				}
					?>
						<script type="text/javascript">
						<!--
						function Redirect(url) {
							window.location= url;
						}
						setTimeout('Redirect("<?php echo $_SERVER['HTTP_REFERER']; ?>")', 100);
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
	  