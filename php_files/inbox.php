<?php
session_start();
?>	
<script type="text/javascript" src="../js_files/mailbox.js"></script>
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
				$uid = $_SESSION["user"];
				$qry = "select * from mails where `to` = $uid order by time desc";
				$res = mysql_query($qry) or die(mysql_error());
				if(mysql_num_rows($res)>0)
				{	echo "<center><table><tr><td><center>Mailer</td><td><center>Message</td><td><center>Time</td><td><center>Delete</td><td><center>Reply</center></td></tr>";
					while($row = mysql_fetch_array($res))
					{
						$mid = $row["mid"];
						$from = $row["from"];
						$qry1 = "select name from users where uid = $from";
						$res1 = mysql_query($qry1) or die(mysql_error());
						$row1= mysql_fetch_array($res1);
						echo "<tr>";
						echo "<td style='padding:20px;'><a href='profile.php?uid=$from'>".$row1["name"]."</a></td>";
						echo "<td style='padding:20px;'><textarea rows='5' cols='20' name='message'>".$row["message"]."</textarea>";
						echo "<td style='padding:20px;'>".date('Y-m-d h:i:s',$row["time"])."</td>";
						echo "<td style='padding:20px;'><img width='100px' height='100px' src='../Images/images.jpg' onClick=mail_delete($mid);></td>";
						echo "<td style='padding:20px;'><form method='post' action='sendmessage.php'>
						<textarea rows='5' cols='20' id='message' name='message'></textarea>
						<br><input type='text' hidden name='to' value=$from>
						<input type='Submit' value='Send'></form>";
						
						
					}
					echo "</table></center>"	;
				}
				else
				{
					echo "<center>NO MAIL AVAILABLE</center>";
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