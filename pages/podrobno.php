<?php
	session_start();
	if (isset($_SESSION['upIme'])&&$_SESSION['upIme']!=""){
	}
	else{
		header("Location:../index.html");
	}
	
	$upIme = $_SESSION['upIme'];
	$uporabnikid = $_SESSION['uporabnik_Id'];
?>
<html>
<head>
	<title>Forum by Nataša</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<style>
		.navbar-nav {flex-direction: row;}
		.nav-link {padding-right: .5rem !important; padding-left: .5rem !important;}
		.ml-auto .dropdown-menu { left: auto !important; right: 0px;}
	</style>
</head>
<body>
	
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
		  <a class="navbar-brand" href="home.php">FORUM by Nataša</a>
		  <ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link"><i class="fa fa-user"></i> <?php echo $upIme;?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../functions/odjava.php"><i class="fa fa-sign-out"></i>Odjava</a>
			</li>
		  </ul>
		</nav>
	</header>
	
	<main>
		<div class="container" style="margin:7% auto;">
			<div class="panel panel-success">
                <div class="panel-heading"></div> 
                <div class="panel-body">
				<?php             
					include "../functions/db.php";
					$id = $_GET['tema_id'];
						
					$sql = mysqli_query($mysqli, "SELECT * from tema as tp join kategorija as c on tp.kategorija_id=c.kategorija_id where tp.tema_Id='$id' ");
					if($sql == true){

						while($row = mysqli_fetch_assoc($sql)){
							extract($row);
							echo '<h3>'.$row['kategorija'].'</h3>';
							echo '<hr>';

							$sel = mysqli_query($mysqli, "SELECT * from uporabnik where uporabnik_Id='$uporabnik_Id' ");
							while($row = mysqli_fetch_assoc($sel)){
								extract($row);
								echo "<h4>".$naslov."</h4> <br>";
								echo $ime.' '.$priimek;
								$datumCas = strtotime($datetime);
								echo "<label class='pull-right'>".date('d.m.Y h:i:s', $datumCas)."</label>";
								echo "<p class='bg-secondary text-white' style= 'padding: 20px;'>".$vsebina."</p>";
								
							}
						}
						  
					}  
				?>

				<div id="comments">
				<?php 
					$temaid= $_GET['tema_id'];
					$sql = mysqli_query($mysqli, "SELECT * from komentar as c join uporabnik as u on c.uporabnik_Id=u.uporabnik_Id where tema_Id='$temaid' order by datetime");
					$num = mysqli_num_rows($sql);
					if($num>0){
						while($row=mysqli_fetch_assoc($sql)){
							echo $row['ime']." ".$row['priimek'];
							$datumCas = strtotime($row['datetime']);
							echo '<label class="pull-right">'.date('d.m.Y h:i:s', $datumCas).'</label>';
							echo "<p class='bg-secondary text-white' style= 'padding:20px'>".$row['komentar']."</p>";
						}
					}
				?>
				</div>
            </div>
        </div>
        <hr>
        <div class="">
			<form method="POST">
				<textarea type="text" class="form-control" id="commenttxt"></textarea><br>
				<input type="hidden" id="postid" value="<?php echo $_GET['tema_id']; ?>">
				<input type="hidden" id="userid" value="<?php echo $_SESSION['uporabnik_Id']; ?>">
				<input type="submit" id="save" class="btn btn-success pull-right" value="Objavi">
			</form>
        </div>
		</div>
	</main>
	
	
	<footer>
	</footer>
	
	
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

	<script>

		$("#save").click(function(){
			
			var postid = $("#postid").val();
			var userid = $("#userid").val();
			var comment = $("#commenttxt").val();
			var datastring = 'temaid=' + postid + '&uporabnikid=' + userid + '&komentar=' + comment;
			if(!comment){
			  alert("Vnesite tekst!");
			}
			else{
			  $.ajax({
				type:"POST",
				url: "../functions/komentar-add.php",
				data: datastring,
				cache: false,
				success: function(result){
				  document.getElementById("commenttxt").value=' ';
				  $("#comments").append(result);
				}
			  });
			}
			return false;
		});

	</script>
	
</body>
</html>