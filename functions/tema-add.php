<?php

	include "db.php";
		
	date_default_timezone_set("Europe/Ljubljana");
	$datetime=date("Y-m-d h:i:sa");
						
	extract($_POST);
	$sql = "INSERT INTO tema(naslov,vsebina,kategorija_id,datetime,uporabnik_Id) VALUES ('$naslov','$vsebina','$kategorija','$datetime','$uporabnikid')";
	$res = mysqli_query($mysqli, $sql);

	if($res==true) {
		echo '<script language="javascript">';
		echo 'alert("Vnos je uspel!")';
		echo '</script>';
		echo '<meta http-equiv="refresh" content="0;url=../pages/home.php" />';
	}
	
?>