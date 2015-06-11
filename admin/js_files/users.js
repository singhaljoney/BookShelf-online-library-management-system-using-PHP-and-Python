var xmlHttp;

function user_search(username)
{

xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  } 

var url="ajax_files/usersearch.php?uname="+username;

xmlHttp.onreadystatechange=function()
  {
     
	 if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
     { 
		
		var theresponse = xmlHttp.responseText ;

	 document.getElementById("main").innerHTML=theresponse;
	 }
  }     
xmlHttp.open("GET",url,true);
xmlHttp.send(null);

}

function usearch(keywords)
{

xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  } 

var url="ajax_files/usearch.php?keywords="+keywords;

xmlHttp.onreadystatechange=function()
  {
     
	 if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
     { 
		
		var theresponse = xmlHttp.responseText ;

	 document.getElementById("results").innerHTML=theresponse;
	 }
  }     
xmlHttp.open("GET",url,true);
xmlHttp.send(null);

}


function user_delete(uid)
{

xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  } 

var url="ajax_files/userdel.php?uid="+uid;

xmlHttp.onreadystatechange=function()
  {
     
	 if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
     { 
		
		var theresponse = xmlHttp.responseText ;

	 document.getElementById("main").innerHTML=theresponse;
	 }
  }     
xmlHttp.open("GET",url,true);
xmlHttp.send(null);

}
function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 
 }
catch (e)
 {
 // Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}
