<?php
session_start();
?>	
<script type="text/javascript" src="../js_files/mailbox.js"></script>
<body onLoad=inbox();>
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
				echo "<div align='center'><h1>MAIL BOX</h1><br>";
				echo "<input style='padding:20px;' class='mail' onClick =inbox(); type='button' value='INBOX'>
				<input style='padding:20px;' class='mail' onClick=sentmails(); type='button' value='SENT'>"	;	
				echo "<div style='padding:50px' id='mailbox'></div>";
				
				
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
</body>