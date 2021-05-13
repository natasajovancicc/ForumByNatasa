<?php
	include "db.php";

	extract($_POST);

	$ime = str_replace("'","`",$ime); 
	$ime = mysqli_real_escape_string($mysqli, $ime);

	$priimek = str_replace("'","`",$priimek); 
	$priimek = mysqli_real_escape_string($mysqli, $priimek); 
			
	$upIme = str_replace("'","`",$upIme); 
	$upIme = mysqli_real_escape_string($mysqli, $upIme); 

	$geslo = str_replace("'","`",$geslo); 
	$geslo = mysqli_real_escape_string($mysqli, $geslo);
	$geslo = md5($geslo);

	$sql = "INSERT INTO `uporabnik`(`ime`, `priimek`) VALUES ('$ime','$priimek')";
	$result = mysqli_query($mysqli, $sql);

	if($result)
	{
		$a  = mysqli_query($mysqli, "SELECT * FROM `uporabnik` WHERE `ime` = '$ime' AND `priimek` = '$priimek'");
		$aa = mysqli_fetch_array($a);
		
		if($a)
		{
			$uporabnik_Id = $aa['uporabnik_Id'];
			$sql = "INSERT INTO `racun`(`upIme`, `geslo`, `uporabnik_Id`) VALUES('$upIme','$geslo',$uporabnik_Id)";
			$res = mysqli_query($mysqli, $sql);
			
			if($res==true)
			{
				echo '<script language="javascript">';
				echo 'alert("Registracija uspešna")';
				echo '</script>';
				echo '<meta http-equiv="refresh" content="0;url=../index.html" />';
			}
		}	
	}

?>