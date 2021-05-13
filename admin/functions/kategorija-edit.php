<?php
	include "../../functions/db.php";
	
	$kategorija = $_POST['kategorija'];
	$kategorija_id = $_POST['kategorija_id'];
	
	  
    $update = mysqli_query($mysqli, "UPDATE kategorija set kategorija='$kategorija' where kategorija_id='$kategorija_id' ");
	  
    header("Location:../pages/kategorija.php");

?>
	
