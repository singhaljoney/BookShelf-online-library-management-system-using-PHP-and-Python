<?php
session_start();
	if(!isset($_SESSION["logged"]))
	{
		include('../include/conn.php');

		$uname = mysql_escape_string($_POST['name']);
		$pass = md5(mysql_escape_string($_POST['pass']));
		if($uname && $pass)
		{
			$qry = "Select * from users where username = '$uname' AND password = '$pass'";
			$res = mysql_query($qry);
			if(mysql_num_rows($res)==0){
			echo "Enter Correct Password And Email";
			$_SESSION["error"] = "login";
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
			$row = mysql_fetch_array($res);
			$_SESSION["user"]=$row["uid"];
			$_SESSION["logged"]="user";
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
		}
		else
		{
			$_SESSION["error"] = "entry";
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