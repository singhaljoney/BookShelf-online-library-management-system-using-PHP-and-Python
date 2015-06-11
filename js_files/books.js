var xmlHttp;

function bsearch(keywords)
{
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  } 

var url="bsearch.php?keywords="+keywords;

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

function book_delete(bid)
{
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  } 

var url="bookdelete.php?bid="+bid;

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
