<?php
	session_start();
	if (isset($_SESSION['upIme'])&&$_SESSION['upIme']!=""){
	}
	else {
		header("Location:../index.html");
	}
	
	$upIme = $_SESSION['upIme'];	
	$idPregled = $_GET['id'];
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
		.btnZamik {margin-right: 5px;}
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

			<h4 class="p-3 mb-2 bg-secondary text-white">Teme
					<button type="button" class="btn btn-secondary pull-right" data-toggle="modal" data-target="#dodajTemo">
						<i class="fa fa-plus-circle"></i>
					</button>
			</h4>
			<hr>
			
			<div class="panel panel-success">
				<div class="panel-heading"> </div> 
				
				<table class="table">
					<tr>
						<th>Tema</th>
						<th>Kategorija</th>
						<th></th>
					</tr>
				
				<?php
					include "../../functions/db.php";

					$sql = "SELECT * FROM tema as tp join kategorija as c on tp.kategorija_id=c.kategorija_id";
					$run = mysqli_query($mysqli, $sql);

					while($row=mysqli_fetch_array($run, MYSQLI_ASSOC))
					{
						$id = $row['tema_Id'];
						echo "<tr>";
						echo "<td>".$row['naslov']."</td>";
						echo "<td>".$row['kategorija']."</td>";
							 echo "<td>";
						                                            
                                                echo "<a href='../functions/tema-delete.php?tema_Id=$id' class='btn btn-danger pull-right btnZamik'><i class='fa fa-trash'></i></a>";
                                                echo "<a href='tema-edit.php?id=".$id."' class='btn btn-warning pull-right btnZamik'><i class='fa fa-edit'></i></a>";
                                                echo "<a href='tema-pogled.php?id=".$id."' class='btn btn-light pull-right btnZamik'><i class='fa fa-info' aria-hidden='true'></i></a>";
						echo "</td>";
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



	
	<div class="modal fade" id="poglejTemo" role="dialog">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <h4 class="modal-title">Uredi temo</h4>
			</div>
			<div class="modal-body">
							
				<form method="" action="">  
					<?php 
						include "../../functions/db.php";
						
						$sql = "SELECT * FROM tema as tp join kategorija as c on tp.kategorija_id=c.kategorija_id WHERE tp.tema_Id='$idPregled'";
						$run = mysqli_query($mysqli, $sql);

						while($row = mysqli_fetch_array($run, MYSQLI_ASSOC))
						{
							$id = $row['tema_Id'];
							$naslov = $row['naslov'];
							$vsebina = $row['vsebina'];
							$kategorija= $row['kategorija'];
							$datetime =$row['datetime'];
						}
					?>

					<div class="form-group">
					
						<div class="form-group">
						  <label for="naslov">Naziv</label>
						  <input name="naslov" type="text" class="form-control" id="naslov" value="<?php echo $naslov;?>" readonly>
						</div>
						
						<div class="form-group">
						  <label for="kategorija">Kategorija</label>
						  <input name="kategorija" type="text" class="form-control" id="kategorija" value="<?php echo $kategorija;?>" readonly>
						</div>
						
						<div class="form-group">
						  <label for="dt">Datum, čas kreiranja</label>
						  <input name="dt" type="text" class="form-control" id="dt" value="<?php echo $datetime;?>" readonly>
						</div>
			
						<div class="form-group">
						  <label for="vsebina">Vsebina</label>
						  <textarea name="vsebina" class="form-control" rows="3" id="vsebina" readonly><?php echo $vsebina; ?></textarea>
						</div>
											
					</div>
					<br />
					
			   </form>

			</div>
			<div class="modal-footer">
			  <a href="" target="_blank" id="zapriBtn" type="button" class="btn btn-default" data-dismiss="modal">Zapri</a>
			</div>
		  </div>
		</div>
	</div>
  
	
	<script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
	
	<script>
		$("#poglejTemo").modal();
		
		$(document).ready(function(){
			$('#zapriBtn').click(function(){
				window.open("tema.php", '_self');
			});
		});
	</script>

</body>
</html>