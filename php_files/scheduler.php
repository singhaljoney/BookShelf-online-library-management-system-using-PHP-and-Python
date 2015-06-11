<?php
include('../include/conn.php');
	if(!isset($_SESSION["logged"]))
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
	else
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
			$uid = $_SESSION["user"];
			$qry1 = "select bid,name from books where uid = $uid order by bid asc";
			$res1 = mysql_query($qry1);
			echo "<table><tr><td>Book Name</td><td>Start Time</td><td>End Time</td><td>Delete</td></tr>";
			while($row1= mysql_fetch_array($res1))
			{
				$bid = $row1["bid"];
				$qry = "select sid,schtime,endtime,UNIX_TIMESTAMP(schtime),UNIX_TIMESTAMP(endtime) from schedule where bid = $bid";
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
						echo "<tr>";
						echo "<td>".$row1["name"]."</td>";
						echo "<td>".$row["schtime"]."</td>";
						echo "<td>".$row["endtime"]."</td>";
						echo "<td><a href='deletesch.php?sid=$sid'><img width='30px' height='30px' src='../Images/images.jpg'></a></td>";
					}
					else if($today>$starttime && $today<$endtime)
					{
							echo "<img width='30px' height='30px' src = ../Images/alert.jpg> It's Your Time To read ".$row1["name"]."<br>";
					
					}
			
				}
			}
		}
	}