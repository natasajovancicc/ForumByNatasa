<?php
	include "../../functions/db.php";
	
	
	$kategorija = $_POST['kategorija'];
	$id = $_POST['id'];
	$naslov = $_POST['naslov'];
	$vsebina = $_POST['vsebina'];	
	
	  
    $update = mysqli_query($mysqli, "UPDATE `tema` SET `naslov`='$naslov',`vsebina`='$vsebina',`kategorija_id`='$kategorija' WHERE `tema_Id`='$id' ");
	  
    header("Location:../pages/tema.php");

?>