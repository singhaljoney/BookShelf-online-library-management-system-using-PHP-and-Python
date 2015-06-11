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
				echo "<center><h2>ALL REVIEWS</h2><br>";
				$qry = "select * from reviews";
				$res = mysql_query($qry) or mysql_die(error);
				echo "<table><tr>
				<td style='padding:50px'><b>Book Name</b></td>
				<td style='padding:50px'><b>Book Owner</b></td>
				<td style='padding:50px'><b>Reviewer</b></td>
				<td style='padding:50px'><b>Review</b></td>
				<td style='padding:50px'><b>Delete</b></td>
				</tr>";
				while($row = mysql_fetch_array($res))
				{
					$bid = $row["bid"];
					$rid = $row["rid"];
					$qry2 = "select name,uid from books where bid = $bid";
					$res2 = mysql_query($qry2);
					$row2 = mysql_fetch_array($res2);
					$uid = $row2["uid"];
					$qry3 = "select name from users where uid = $uid";
					$res3 = mysql_query($qry3);
					$row3 = mysql_fetch_array($res3);
					
					echo "<tr>";
					echo "<td><center>".$row2["name"]."</center></td>";
					echo "<td><center>".$row3["name"]."</center></td>";
					$uid = $row["uid"];
					$qry4 = "select name from users where uid = $uid";
					$res4 = mysql_query($qry4);
					$row4 = mysql_fetch_array($res4);
					echo "<td><center>".$row4["name"]."</center></td>";
					echo "<td><center>".$row["review"]."</center></td>";
					echo "<td><center><img width='50px' src='images/images.jpg' onClick=review_delete($rid);></center></td>";
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
						setTimeout('Redirect("../index.php")', 100);
						//-->
						</script>
	
	<?php
	}
?>
	
	
	