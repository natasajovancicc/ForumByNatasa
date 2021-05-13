<?php

	include "../../functions/db.php";
	
	if(isset($_GET['tema_Id'])){
		$id = $_GET['tema_Id'];
	}
	if(empty($id)){
		header("location:../index.html");
	}

	$run = mysqli_query($mysqli, "DELETE FROM tema WHERE tema_Id = '$id'") or die(mysql_error());  	

	header("Location:../pages/tema.php");
	
?>