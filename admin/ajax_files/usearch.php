<?php
session_start();
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
				if(isset($_GET["keywords"]))
					{
						$key = mysql_escape_string($_GET["keywords"]);
						$qry = "select * from users where name like '%$key%' OR username like '%$key%' OR email like '%$key%' order by adminreview desc";
						$res = mysql_query($qry);
						echo "<center><table><tr><td style='padding:50px'><b>Profile Pic</b></td><td style='padding:50px'><b>Name</b></td><td style='padding:50px'><b>Email</b></td><td style='padding:50px'><b>Contact</b></td><td style='padding:50px'><b>Delete</b></td></tr>";
						while($row = mysql_fetch_array($res))
						{
							$uid = $row["uid"];
							echo "<tr>";
							echo "<td><center><img width='100px' height='100px' src='../uploads/".$row["image"]."'></td>";
							echo "<td><center>".$row["name"]."</td>";
							echo "<td><center>".$row["email"]."</td>";
							echo "<td><center>".$row["contactno"]."</td>";
							echo "<td><img width='50px' src='images/images.jpg' onClick=user_delete($uid);></td>";
							echo "</tr>";
							
						}
						echo "</table></center>";
					
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
	
	
	