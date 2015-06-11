<?php
if(!isset($_SESSION))session_start();
?>
<head>
    <script src="datetimepicker_css.js"></script>
</head>
<?php
include('../include/conn.php');
	if(isset($_SESSION["logged"]))
	{
		if($_SESSION["logged"]=="user")
		{
				include('../include/conn.php');
				include('bhead.php');
				echo "<div align='center'><h1>Schedule</h1><br><br>";
				if(isset($_GET["bid"]))
				{
					$bid = $_GET["bid"];
					/*echo "<form method='post' action='addschedule.php'>
						<input type='text' hidden name='bid' value='$bid'>
						Start Time:- Year<input type='text' name='sty'>
						Month<input type='text' name='stm'>
						Date<input type='text' name='std'>
						Hour<input type='text' name='sth'>						
						Minute<input type='text' name='sti'>
						Seconds<input type='text' name='sts'><br><br>
						End Time: - Year<input type='text' name='ety'>
						Month<input type='text' name='etm'>
						Date<input type='text' name='etd'>
						Hour<input type='text' name='eth'>						
						Minute<input type='text' name='eti'>
						Seconds<input type='text' name='ets'>
						<br><br>
						<input type='submit' value='Add' />
						</form>
					";*/
					$qry = "select * from books where bid = $bid";
					$res = mysql_query($qry) or die(mysql_error());
					$row = mysql_fetch_array($res);
					$name = $row["name"];
					$image = $row["image"];
					echo "<table><tr><td><center><img src='../uploads/$image' width='100px' height='120px'><br>$name</center></td>";
					echo "<td style='padding:20px;'><center><form method='post' action='addschedule.php'><input type='text' hidden name='bid' value='$bid'>";
					include('datepicker.php');
					echo "<input type='Submit' value='Add'></form></center></td>";
					echo "</tr></table>";
					
				}
					
			$uid = $_SESSION["user"];
			$qry1 = "select bid,name from books where uid = $uid order by bid asc";
			$res1 = mysql_query($qry1);
			echo "<br><table><tr><td><b><center>Book Name</center></b></td><td><b><center>Start Time</center></b></td><td><b><center>End Time</center></b></td><td><b><center>Delete</center></b></td></tr>";
			while($row1= mysql_fetch_array($res1))
			{
				$bid = $row1["bid"];
				$qry = "select sid,schtime,endtime,UNIX_TIMESTAMP(schtime),UNIX_TIMESTAMP(endtime) from schedule where bid = $bid ORDER BY schtime ASC";
				$res = mysql_query($qry);
				while($row=mysql_fetch_array($res))
				{
					date_default_timezone_set ("Asia/Calcutta"); 
					$today = date("Y-m-d H:i:s");
					$today = strtotime($today)."<br>";
					$starttime =  $row["UNIX_TIMESTAMP(schtime)"];
					$endtime =  $row["UNIX_TIMESTAMP(endtime)"];
					//echo $today." ".$starttime." ".$endtime."<br>";
					if($starttime>$today)
					{
						$sid = $row["sid"];
						$bid = $row1["bid"];
						echo "<tr>";
						echo "<td style='padding:10px;'><a href='books.php?bid=$bid'>".$row1["name"]."</a></td>";
						echo "<td style='padding:10px;'>".$row["schtime"]."</td>";
						echo "<td style='padding:10px;'>".$row["endtime"]."</td>";
						echo "<td style='padding:10px;'><a href='deletesch.php?sid=$sid'><img width='30px' height='30px' src='../Images/images.jpg'></a></td>";
					}
					else if($today>$starttime && $today<$endtime)
					{
							$sid = $row["sid"];
							echo "<hr><br><a href='books.php?bid=$bid'><img width='30px' height='30px' src = ../Images/alert.png></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='deletesch.php?sid=$sid'><img width='30px' height='30px' src='../Images/images.jpg'></a><h3> It's Your Time To read <a href='books.php?bid=$bid'>".$row1["name"]."</a></h3><br><hr/><br>";
					
					}
			
				}
			}
				echo "</div>";
					
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