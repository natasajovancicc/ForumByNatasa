<?php

	include "../../functions/db.php";
	
	$komentar_Id = $_POST['id'];
	
	
	
	if(mysqli_query($mysqli, "DELETE FROM `komentar` WHERE `komentar_Id` = '$komentar_Id' ") or die(mysqli_error())){
		echo 'success'; 
	}else {
		echo 'error'; 
	}

?>





