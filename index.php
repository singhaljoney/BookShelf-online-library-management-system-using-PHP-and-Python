<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if(!isset($_SESSION))session_start();
?>
<?php
	if(isset($_SESSION["logged"]))
				{
					if($_SESSION["logged"]=="user")
					include('bhead.php');
					else
					include('bhead1.php');
				}
	else		
				{
					include('bhead1.php');
				
				}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<LINK REL="SHORTCUT ICON" HREF="Images/ico.png" />
<script type="text/javascript">
function check1()
{
var uname = document.getElementById('name').value;
var pass = document.getElementById('pass').value;;
  
if (uname=="")
{
 alert("Not A Valid Name");
}
else if(pass=="")
{alert("Password Mandatory");return false;}

}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>MyShelf</title>
<style type="text/css">

#fk-mainfooter-id.fksk-mainfooter {
color: #FED20B;
border-top: 3px solid #FED20B;
border-top-width: 3px;
border-top-style: solid;
border-top-color: #FED20B;
background: none repeat scroll 0 0 #215676;
background-image: none;
background-repeat-x: repeat;
background-repeat-y: repeat;
background-attachment: scroll;
background-position-x: 0px;
background-position-y: 0px;
background-origin: initial;
background-clip: initial;
background-color: #215676;
}

#fk-mainfooter-id {
    float: left;
    text-align: left;
    width: 100%;
}
.main
{
padding-top:-20px;
width: 1300px;
}
.container
{
width: 1300px;
}
.left
{
width: 400px;
}
.middle
{
width: 751px;
}
.right
{
width: 149px;
padding-left:40px;
}
        .style16
        {
            font-family: Andalus;
            font-size: xx-large;
            color: #008080;
        }

        .style20
        {
            font-family: "Times New Roman", Times, serif;
            font-style: italic;
            font-size: x-large;
            color: #133670;
        }
        .style21
        {
            font-size: x-large;
        }
        .style16
        {
            font-family: Andalus;
            font-size: xx-large;
            color: #008080;
        }
        .style18
        {
            font-size: xx-large;
            color: #008080;
        }

    </style>
</head>
<body>
<?php
			if(isset($_SESSION["logged"]))
				{
		?>				
			<table 
            class="style1">
            <tr>
			<?php
				if($_SESSION["logged"]=="user")
				{
			?>
			<td width='1500px'><center><a href='main.php'><img src="Images/yt-play.png"></a>
				<br><br><a href='php_files/logout.php'><img src="Images/logout.png"></a>
			</center></td>
			<?php
				}
			else if($_SESSION["logged"]=="admin")
				{
			?>
					<td width='1500px'><center><a href='admin\'><img src="Images/yt-play.png"></a>
			<br><br><a href='php_files/logout.php'><img src="Images/logout.png"></a></center></td></tr></table>
			
			
		<?php
				}
			}
			else
				{
		?>
<div class="main">
<div class="container">
<table width="100%">
<tr>
<td style="padding-bottom:50px;" class="left">
	<table  class="style1">
<tr style='padding-top:20px;'>
<td style="padding-top:20px;padding-bottom:20px;" width='1500px'><center><span class="style16">&nbsp;&nbsp; An Online Book Manager</span> </center></td>
</tr>
<form onsubmit='return check1();' method="post" action="php_files/login.php" >
<tr>
        <td style="padding-bottom:20px;" width='1500px'>
        <center><span class="style20">User Name</span><br/><br />
        <input id="name" type="text" name="name" onfocus="if(this.value=='Username'){this.value='';}" value="Username"/> <br/>
        </center>
		</td>
</tr>	
<tr>
        <td style="padding-bottom:10px;" width='1500px'>
        <center><span class="style20">Password</span>   <br /><br />
        <input id="pass" type="password" name="pass" onfocus="if(this.value=='password'){this.value='';}" value="password"/><br/> 
        </center>
		</td>
</tr>
<tr>
        <td width='1500px'>
        <center><input type="submit" name="submit" Width="126px" value="Login"/> <br/></center>
		</td>
</tr>
</form>
<tr>
        <td width='1500px'>
		<center>
<br /><a style="font-style: italic;" href="mailto:singhaljoney@gmail.com?Subject=Hello%20again" ID="HyperLink1" title=""><b>Forgot Password !!!</b></a>
        <br />
        <br />
        <a style="font-style: italic;" href="php_files/reg.php" ID="HyperLink2" title=""><b>New User!! Sign Up!!</b></a>
		</center>
		</td>
		</tr>
	</table>
</td>
				<?php
					if(isset($_SESSION["error"]))
					{
						if($_SESSION["error"]=="login")echo "<br><center>Wrong Username/Password</center>";
						else if($_SESSION["error"]=="entry")echo "<br><center>Fill All Fields</center>";
						unset($_SESSION["error"]);
					
					}
				?>
                </td>
				
			<?php
			
			}
			
			
			?>
<td class="middle">
<img src="Images/middle.png" Height="545px" Width="751px" />
</td>
<td class="right">
   <br/><br/>   <br/><br/>
									<a href="php_files/searchbooks.php" title="Search"><img ID="Image3"  Height="103px" src="Images/Search1.png" Width="101px" /></a>		
                                <br/><br/>
                       
							<a href="php_files/otherusers.php" title="Reviews"><img ID="Image4"  Height="103px" 
                                    src="Images/reviews.jpg" Width="101px" /></a>
                       <br/><br/>
							<a href="php_files/schedule.php" title="Click Here"><img ID="Image5"  Height="103px" 
                                    src="Images/time.jpg" Width="101px" /></a>
                  
</td>
</tr>
</table>
</div>
<?php
			if(isset($_SESSION["logged"]))
				{
		?>
<?php
if($_SESSION["logged"]=="user")
				{
			?>

<div width="100%" class="footer">
</div>
<?php
}
else
{
echo "<hr/>";
}
}
else
{
echo "<hr/>";
}
?>
</div>
</body>
</html>
