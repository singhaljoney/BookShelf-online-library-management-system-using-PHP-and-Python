<?php
	session_start();
	unset($_SESSION["logged"]);
	unset($_SESSION["uid"]);
	session_destroy();
	
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

?>