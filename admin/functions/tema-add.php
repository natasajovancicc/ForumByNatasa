<?php
	include "../../functions/db.php";

	date_default_timezone_set("Europe/Ljubljana");
	$datetime=date("Y-m-d h:i:sa");


	extract($_POST);

	$sql = "INSERT INTO tema(naslov, vsebina, kategorija_Id, datetime , uporabnik_Id) VALUES ('$naslov','$vsebina','$kategorija','$datetime', 0)";
	$res = mysqli_query($mysqli, $sql);


	header("Location:../pages/tema.php");

?>