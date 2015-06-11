<?php
session_start();
?>	
<head>
<script type="text/javascript" src="../js_files/books.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript" ></script>
<script src="../lib/underscore.js" type="text/javascript"></script>
<script src="../lib/mustache.js" type="text/javascript"></script>
<script src="../js/jquery.preview.js" type="text/javascript"></script>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/preview.css" />
</head>	
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
				if(isset($_GET["cat"]))
				{
					$category = $_GET["cat"];
					$flag=0;
					if(isset($_GET["uid"])){if($_GET["uid"]!=""){$uid=$_GET["uid"];if($uid!=$_SESSION["user"])
					$flag=1;
					}else $uid = $_SESSION["user"]; }					
					else $uid = $_SESSION["user"];
					
					echo "<center><h1>$category</h1></center><br>";
					$qry = "select * from books where category = '$category' and uid = $uid order by ratings desc";
					$res = mysql_query($qry) or die(mysql_error());
					echo "<center><table><tr><td style='padding:50px'><b>Book Pic</b></td><td style='padding:50px'><b>Name</b></td><td style='padding:50px'><b>Author</b></td><td style='padding:50px'><b>About</b></td><td><b>Ratings</b></td>
					";
					if($flag==0)echo "<td style='padding:50px'><b>Read From</b></td><td style='padding:50px'><b>Read Till</b></td><td style='padding:50px'><b>Delete</b></td>";
					echo "</tr>";
						while($row = mysql_fetch_array($res))
						{
							$bid = $row["bid"];
							$qry2 = "select * from schedule where bid=$bid order by schtime asc";
							$res2 = mysql_query($qry2) or die(mysql_error());
							$row2 = mysql_fetch_array($res2);
							echo "<tr>";
							echo "<td><center><a href='books.php?bid=$bid'><img width='100px' height='100px' src='../uploads/".$row["image"]."'></a></td>";
							echo "<td><center><a href='books.php?bid=$bid'>".$row["name"]."</a></td>";
							echo "<td><center>".$row["author"]."</td>";
							echo "<td><center>".$row["about"]."</td>";
							$ratings = $row["ratings"];
							echo "<td><center>";
							
							$x = 0;for($i=0;$i<$ratings;$i++){$temp = $i+1; echo "<a href='changeratings.php?value=$temp&bid=$bid'><img width='20px' height='20px' 
							src='../Images/star.png'></a>"; $x++;}
							$temp = $x;
							for($y = 4-$x;$y>=0;$y--){$temp++;echo "<a href='changeratings.php?value=$temp&bid=$bid'><img width='20px' height='20px' 
							src='../Images/star2.png'></a>"; }
							echo "</td>";
							if($flag==0)echo "<td><center><a href='schedule.php?sid=".$row2["sid"]."'>".$row2["schtime"]."</center></td>
							<td><center><a href='schedule.php?sid=".$row2["sid"]."'>".$row2["endtime"]."</a></center></td>
							
							<td><center><a href='bookdelete.php?bid=$bid'><img width='100px' height='100px' src='../Images/images.jpg' ></a></center></td>";
				
							echo "</tr>";
							
						}
						echo "</table></center>";
						echo "<center><img src='../Images/back.png' onClick=window.history.back(); width='100px' height='100px'></img></center>";
				
				}
				else if(isset($_GET["bid"]))
				{
					$bid = $_GET["bid"];
					$qry = "select * from books where bid = $bid";
					$res = mysql_query($qry) or die(mysql_error());
					$row = mysql_fetch_array($res);
					$name = $row["name"];
					$author = $row["author"];
					$publisher = $row["publisher"];
					$price = $row["price"];
					$about = $row["about"];
					$ratings = $row["ratings"];
					$category = $row["category"];
					$image = $row["image"];
					$url = $row["url"];
					$uid = $row["uid"];
					$ebook = $row["ebook"];
					$qry2 = "select name from users where uid=$uid";
					$res2 = mysql_query($qry2) or die(mysql_error());
					$row2 = mysql_fetch_array($res2);	
					echo "<center><h1>".$row["name"]."</h1>";
					echo "<table><tr>";
					echo "<td style='padding:50px 150px 150px 150px;'>
					<br>Name : ".$name."<br><br>Author : <a  target='_blank' href='http://www.google.com/search?q=$author'>".$author.
					"</a><br><br>Publisher : <a target='_blank' href='http://www.google.com/search?q=$publisher'>".$publisher."</a><br><br>Price : ".$price."
					<br><br>Book Owner : <a href='profile.php?uid=$uid'>".$row2["name"]."</a><br><br>
					"; 
					if($uid==$_SESSION["user"])
					{
					echo "<form method='post' action='updatecategory.php'>Category : 
					".$category."<br><input type='text' name='category' id='category' />
								<input type='text' hidden value=$bid name='bid' />
								<br />
								<input type='submit' name='submit' value='Update' />
							</form><br><br><form method='post' action='updateabout.php'>About : 
					".$about."<br><input type='text' name='about' id='about' />
								<br /><input type='text' hidden value=$bid name='bid' />
								<input type='submit' name='submit' value='Update' />
							</form>
							<br><br>URL :";
							if($url=="")
							{
							?>
							<!--<form method='post' action='updateurl.php' ><input type='text' name='url' id='url' />
									<br/><input type='text' hidden value=$bid name='bid' />
								<input type='submit' name='submit' value='Add' />
							</form>
							-->
							
								  <head>
									<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript" ></script>
									<script src="../lib/underscore.js" type="text/javascript"></script>
									<script src="../lib/mustache.js" type="text/javascript"></script>
									<script src="../js/jquery.preview.js" type="text/javascript"></script>
									<link rel="stylesheet" href="../css/bootstrap.min.css">
									<link rel="stylesheet" href="../css/preview.css" />
								  </head>
								  <body>
											<div align="center"><br>
										  <form id="link_form" class="form-vertical" method='post' action='updateurl.php'>
											<fieldset>
											  <input type="text" class="xlarge holler" name="url" id="id_url" />
											  <?php
								
												echo " <input type='text' hidden value=$bid name='bid' />";
											?>
											  <span class="help-block">Enter a url.</span>
											</fieldset>
											 <br><input type="submit" value="Add"/><br>
											 </form>
											<!-- Placeholder that tells Preview where to put the loading icon-->
											<div class="loading">
											  <img src='../Images/loading-rectangle.gif'>
											</div>
											<!-- Placeholder that tells Preview where to put the selector-->
											<div class="selector"></div>
											<div class="actions">
											 
											</div>
										 
									  <div class="row">
										<div id="feed" class="span10 columns offset3">
											
										</div>
									  </div>
									  </form>
									  <div class="clear"></div>
									</div>
									</div>
									<script>
									  var preview = {
										submit : function(e, data){
										  e.preventDefault();
										  this.display.create(data);
										}
									  }
									  $('.holler').preview({key: 'c31f5208f04511e0b79e4040d3dc5c07', // Sign up for a key: http://embed.ly/pricing
																preview:preview});
									</script>
								  </body>
								
							
							<?php
								//include('linker.php');
								//echo " <input type='text' hidden value=$bid name='bid' /></form>";
							?>
							<?php
							}
							else
							{
								echo "<a href=$url target='_blank'>".$url."</a><br>";
							}
							
							echo "<br><br>Ebook : 
								"; if($ebook!="")
									{
										echo "<a href='../uploads/$ebook'>".$ebook."</a><br><br>";
									
									}
									else
									{
										echo "<form method='post' action='uploadebook.php' enctype='multipart/form-data' >
										Add Ebook:<br><input type='text' hidden value=$bid name='bid' />
										<input type='file' name='ebook' id='ebook' /><br>
										<input type='submit' name='submit' value='Upload' />
										</form>
										<br>";
										
									}
							
					}
					else
					{
						echo "Category : ".$category."<br><br>About : ".$about."
						<br><br>URL : <a href=$url target='_blank'>".$url."</a><br><br>Ebook :<a href='../uploads/$ebook'>".$ebook. 
						" </a> <br><br>";
					
					
					}
					
					echo "Ratings :";
					$x = 0;for($i=0;$i<$ratings;$i++){$temp = $i+1; echo "<a href='changeratings.php?value=$temp&bid=$bid'><img width='20px' height='20px' 
							 src='../Images/star.png'></a>"; $x++;}
							$temp = $x;
							for($y = 4-$x;$y>=0;$y--){ $temp++;echo "<a href='changeratings.php?value=$temp&bid=$bid'><img width='20px' height='20px' 
							src='../Images/star2.png'></a>";}
					
					echo"
					
					</td>
					<td style = 'vertical-align: top;padding:50px 150px 150px 150px;'><center><img width ='150px' height='200px' src='../uploads/$image'><br>
							<br>
						";
						if($uid ==$_SESSION["user"]){
							echo " <form method='post' action='imagebook.php' enctype='multipart/form-data'>
								<label for='image'>Change Pic:<br><br></label>
								<input type='text' hidden value=$bid name='bid' />
								<input type='file' name='image' id='image' />
								<br /><br>
								<input type='submit' name='submit' value='Upload' /></center>
							</form>";
								?>
								<br><h3></h3><br>
							<div id='schedule'>
								<center><a href='schedule.php'><img width ='100px' height='100px' src='../Images/scheduleico.png'></img></a>
								&nbsp;&nbsp;
								<!--<form action='addschedule.php' method='post' name="schedule" style='margin-right:200px;'>
								Start Reading From: <input type='text' name="starttime">
								Time To Change: <input type='text' name="endtime">-->
								<?php echo "<br><br><a href='schedule.php?bid=$bid'><input type='submit' Value='Add' /></center>"; 
								?>
								</form>
							</div><br><br><br><br><br><br>
								<?php
								}
							echo "
							</td>
					</tr></table>";
				
					if($uid==$_SESSION["user"])
					
						{?>	
						<?php 
						}
					echo "<div id='reviews' style='margin-top:-100px;'><h1 style='margin-left:-80px;'>Reviews</h1><br>
						";
						$qry4 = "select * from reviews where bid = $bid order by time desc";
						$res4 = mysql_query($qry4) or die(mysql_error());
						echo "<table><tr><td style='padding-right:150px;'><b>Reviews</b></td><td style='padding-right:150px;'><b>Reviewee</b></td><td style='padding-right:150px;'><b>Time</b></td><td style='padding-right:150px;'><b>Delete</b></td></tr>";
						while($row4 = mysql_fetch_array($res4))
						{
							$nuid = $row4["uid"];
							$qry5 = "select name from users where uid = $nuid";
							$res5 = mysql_query($qry5) or die(mysql_error());
							$row5 = mysql_fetch_array($res5);
							echo "<tr>";
							echo "<td>".$row4["review"]."</td>";
							echo "<td>".$row5["name"]."</td>";
							echo "<td>".$row4["time"]."</td>";
							$rid = $row4["rid"];
							echo "<td><a href='reviewdelete.php?rid=$rid&bid=$bid'><img width='70px' height='70px' src='../Images/images.jpg' ></a></td>";			
							echo "</tr>";
						}
						
						echo"
						<tr style='padding:25px;'>
							<form method='post' action='addreview.php'>
							
							<td colspan=3><textarea rows='5' cols='80'  name='review'></textarea></td>
							<td><input type='text' hidden value=$bid name='bid'><input type='submit' Value='Review'></form></td>
						</tr>
						</table>
					</div><br><br><br>";
					
				
				}
				else
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
