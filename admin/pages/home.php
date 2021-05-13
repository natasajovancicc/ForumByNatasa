<?php
	session_start();
	if (isset($_SESSION['upIme'])&&$_SESSION['upIme']!=""){
	}
	else {
		header("Location:../index.php");
	}
	$upIme = $_SESSION['upIme'];
?>

<html lang="sl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Administracija</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap2.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>	
	<style>
		td { height: 60px; vertical-align: middle; }
	</style>	
</head>
<body>

	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		  <div class="container-fluid">
			<a class="navbar-brand" href="home.php">Administracija</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarColor01">
				<ul class="navbar-nav me-auto">
					<li class="nav-item">
					  <a class="nav-link" href="kategorija.php">Kategorije</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="tema.php">Teme</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="uporabnik.php">Uporabniki</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="komentar.php">Komentarji</a>
					</li>
				</ul>
			  
				<ul class="navbar-nav ms-md-auto">
					<li class="nav-item">
						<a class="nav-link"><i class="fa fa-user"></i> <?php echo $upIme;?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../functions/odjava.php"><i class="fa fa-sign-out"></i>Odjava</a>
					</li>
				</ul>
			</div>
		  </div>
		</nav>
			
	<header>
	

	<main
	
		<div class="container" style="margin:7% auto;">

			<h4 class="p-3 mb-2">Zadnji vnosi</h4>
			<hr>
			<?php  
				include "../../functions/db.php";

				echo '<div class="panel panel-success">
						<div class="panel-heading">
						</div> 
						<table class="table">
						<tr class = "">
							<th style="width: 30%">Datum in čas</th>
							<th style="width: 30%">Objavil</th>
							<th style="width: 40%">Komentar</th>
						</tr>';
						$sel1 = mysqli_query($mysqli, "SELECT * FROM komentar as c join uporabnik as u on c.uporabnik_id=u.uporabnik_id ORDER BY `datetime` DESC LIMIT 10");
						while($row1=mysqli_fetch_assoc($sel1)){
							extract($row1);
							echo '<tr>';
							$dateDt = strtotime($datetime);
							echo '<td>'.date('d.m.Y H:i:s', $dateDt).'</td>';
							echo '<td>'.$ime.' '.$priimek.'</td>';
							echo '<td>'.$komentar.'</td>';
							echo '</tr>';
						}
				echo '</table>';
				echo '</div>';			
			?>
		</div>
	</main>
	
	
	<footer id="pagefooter">
	   <p id="copyright" class="text-center small"></p>
	</footer>


	<script>
	function copyrightYear() {
	   var d = new Date();
	   var y = d.getFullYear();
	   document.getElementById("copyright").innerHTML = 'Copyright &copy; ' + y + ' Nataša Jovančić';
	}

	copyrightYear();
	</script>

</body>
</html>