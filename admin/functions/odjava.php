<?php

session_start();

if(isset($_SESSION['upIme'])){
	session_destroy();
	header("Location: ../index.html");
}

?>