 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
function check()
{
var name = document.getElementById('name').value;
var mname = document.getElementById('motto').value;
var usernam = document.getElementById('uname').value;
var pas = document.getElementById('pass').value;
var email = document.getElementById('email').value;
 i=email.indexOf("@");
 j=email.indexOf(".",i);
 k=email.indexOf(",");
 kk=email.indexOf(" ");
 jj=email.lastIndexOf(".")+1;
 len=email.length;
  if(usernam=="")
{alert("Username Mandatory");return false;}
else  if(pas=="")
{alert("Password Mandatory !");return false;}
else  if(name=="")
{alert("Name Mandatory");return false;}
else  if(email=="")
{alert("Email Mandatory !");return false;}
else  if(mname=="")
{alert("Motto Mandatory !");return false;}

else if ((i<0) || (j<(1+1)) || (k!=-1) || (kk!=-1) || (len-jj <2) || (len-jj>3))
{
 alert("Not A Valid Email");
 return false;
}
}

</script>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Registration</title>
 <style type="text/css">
        .style2
        {
            font-family: "Adobe Caslon Pro";
            font-weight: bold;
            font-size: 48pt;
            color: #0033CC;
        }
    </style>
	</head>
	<body>
	<?php
	include('bhead1.php');
	?>
	<div align="center">
    <div>
    
      <img ID="Image1" src="../Images/Register copy.png" Height="621px" Width="885px" />
		<form method="post" action="submit.php" onsubmit="return check();">
	   <div id="frm" style="margin-top:-435px;margin-left:-450px;">
		<input ID="name" type="text" name="name" BackColor="#CCCCCC" onfocus="if(this.value=='Enter ur name'){this.value='';}" value="Enter ur name"/>
        <br /><br/>
		<input ID="email" type="text" name="email" BackColor="#CCCCCC" onfocus="if(this.value=='Enter ur Email'){this.value='';}" value="Enter ur Email"/>
        <br /><br/>
		<input ID="pass" type="password" name="pass" BackColor="#CCCCCC" onfocus="if(this.value=='Enter ur Pass'){this.value='';}" value="Enter ur Pass"/> 
        <br /><br/>
		<input ID="uname" type="uname" name="uname" BackColor="#CCCCCC" onfocus="if(this.value=='Enter ur Username'){this.value='';}" value="Enter ur Username"/> 
        <br /><br/>
		<input ID="motto" type="uname" name="motto" BackColor="#CCCCCC" onfocus="if(this.value=='Enter ur Motto'){this.value='';}" value="Enter ur Motto"/> 
        </div>
        <div style="margin-top:135px;margin-left:200px;">
		<input ID="Button1" type="submit" name="submit" Width="126px" value="SUBMIT"/></div>
		<div style="margin-top:-50px;margin-left:662px;">
		<a href="../index.php" ><img src="../Images/bh.jpg" title="Home"/></a></div>
		 </form>
		
	</div>
   
    </div>
	 <?php
			if(isset($_SESSION["error"]))
			{
			if($_SESSION["error"]=="username")
			echo "<center>Username/Email Already Registered</center>";
			else if($_SESSION["error"]=="entry")
			echo "<center>Please Fill All Entries</center>";
			unset($_SESSION["error"]);
			}
			
		 ?>
		 <div style="margin-top:85px;" class="footer">
</div>
	</body>
	</html>