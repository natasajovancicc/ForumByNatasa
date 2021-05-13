<?php

	include "../../functions/db.php";
	
	if(isset($_GET['kategorija_id'])){
		$id = $_GET['kategorija_id'];
	}
	
	if(empty($id)){
		header("location:../index.php");
	}

	$run = mysqli_query($mysqli, "DELETE FROM kategorija WHERE kategorija_id = '$id'") or die(mysqli_error());  	

	header("Location:../pages/kategorija.php");
	
?>