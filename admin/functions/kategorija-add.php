<?php

	include "../../functions/db.php";
					
	extract($_POST);
	$sql = "INSERT INTO `kategorija`(kategorija) VALUES ('$kategorija')";
	$res = mysqli_query($mysqli, $sql);

	header("Location:../pages/kategorija.php");
	
?>