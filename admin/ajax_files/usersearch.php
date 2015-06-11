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
				if(isset($_GET["uname"]))
					{
						$uname = $_GET["uname"];
						if($uname=="")
						{
						?>	<center>Search Keywords : <input type='text' name='search' id='search'><br><br>

								<input type='button' onClick=usearch(document.getElementById("search").value); value='Search' >
							<div id='results'></div></center>
							
						<?php
						}
						else
						{
							
							$qry = "select * from users where uname='$uname'";
							$res = mysql_query($qry);
							$row = mysql_fetch_array($res);
							echo "Name :".$row["name"]."<br>";			
						
						
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
	
	
	