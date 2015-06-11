<?php
if(!isset($_SESSION))session_start();
?>
<?php
include('../include/conn.php');
	if(isset($_SESSION["logged"]))
	{
		if($_SESSION["logged"]=="user")
		{
				include('../include/conn.php');
				include('bhead.php');
				if(isset($_POST["bid"]))
				{
					if($_POST["bid"] && $_POST["demo1"] && $_POST["demo2"])
					{
					$startdate = $_POST["demo1"];
					$enddate = $_POST["demo2"];
					$bid = $_POST["bid"];
					$qry = "insert into schedule(bid,schtime,endtime) values($bid,'$startdate','$enddate')";
					$res = mysql_query($qry) or die(mysql_error());
										?>
						<script type="text/javascript">
						<!--
						function Redirect(url) {
							window.location= url;
						}
						setTimeout('Redirect("<?php echo $_SERVER['HTTP_REFERER']; ?>")', 100);
						//-->
						</script>
	
	<?php
					}
					else
					{
						echo "<center><h1>FILL ALL ENTRIES</h1></center>";
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