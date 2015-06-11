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
				if(isset($_POST["oldpass"]))
				{
					$uid = $_SESSION["user"];
					$old= mysql_escape_string($_POST["oldpass"]);
					$new= mysql_escape_string($_POST["pass"]);
					$qry = "select password from users where uid = $uid";
					$res = mysql_query($qry) or die(mysql_error());
					$row = mysql_fetch_array($res);
					$newp = md5($new);
					if(md5($old) == $row["password"])
					{
						$qry1 = "update users set password = '$newp' where uid='$uid'";
						$res1 = mysql_query($qry1) or die(mysql_error());
						$_SESSION["error"] = "no";
					}
					else
					{
						$_SESSION["error"] = "wrong";
					}
					
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
	
	<?php}
?>  
	  