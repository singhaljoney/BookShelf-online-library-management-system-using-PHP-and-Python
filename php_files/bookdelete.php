<?php
session_start();
?>	
<?php
if(isset($_SESSION["logged"]))
{
		if($_SESSION["logged"]=="admin")
		{
				header("location:../index.php");
		}
			else if($_SESSION["logged"]=="user")
			{
				include('../include/conn.php');
				if(isset($_GET["bid"]))
				{
						$bid = $_GET["bid"];
						$uid = $_SESSION["user"];
						$qry1 = "delete from books where bid = $bid and uid=$uid";
						$res1 = mysql_query($qry1)or die (mysql_error());
						$qry1 = "delete from schedule where bid = $bid";
						$res1 = mysql_query($qry1)or die (mysql_error());
						
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