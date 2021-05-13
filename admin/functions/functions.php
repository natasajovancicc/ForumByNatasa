<?php


function dbcon(){
	$host = "localhost";
	$user = "root";
	$pwd = "";
	$db = "dbforum";

	$mysqli = new mysqli($host, $user, $pwd, $db);

	// Check connection
	if ($mysqli -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	  exit();
	}
}

function dbclose(){
	$host = "localhost";
	$user = "root";
	$pwd = "";
	$db = "dbforum";

	$mysqli = new mysqli($host, $user, $pwd, $db);

	if ($mysqli -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	  exit();
	}
	
	$mysqli -> close();	
}

function deleteuser($user_Id){
	dbcon();
	$sel = mysqli_query($mysqli, "DELETE from uporabnik where user_Id='$uporabnik_Id' ");

	if($sel==true){
		$del = mysqli_query($mysqli, "DELETE from racun where user_Id='$uporabnik_Id' ");
		echo "success";	
	}
	else{
		echo "failed";
	}

	dbclose();
}

function category(){
	dbcon();
	$sel = mysqli_query($mysqli, "SELECT * from kategorija");

	if($sel==true){
		while($row=mysqli_fetch_assoc($sel)){
			extract($row);
			echo '<option value='.$kategorija_id.'>'.$kategorija.'</option>';
		}
	}

	dbclose();
}

?>