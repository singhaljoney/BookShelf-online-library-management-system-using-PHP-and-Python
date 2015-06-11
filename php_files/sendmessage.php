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
				if(isset($_POST["message"]))
				{
					$frid = $_SESSION["user"];
					$toid = $_POST["to"];
					$message = $_POST["message"];
					//echo $message;
					$date = time();
					//echo $date;
					$qry = "INSERT INTO `mails` (`from` ,`to` ,`message` ,`time`)VALUES ($frid, $toid, '$message', $date);";
					$res = mysql_query($qry) or die(mysql_error());
					$_SESSION["error"] = "no";
				}
				else
				{
					$_SESSION["error"] = "yes";
				}	
				?>
						<script type="text/javascript">
						<!--
						function Redirect(url) {
							window.location= url;
						}
						setTimeout('Redirect("profile.php?uid=$toid")', 100);
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
	  