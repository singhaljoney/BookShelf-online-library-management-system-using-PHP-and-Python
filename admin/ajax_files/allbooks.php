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
				echo "<center><h2>ALL BOOKS</h2><br>";
				$qry = "select * from books";
				$res = mysql_query($qry) or mysql_die(error);
				echo "<table><tr><td style='padding:50px'>Image</td><td style='padding:50px'><b>Name</b></td><td style='padding:50px'><b>Author</b>
				</td><td style='padding:50px'><b>Owner</b></td><td style='padding:50px'><b>About</b></td><td style='padding:50px'><b>URL</b>
				</td><td style='padding:50px'><b>Delete</b></td></tr>";
				while($row = mysql_fetch_array($res))
				{
					$bid = $row["bid"];					
					$image = $row["image"];
					echo "<tr>";
					echo "<td><img src='../uploads/$image' width='100px' height='100px' /></td>";
					echo "<td>".$row["name"]."</td>";
					echo "<td>".$row["author"]."</td>";
					$uid = $row["uid"];
					$qry2 = "select name from users where uid = $uid";
					$res2 = mysql_query($qry2);
					$row2 = mysql_fetch_array($res2);
					echo "<td>".$row2["name"]."</td>";
					echo "<td>".$row["about"]."</td>";
					echo "<td>".$row["url"]."</td>";
					echo "<td><img width='50px' src='images/images.jpg' onClick=delete_book($bid);></td>";
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
	
	
	