<?php
if(!isset($_SESSION))session_start();
?>
<?php
	if(isset($_SESSION["logged"]))
	{
		if($_SESSION["logged"]!="user")
		{
				include('../php_files/conn.php');
				include('bhead.php');
				if(isset($_GET["value"]) && isset($_GET["bid"]))
				{
					$val = $_GET["value"];
					$bid = $_GET["bid"];
					if($val>5) $val=1;
					
					$qry = "select tcount,tclick from books where bid = $bid";
					$res = mysql_query($qry) or die(mysql_error());
					$row = mysql_fetch_array($res);
					
					$newrat = ($row["tcount"] + $val)/($row["tclick"] + 1);
					//echo $newrat."<br>";
					$tcount = $row["tcount"] + $val;
					//echo $tcount."<br>";
					$tclick = ($row["tclick"] + 1);
					//echo $tclick."<br>";
					$qry = "update books set ratings = '$newrat',tcount = '$tcount',tclick = '$tclick' where bid =$bid";
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