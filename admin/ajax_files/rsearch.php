<?php
session_start();
?>	
<?php
if(isset($_SESSION["logged"]))
{
		if($_SESSION["logged"]!="admin")
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
			else if($_SESSION["logged"]!="user")
			{
				include('../php_files/conn.php');		
				if(isset($_GET["keywords"]))
					{
						$key = mysql_escape_string($_GET["keywords"]);
						$qry = "select * from reviews where review like '%$key%'";
						$res = mysql_query($qry);
						echo "<center><table><tr><td style='padding:50px'><b>
						Reviewer</b></td><td style='padding:50px'><b>
						Review</b></td><td style='padding:50px'><b>
						Book</b></td><td style='padding:50px'><b>
						Book Owner</b></td><td style='padding:50px'><b>
						Delete</b></td>
						</tr>";
						while($row = mysql_fetch_array($res))
						{
						$rid = $row["rid"];
							$nbid = $row["bid"];
							$nuid = $row["uid"];
							$review = $row["review"];
							$qry5 = "select name from users where uid = $nuid";
							$res5 = mysql_query($qry5) or die(mysql_error());
							$row5 = mysql_fetch_array($res5);
							$qry6 = "select name,uid from books where bid=$nbid";
							$res6 = mysql_query($qry6)or die(mysql_error());
							$row6 = mysql_fetch_array($res6);
							$muid = $row6["uid"];
							$qry7 = "select name from users where uid = $muid";
							$res7 = mysql_query($qry7)or die(mysql_error());
							$row7 = mysql_fetch_array($res7);
							
							echo "<tr>";
							echo "<td><center>".$row5["name"]."</center></td>";
							echo "<td><center>".$review."</center></td>";
							echo "<td><center>".$row6["name"]."</center></td>";
							echo "<td><center>".$row7["name"]."</center></td>";
							echo "<td><center><img width='50px' src='images/images.jpg' onClick=review_delete($rid);></center></td>";
							echo "</tr>";
							
						}
						echo "</table></center>";
					}
				else
				{
			?>
						<script type="text/javascript">
						<!--
						function Redirect(url) {
							window.location= url;
						}
						setTimeout('Redirect("usersearch.php")', 100);
						//-->
						</script>
	
	<?php
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
	
	
	