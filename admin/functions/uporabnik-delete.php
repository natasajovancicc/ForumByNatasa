<?php

	include "../../functions/db.php";
	
	$uporabnik_Id = $_POST['id'];
	
	if(mysqli_query($mysqli, "DELETE FROM `uporabnik` WHERE `uporabnik_Id` = '$uporabnik_Id' ") or die(mysqli_error())){
		echo 'success'; 
	}else {
		echo 'error'; 
	}

?>





