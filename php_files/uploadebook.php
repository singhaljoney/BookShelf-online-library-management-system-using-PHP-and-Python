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
				
				  if ($_FILES["ebook"]["error"] > 0)
					{
					echo "Return Code: " . $_FILES["ebook"]["error"] . "<br />";
					}
				  else
					{
					$a = $_FILES["ebook"]["name"] ;
					  $b = explode(".",$a);
					  $cnt = count($b);
					  //echo $b[$cnt-2]."<br>".$cnt."<br>";
					  //echo time();
					  $b[$cnt-2] = $b[$cnt-2].time();
					  $imgpath = $b[$cnt-2].".".$b[$cnt-1];
					if (file_exists("../uploads/" .$imgpath))
					  {
					  //echo $b[$cnt-2];
					  echo $_FILES["ebook"]["name"] . " already exists. ";
					  }
					else
					  {
					  
					  move_uploaded_file($_FILES["ebook"]["tmp_name"],
					  "../uploads/".$imgpath);
					  echo "Stored in: " . "../uploads/".$imgpath;
					  
					  $image = $_FILES["ebook"]["name"];
					  $uid = $_SESSION["user"];
					  $bid = $_POST["bid"];
					  $qry =  "update books set ebook = '$imgpath' where bid = $bid";
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
	
	<?php}
?>  
	  