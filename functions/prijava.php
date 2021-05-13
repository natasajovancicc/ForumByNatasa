<?php 

    session_start();
    
    include 'db.php';

    $upIme = $_POST['upIme'];
    $geslo = $_POST['geslo'];
    $pwd = md5($geslo);

    $upIme = mysqli_real_escape_string($mysqli, $_POST['upIme']);
    $geslo = mysqli_real_escape_string($mysqli, $_POST['geslo']);

    $query = "SELECT * FROM racun WHERE upIme = '$upIme' AND geslo = '$pwd'";
    $result = mysqli_query($mysqli, $query) or die ("Verification error");
    $array = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    if ($array['upIme'] == $upIme){
        $_SESSION['upIme'] = $upIme;
        $_SESSION['ime'] = $array['ime'];
        $_SESSION['priimek'] = $array['priimek'];
        $_SESSION['uporabnik_Id'] = $array['uporabnik_Id'];
        header("Location: ../pages/home.php");
    }
    
    else{
        echo '<script language="javascript">';
        echo 'alert("Napačno uporabniško ime ali geslo!")';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url=../index.php" />';
    }
   
?>