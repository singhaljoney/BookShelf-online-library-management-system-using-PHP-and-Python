<?php
session_start();
?>	
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
				include('bhead.php');
				if(!isset($_GET["uid"]))
				{	
					
					$uid = $_SESSION["user"];
					//echo $uid;
					$qry = "select * from users where uid = $uid";
					$res = mysql_query($qry);
					$row = mysql_fetch_array($res);
					$name = $row["name"];
					$email = $row["email"];
					$motto = $row["motto"];
					$place = $row["place"];
					$sex = $row["sex"];
					$contact = $row["contactno"];
					$image = $row["image"];
					$uname = $row["username"];
					echo "<center><h1>".$row["name"]."</h1><br><br>";
					echo "<table><tr>";
					echo "<td style='padding:50px 150px 150px 150px;'>
					<br>Name : ".$name."<br><br>Username : ".$uname.
					"<br><br>Email : ".$email."<br><br><form method='post' action='updatemotto.php'>Motto : 
					".$motto."<br><input type='text' name='motto' id='motto' />
								<br />
								<input type='submit' name='submit' value='Update' />
							</form>
					
					<br><form method='post' action='updateplace.php'>Place : ".$place."<br>
					<input type='text' name='place' id='place' />
								<br />
								<input type='submit' name='submit' value='Update' />
							</form>
					<br>Sex : 
					".$sex;
					if($sex==""){
					echo"<form method='post' action='updatesex.php'><br><input type='text' name='sex' id='sex' />
								<br />
								<input type='submit' name='submit' value='Add' />
							</form>";
					}
					echo"<br><br><form method='post' action='updatecontact.php'>Contact : ".$contact."
					<br><input type='text' name='contact' id='contact' />
								<br />
								<input type='submit' name='submit' value='Update' />
							</form>
					<br>
					<form method='post' action='updatepass.php'>Change Password<br><br>
					Old Password :<input type='password' name='oldpass' id='oldpass' />
								<br />
								New Password :<input type='password' name='pass' id='pass' />
								<br><input type='submit' name='submit' value='Update' />
							</form>
					";
					if(isset($_SESSION["error"]))
					{
						if($_SESSION["error"]=="no")
						{
							echo "Password Changed";
						}
						else
						{
							echo "Wrong Old Password";
						}
						unset($_SESSION["error"]);
					}
					
					echo "
					</td>
							<td style = 'vertical-align: top;padding:50px 150px 150px 150px;'><center><img width ='150px' height='200px' src='../uploads/$image'><br>
							<br>
							<form method='post' action='imageuser.php' enctype='multipart/form-data'>
								<label for='image'>Change Pic:<br><br></label>
								<input type='file' name='image' id='image' />
								<br /><br>
								<input type='submit' name='submit' value='Upload' /></center>
							</form>
							</td>";
					
					echo "</center>";
					echo "</tr>";
				}
				else
				{
					$uid = $_GET["uid"];
					if($uid=="")$uid =$_SESSION["user"];
					if ($uid == $_SESSION["user"])
					{
				?>
						<script type="text/javascript">
						<!--
						function Redirect(url) {
							window.location= url;
						}
						setTimeout('Redirect("profile.php")', 100);
						//-->
						</script>
	
	<?php
					}
					else
					{
					$qry = "select * from users where uid = $uid";
					$res = mysql_query($qry) or die(mysql_error());
					$row = mysql_fetch_array($res);		
					$name = $row["name"];
					$email = $row["email"];
					$motto = $row["motto"];
					$place = $row["place"];
					$sex = $row["sex"];
					$contact = $row["contactno"];
					$image = $row["image"];
					$uname = $row["username"];
					echo "<center><h1>".$row["name"]."</h1><br><br>";
					echo "<table><tr>";
					echo "<td style='padding:50px 150px 150px 150px;'>
					<br>Name : ".$name."<br><br>Username : ".$uname.
					"<br><br>Email : ".$email."<br><br>Motto : 
					".$motto."<br>
								<br />
					Place : ".$place."<br>
				
								<br />Sex : 
					".$sex;
					echo "<br><br>Contact : ".$contact."
					<br>
								<br />
					<form method='post' action = 'sendmessage.php'>SEND A MESSAGE :<br><br>
					<input name ='to' type='text' hidden value=$uid />
					<textarea rows='5' cols='20' name='message' name='message'></textarea><br>
							<br><input type='Submit' value='Send'>
					<br>
					";
					
						if(isset($_SESSION["error"]))
						{
							if($_SESSION["error"]=="no")
							{
								echo "Message Sent";
							}
							else
							{
								echo "Error Occured";
							}
							unset($_SESSION["error"]);
						}
					echo "
					</td>
							<td style='vertical-align: top;padding:50px 150px 150px 150px;'><center><a href='mybooks.php?uid=$uid'>HIS BOOKSHELF</a>
							<br><br><br><br><img width ='150px' height='200px' src='../uploads/$image'><br>
							<br>
							<br>
							</td>";
					
					echo "</center>";
					echo "</tr>";
					}
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