<?php
if(!isset($_SESSION))session_start();
include('include/header.php');
?>
<body onLoad = view(); >
<?php
	echo "<div id='main' width='800' style= 'background-color:Yellow; padding:25px;'  height='800' ></div>";
?>
</body>

<?php
include('include/footer.php');
?>