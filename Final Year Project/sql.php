<?php

	// Connect to the db
	function ConnectDB(){
		
	$mysqli = new mysqli("localhost", "root", "", "project") or die("Cannot connect to database server! Please check the connection.");
	return $mysqli;
	
	}

?>
