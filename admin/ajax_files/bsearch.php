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
						$qry = "select * from books where name like '%$key%' OR author like '%$key%' OR category like '%$key%' OR about like '%$key%' OR publisher like '%$key%' order by ratings desc";
						$res = mysql_query($qry);
						echo "<center><table><tr><td style='padding:50px'><b>
						Book Pic</b></td><td style='padding:50px'><b>
						Name</b></td><td style='padding:50px'><b>
						Author</b></td><td style='padding:50px'><b>
						About</b></td><td style='padding:50px'><b>
						Ratings</b></td><td style='padding:50px'><b>
						In Bookshelf Of</b></td><td style='padding:50px'><b>
						Delete</b></td></tr>";
						while($row = mysql_fetch_array($res))
						{
							$uid = $row["uid"];
							$bid = $row["bid"];
							$qry2 = "select * from users where uid = $uid";
							$res2 = mysql_query($qry2)or die(mysql_error());
							$row2=mysql_fetch_array($res2);
							echo "<tr>";
							echo "<td><center><img width='100px' height='100px' src='../uploads/".$row["image"]."'></td>";
							echo "<td><center>".$row["name"]."</td>";
							echo "<td><center>".$row["author"]."</td>";
							echo "<td><center>".$row["about"]."</td>";
							$ratings = $row["ratings"];
							echo "<td><center>";
							
							$x = 0;for($i=0;$i<$ratings;$i++){$temp = $i+1; echo "<a href='php_files/changeratings.php?value=$temp&bid=$bid'><img width='20px' height='20px' 
							 src='../Images/star.png'></a>"; $x++;}
							$temp = $x;
							for($y = 4-$x;$y>=0;$y--){ $temp++;echo "<a href='php_files/changeratings.php?value=$temp&bid=$bid'><img width='20px' height='20px' 
							src='../Images/star2.png'></a>";}
							echo "</td>";
							if($row2["uid"] == $_SESSION["user"])echo "<td><center>ME</center></td>";
							else echo "<td><center>".$row2["name"]."</td>";
							echo "<td><img width='75px' src='images/images.jpg' onClick=delete_book($bid);></td>";
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
	
	
	