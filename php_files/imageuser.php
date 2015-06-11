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
				if ((($_FILES["image"]["type"] == "image/gif")
				|| ($_FILES["image"]["type"] == "image/jpeg")|| ($_FILES["image"]["type"] == "image/jpg")|| ($_FILES["image"]["type"] == "image/png")
				|| ($_FILES["image"]["type"] == "image/pjpeg"))
				&& ($_FILES["image"]["size"] < 2000000))
				  {
				  if ($_FILES["image"]["error"] > 0)
					{
					echo "Return Code: " . $_FILES["image"]["error"] . "<br />";
					}
				  else
					{
					echo "Upload: " . $_FILES["image"]["name"] . "<br />";
					echo "Type: " . $_FILES["image"]["type"] . "<br />";
					echo "Size: " . ($_FILES["image"]["size"] / 1024) . " Kb<br />";
					echo "Temp file: " . $_FILES["image"]["tmp_name"] . "<br />";
					$a = $_FILES["image"]["name"] ;
					  $b = explode(".",$a);
					  $cnt = count($b);
					  //echo $b[$cnt-2]."<br>".$cnt."<br>";
					  //echo time();
					  $b[$cnt-2] = $b[$cnt-2].time();
					  $imgpath = $b[$cnt-2].".".$b[$cnt-1];
					if (file_exists("../uploads/" .$imgpath))
					  {
					  //echo $b[$cnt-2];
					  echo $_FILES["image"]["name"] . " already exists. ";
					  }
					else
					  {
					  
					  move_uploaded_file($_FILES["image"]["tmp_name"],
					  "../uploads/".$imgpath);
					  echo "Stored in: " . "../uploads/".$imgpath;
					  
					  $image = $_FILES["image"]["name"];
					  $uid = $_SESSION["user"];
					  $qry =  "update users set image = '$imgpath' where uid = $uid";
					  $res = mysql_query($qry) or die(mysql_error());
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
	  