<?php

	$username = "root";
	$password = "";
	$server = 'localhost';
	$db = "job_registration";

	$connect = mysqli_connect($server,$username,$password,$db);
    if ($connect) {
    	// echo 'connection successful';
    } 
?>
	<script>
		alert("connection successful")
	</script>
<?
    else {
    	echo "connection failed";
    }
    


?>