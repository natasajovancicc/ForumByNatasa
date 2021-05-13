<?php
	session_start();
	if (isset($_SESSION['upIme']) && $_SESSION['upIme']!=""){
	}
	else {
		header("Location:../index.html");
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
		td {height: 60px; vertical-align: middle;}
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
	</header>
	

	<main>
		<div class="container" style="margin:7% auto;">
			<h4 class="p-3 mb-2 bg-secondary text-white">Uporabniki</h4>
			<hr>	
			<div class="panel panel-success">
				<div class="panel-heading"> </div> 
				
				<table class="table">
					<tr>
						<th>Uporabniško ime</th>
						<th>Ime in priimek</th>
						<th></th>
					</tr>
				
					<?php
						include "../../functions/db.php";

						$sql = "SELECT * from uporabnik as tu join racun as ta on tu.uporabnik_Id=ta.uporabnik_Id";
						$run = mysqli_query($mysqli, $sql);

						while($row=mysqli_fetch_array($run, MYSQLI_ASSOC))
						{
							extract($row);
							echo "<tr>";
							echo "<td>".$upIme."</td>";
							echo "<td>".$ime.' '.$priimek."</td>";
							echo '<td><button class="btn btn-danger pull-right" onclick="brisiUporabnika('.$uporabnik_Id.')"><i class="fa fa-trash"></i></button>';
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

  
	<script type="text/javascript">

		function brisiUporabnika(uporabnik_Id){
			var con = confirm("Ste prepričani, da želite izbrisati uporabnika?");
			if(con==true){
				$.ajax({
					url: "../functions/uporabnik-delete.php",
					type: "POST",
					data:{
						id: uporabnik_Id
					},
					success: function(dataResult){
						location.reload();
					}
				});
			}
			return false;
		}
		
	</script>
	
</body>
</html>