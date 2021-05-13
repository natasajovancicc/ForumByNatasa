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
	<style>
		td { height: 60px; vertical-align: middle; }
		.btnZamik {margin-right: 15px;}
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
						<a class="nav-link" href="../../functions/odjava.php"><i class="fa fa-sign-out"></i>Odjava</a>
					</li>
				</ul>
			</div>
		  </div>
		</nav>	
	<header>
	

	<main>
		<div class="container" style="margin:7% auto;">
			<h4 class="p-3 mb-2 bg-secondary text-white">Kategorije
				<button type="button" class="btn btn-secondary pull-right" data-toggle="modal" data-target="#dodajKategorijo">
					<i class="fa fa-plus-circle"></i>
				</button>
			</h4>
			<hr>
			<div class="panel panel-success">
				<div class="panel-heading"> </div> 
				<table class="table">
					<tr>
						<th>Kategorija</th>
						<th></th>
					</tr>			
					<?php

						include "../../functions/db.php";

						$sql = "SELECT * from kategorija";
						$run = mysqli_query($mysqli, $sql);

						while($row=mysqli_fetch_array($run, MYSQLI_ASSOC))
						{
							extract($row);
							echo "<tr>";
							echo "<td>".$kategorija."</td>";
							echo '<td>';			
							echo '<a href="../functions/kategorija-delete.php?kategorija_id='.$kategorija_Id.'"><button class="btn btn-danger pull-right" >Briši</button></a>   ';
							echo "<a href='kategorija-edit.php?id=".$kategorija_Id."' class='btn btn-warning pull-right btnZamik'>Uredi</a>"." ";									
							echo '</td>';
							echo "</tr>";
						}
					?>
				</table>
			</div>
		</div>
	</main>
	
	
	
	<footer id="pagefooter">
	   <p id="copyright" class="text-center small"></p>
	</footer>

<!--
	<script>
		function copyrightYear() {
	   var d = new Date();
	   var y = d.getFullYear();
	   document.getElementById("copyright").innerHTML = 'Copyright &copy; ' + y + ' Nataša Jovančić';
	}

	copyrightYear();
	</script>-->
	
	
	<!-- Okno za vnos (Modal) -->
	<div class="modal fade" id="dodajKategorijo" role="dialog">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <h4 class="modal-title">Nova kategorija</h4>
			</div>
			<div class="modal-body">	
				<form method="POST" action="../functions/kategorija-add.php">  
					<div class="form-group">
						<label  for="kategorija">Naziv</label>
						<input type="text" class="form-control" name="kategorija" required>
					</div>
					<br />
					<input type="submit" class="btn btn-primary w-100" value="Shrani">
			   </form>

			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Zapri</button>
			</div>
		  </div>
		</div>
	</div>
	
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

</body>
</html>