<?php
include('../include/conn.php');
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
		if(isset($_POST["name"]))
		{
				$uid = $_SESSION["user"];
				$name = mysql_escape_string($_POST["name"]);
				$author =  mysql_escape_string($_POST["author"]);
				$publisher =  mysql_escape_string($_POST["publisher"]);
				$category = mysql_escape_string($_POST["category"]);
				$about = mysql_escape_string($_POST["about"]);
				$price = mysql_escape_string($_POST["price"]);
				$url = mysql_escape_string($_POST["url"]);
				if($name && $author && $publisher && $category && $about)
				{
						$qry2 = "Insert into books(uid,name,author,publisher,category,about,price,url) values ($uid,'$name','$author','$publisher','$category','$about',$price,'$url')";
						$res2 = mysql_query($qry2) or die(mysql_error());
						$res = mysql_query($qry);
						$row = mysql_fetch_array($res);
						$qry3 = "select max(bid) as mbid from books";
						$res3 = mysql_query($qry3) or die(mysql_error());
						$row3 = mysql_fetch_array($res3);
						$bid = $row3["mbid"];
										?>
						<script type="text/javascript">
						<!--
						function Redirect(url) {
							window.location= url;
						}
						setTimeout('Redirect("books.php?bid=$bid")', 100);
						//-->
						</script>
	
	<?php
				}
				else
				{
					echo "Please Fill All Entries";
				}
		
		}
		else
		{
			echo "Don't try To Be OverSmart";
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