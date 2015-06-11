<?php
if(!isset($_SESSION))session_start();
$con = mysql_connect("localhost","root","");
mysql_select_db("bookshelf", $con);
?>