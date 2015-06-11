<?php
session_start();
?>

<script type="text/javascript">
function check()
{
var name = document.getElementById('use').value;
var place = document.getElementById('minprice').value;
var pas = document.getElementById('location').value;
var conpass = document.getElementById('exptime').value;
var itemcond = document.getElementById('cat').value;
if(name =="")
{
alert("Name Mandatory");
return false;
}
 else  if(pas=="")
{alert("Details Mandatory !");return false;}
else  if(conpass=="")
{alert("Write Detail!");return false;}
else  if(conno=="")
{alert("Insert Number!");return false;}
else  if(itemcond=="")
{alert("Insert Category!");return false;}
else  if(place=="")
{alert("Author Mandatory !");return false;}

}

</script>
</head>
			
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
				include('bhead.php');
	?>
			<body class='register'>

			<div align="center" style="margin-left:-20px;" id="page">
			<table>
			<tr>
			<td  width="25%"><img src="Images/left_c.png" /></td>
			<td  width="50%">
			<CENTER>
			<TABLE ALIGN=CENTER BORDER=0 WIDTH=70%>
			<br />
			<tr>
			<font size="+2"><b><u>Add Books</u></b><br><br></font></tr>
			<br /> <br />
			<FORM onsubmit="return check();" METHOD="POST" ACTION="addbook.php" name="frm" id="frm">
			<tr><TD align="right">Name&nbsp;:&nbsp;</td><TD align="left"><INPUT TYPE="TEXT" NAME="name" MAXLENGTH="" SIZE="" id="use"></td></tr>
			<tr><TD align="right">Author&nbsp;:&nbsp;</td><TD align="left"><INPUT  TYPE="TEXT" NAME="author" id="minprice" MAXLENGTH="" SIZE=""></td></tr>
			<tr><TD align="right">Publisher&nbsp;:&nbsp;</td><TD align="left"><INPUT NAME="publisher" MAXLENGTH="" SIZE="" id="location"></td></tr>
			<tr><TD align="right">About&nbsp;:&nbsp;</td> <TD align="left"><INPUT TYPE="TEXT" NAME="about" id="exptime"></td></tr>
			<tr><TD align="right">Price&nbsp;:&nbsp;</td> <TD align="left"><INPUT TYPE="TEXT" NAME="price"  id="item"></td></tr>
			<tr><TD align="right">URL&nbsp;:&nbsp;</td> <TD align="left"><INPUT TYPE="TEXT" NAME="url"  id="no"></td></tr>
			<tr><TD align="right">Category &nbsp;:&nbsp;</td> <TD align="left"><INPUT TYPE="TEXT" NAME="category"  id="cat"></td></tr>
			</TABLE>
			<BR>
			<BR/>
			<br/>
			<TABLE ALIGN=CENTER BORDER=0 WIDTH=45%>
			<tr>
			<td><center>
			<INPUT TYPE="submit" id="sub" name="sub" value="SUBMIT"> 
			<INPUT TYPE="RESET" id="reset" name="reset" VALUE="RESET"></center></td>
			</tr>
			</TABLE>
			</FORM>
			</center>
			</td>
			<td width="25%"><img src="Images/right_c.png" /></td>
			</tr>
			</table>
	<?php
			echo "<div align='center'>";
			if(isset($_SESSION["error"]))
			{
			$a = $_SESSION["error"];
			if($a==1)
			{
			echo "<h2>Insert User Name</h2>";
			}
			if($a==2)
			{
			echo "<h2>Insert Password</h2>";
			}
			if($a==3)
			{
			echo "<h2>Confirm Password Cant be Empty</h2>";
			}
			if($a==4)
			{
			echo "<h2>Password And Confirm Password Must Match</h2>";
			}
			if($a==5)
			{
			echo "<h2>Insert age</h2>";
			}
			if($a==6)
			{
			echo "<h2>Insert Place</h2>";
			}
			if($a==7)
			{
			echo "<h2>Insert email</h2>";
			}
			if($a==8)
			{
			echo "<h2>Insert Nationality</h2>";
			}
			if($a==9)
			{
			echo "<h2>Insert school name</h2>";
			}
			if($a==10)
			{
			echo "<h2>Insert college name</h2>";
			}
			if($a==11)
			{
			echo "<h2>User Email Id Is Already Registered</h2>";
			}
			echo "</div>";
			unset($_SESSION["error"]);
			}
	?>
			</CENTER>
			</div>
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