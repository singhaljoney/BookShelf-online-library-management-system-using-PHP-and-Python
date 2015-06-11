<?php
include('../include/conn.php');
	if(isset($_SESSION["logged"]))
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
		if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["uname"]) && isset($_POST["motto"]))
		{
				$name = mysql_escape_string($_POST["name"]);
				$email =  mysql_escape_string($_POST["email"]);
				$pass =  mysql_escape_string($_POST["pass"]);
				$uname = mysql_escape_string($_POST["uname"]);
				$motto = mysql_escape_string($_POST["motto"]);
				if($name && $email && $pass && $uname && $motto)
				{
					$qry = "select * from users where username = '$uname' OR email = '$email'";
					$res = mysql_query($qry);
					$a = 0;
					while($row = mysql_fetch_array($res))
					{
					 $a++;
					}
					if($a==0)
					{
						$pass = md5($pass);
						$qry2 = "Insert into users(name,email,password,motto,username) values ('$name','$email','$pass','$motto','$uname')";
						$res2 = mysql_query($qry2) or die(mysql_error());
						
						$qry = "select max(uid) as muid from users";
						$res = mysql_query($qry);
						$row = mysql_fetch_array($res);
						$uid = $row["muid"]; 
						$_SESSION["logged"] = "user";
						$_SESSION["user"] = $uid;
						
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
						echo "Username/Email Already Registered";
						$_SESSION["error"] = "username";
						?>
						<script type="text/javascript">
						<!--
						function Redirect(url) {
							window.location= url;
						}
						setTimeout('Redirect("reg.php")', 100);
						//-->
						</script>
	
	<?php
					}
					
					
				}
				else
				{
					echo "Please Fill All Entries";
					$_SESSION["error"] = "entry";
?>
						<script type="text/javascript">
						<!--
						function Redirect(url) {
							window.location= url;
						}
						setTimeout('Redirect("reg.php")', 100);
						//-->
						</script>	
	<?php					
				}
		
		}
		else
		{
			echo "Don't try To Be OverSmart";
		}
	
	}
?>