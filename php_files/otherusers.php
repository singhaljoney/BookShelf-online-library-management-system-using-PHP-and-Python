<?php
session_start();
?>	
<script type="text/javascript" src="../js_files/users.js"></script>
<!-- Slider -->
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script><!-- jQuery -->
<script type="text/javascript" src="js/jquery.blockUI.js"></script><!-- slider -->
<script type="text/javascript" src="js/jquery.tiler.js"></script><!-- slider -->
<script type="text/javascript" src="js/jcarousel.js"></script><!-- slider -->
<!-- End-->
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
				echo "<div align='center'><h1>Search Users</h1><br>";
		?>		
				<!-- Slider -->
				<div class="staff_picks round_right">
				<div class="slimslider">
				<div class="caption">
				<img src="images/staff_picks.png" alt="">
				</div>
				<div class="jqcarousel">
				<ul id="car1">
				<li><img onClick=usearch("geek"); title="Geek Buddy" src="thumbs/users/geek.jpg" width ='210px' height='158px' alt="newcastle brown" /></li><li>
				<img onClick=usearch("music"); width ='210px' title="Music Fanatics" height='158px' src="thumbs/users/music.jpg" alt="chrome bags store" /></li><li>
				<img onClick=usearch("love"); title="Love Birds" width ='210px' height='158px' src="thumbs/users/love.jpg" alt="Andy Patrick Design" /></li><li>
				<img onClick=usearch("fun"); title="Happy Go Lucky" width ='210px' height='158px'  src="thumbs/users/fun.jpg" alt="beo play" /></li><li>
				<img onClick=usearch("joker"); title="Joker Psyco" width ='210px' height='158px'  src="thumbs/users/joker.jpg" alt="Problem Bob" /></a></li>
				</ul>
				</div>
				<div class="larrow" id="car1-prev">
				<img src="images/index_prev_left.png" alt="">
				</div>
				<div class="rarrow" id="car1-next">
				<img src="images/index_prev_right.png" alt="">
				</div>
				<div class="clr"></div>
				</div>	</div>
				<!-- End -->
				
				<center>Search Keywords : <input type='text' name='search' id='search'><br><br><img  onClick=usearch(document.getElementById("search").value); src="../Images/search2.png" width='100px' height='100px'></img>
				<br>
								
							<div id='results'></div></center><br><br>
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