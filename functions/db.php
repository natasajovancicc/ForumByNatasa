<?php

	$host = "localhost";
	$user = "root";
	$pwd  = "";
	$db   = "dbforum";

	$mysqli = new mysqli($host,$user,$pwd, $db);

	if ($mysqli -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	  exit();
	}

	if (!$mysqli->set_charset("utf8")) {
		printf("Error loading character set utf8: %s\n", $mysqli->error);
		exit();
	}

?>