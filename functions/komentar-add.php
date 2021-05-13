<?php

	include "db.php";
	
	$komentar = mysqli_real_escape_string($mysqli, $_POST['komentar']);
	$uporabnikid = $_POST['uporabnikid'];
	$temaid = $_POST['temaid'];
	date_default_timezone_set("Europe/Ljubljana");
	$datetime=date("Y-m-d h:i:sa");


	$komentar = mysqli_query($mysqli, "INSERT INTO komentar (komentar,tema_Id,uporabnik_Id,datetime) VALUES ('$komentar','$temaid','$uporabnikid','$datetime') ");
	$sql = mysqli_query($mysqli, "SELECT * FROM komentar AS c JOIN uporabnik AS u on c.uporabnik_Id=u.uporabnik_Id where tema_Id='$temaid' and c.uporabnik_Id='$uporabnikid' and c.datetime='$datetime'");

	while($row=mysqli_fetch_assoc($sql)){
		echo $row['ime']." ".$row['priimek'];
		echo '<label class="pull-right">'.$row['datetime'].'</label>';
		echo "<p class='bg-secondary text-white' style= 'padding:20px'>".$row['komentar']."</p>";
	}

?>


 
