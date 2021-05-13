<?php

    session_start();
	
	include '../../functions/db.php';

	$upIme = $_POST['upIme'];
    $geslo = $_POST['geslo'];

	$upIme = mysqli_real_escape_string($mysqli, $_POST['upIme']);
    $geslo = mysqli_real_escape_string($mysqli, $_POST['geslo']);

    $query = "SELECT * FROM admin WHERE upIme = '$upIme' AND geslo = '$geslo'";
    $result = mysqli_query($mysqli, $query) or die ("Verification error");
    $array = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    if ($array['upIme'] == $upIme){
        $_SESSION['upIme'] = $upIme;
        header("Location: ../pages/home.php");
    }
    else{
    	echo '<script language="javascript">';
        echo 'alert("Napačno uporabniško ime in geslo!")';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url=../index.php" />';
    }

?>
