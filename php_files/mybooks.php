<?php
if(!isset($_SESSION))session_start();
?>
<?php
include('../include/conn.php');
	if(isset($_SESSION["logged"]))
	{
		if($_SESSION["logged"]=="user")
		{
				if(!isset($_GET["uid"]))
				{	
					include('bhead.php');
					echo "<center><h1>Categories</h1><br><br><br>";
					$uid = $_SESSION["user"];
					$qry = "select distinct category from books where uid = $uid";
					$res = mysql_query($qry) or die(mysql_error());
					echo "<table>";
					$numrows = mysql_num_rows($res);
					while($numrows>0)
					{
						echo "<tr>";
						
						for($i=1;$i<=7;$i++)
						{
							if($row = mysql_fetch_array($res)){
							$cat =  $row["category"];
							echo "<td style='padding-top:10px;padding-right:30px;padding-left:30px;'><a href = 'books.php?cat=$cat'>"."<img  src='../Images/book".$i.".png' width='100px' height='120px'/></a>
							<br><center><div style='color:#EC77B4;'>".$row["category"]."</div></center></td>";
							$numrows--;
							
							}
						}
						
						echo "</tr>";
					}
					echo "</table>";
					echo"</center>";		
				}
				else
				{
					$buid = $_GET["uid"];
					if($buid=="")$buid = $_SESSION["user"];
					if($buid == $_SESSION["user"])
					{
				?>
						<script type="text/javascript">
						<!--
						function Redirect(url) {
							window.location= url;
						}
						setTimeout('Redirect("mybooks.php")', 100);
						//-->
						</script>
	
	<?php
					}
					else
					{
						include('bhead.php');
					$uid = $buid;
					$qry = "select name from users where uid = $uid";
					$res = mysql_query($qry);
					$row = mysql_fetch_array($res);
					$name = $row["name"];
					echo "<center><h1><a href='profile.php?uid=$uid'>$name's</a> Categories</h1><br><br><br>";
					
					$qry = "select distinct category from books where uid = $uid";
					$res = mysql_query($qry) or die(mysql_error());
					echo "<table>";
					$numrows = mysql_num_rows($res);
					while($numrows>0)
					{
						echo "<tr>";
						
						for($i=1;$i<=7;$i++)
						{
							if($row = mysql_fetch_array($res)){
							$cat =  $row["category"];
							echo "<td style='padding-top:10px;padding-right:30px;padding-left:30px;'><a href = 'books.php?cat=$cat&uid=$uid'>"."<img  src='../Images/book".$i.".png' width='100px' height='120px'/></a>
							<br><center><div style='color:#EC77B4;'>".$row["category"]."</div></center></td>";
							$numrows--;
							
							}
						}
						
						echo "</tr>";
					}
					echo "</table>";
					echo"</center>";
									
					
					}
					
					
				}
				if($uid == $_SESSION["user"])
					echo "<br><br><br><div style='float:left;padding-left:100px;'><a href='schedule.php'><img style='padding:px;' width='100px' height='100px' src='../Images/scheduleico.png' /></a></div>";
					echo "<div style='float:right;padding-right:100px;'><img src='../Images/back.png' onClick=window.history.back(); style='padding:1px;' width='100px' height='100px' /></div>";
			
			
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