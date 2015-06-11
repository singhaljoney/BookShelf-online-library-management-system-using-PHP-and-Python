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
				echo "<center><h2>ALL USERS</h2><br>";
				$qry = "select * from users";
				$res = mysql_query($qry) or mysql_die(error);
				echo "<table><tr><td style='padding:50px'><b>Profile Pic</b></td><td style='padding:50px'>
				<b>Name</b></td><td style='padding:50px'><b>Username</b></td>
				<td style='padding:50px'><b>Contact</b></td>
				<td style='padding:50px'><b>Email</b></td><td style='padding:50px'><b>Delete</b></td></tr>";
				while($row = mysql_fetch_array($res))
				{
					$uid = $row["uid"];
					$image = $row["image"];
					echo "<tr>";
					echo "<td><img src='../uploads/$image' width='100px' height='100px' /></td>";
					echo "<td>".$row["name"]."</td>";
					echo "<td>".$row["username"]."</td>";
					echo "<td>".$row["contactno"]."</td>";
					echo "<td>".$row["email"]."</td>";
					echo "<td><img width='50px' src='images/images.jpg' onClick=user_delete($uid);></td>";
					echo "</tr>";	
				}
				echo "</table>";
				echo "</center>";
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
						setTimeout('Redirect("../admin.php")', 100);
						//-->
						</script>
	
	<?php
	}
?>
	
	
	