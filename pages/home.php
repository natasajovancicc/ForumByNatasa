<?php
	session_start();
	if (isset($_SESSION['upIme'])&&$_SESSION['upIme']!=""){
	}
	else {
		header("Location:../index.php");
	}
	$upIme=$_SESSION['upIme'];
	$uporabnikid = $_SESSION['uporabnik_Id'];
?>

<html lang="sl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
    <meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Forum by Nataša</title>
	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
   
	<style>
		.navbar-nav {
		  flex-direction: row;
		}
		
		.nav-link {
		  padding-right: .5rem !important;
		  padding-left: .5rem !important;
		}
		
		.ml-auto .dropdown-menu {
		  left: auto !important;
		  right: 0px;
		}
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
			<h4 class="p-3 mb-2 bg-dark text-white">Teme
				<button type="button" class="btn btn-secondary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"></i></button>
			</h4>
			<hr>
			<?php  include "../functions/db.php";
				$sel = mysqli_query($mysqli, "SELECT * from kategorija");
				while($row=mysqli_fetch_assoc($sel)){
					extract($row);
					echo '<div class="panel panel-success">
							<div class="panel-heading">
								<h3 class="panel-title">'.$kategorija.'</h3>
							</div> 
							<table class="table">
								<tr class = "table-dark">
									<th style="width: 30%">Naziv</th>
									<th style="width: 30%">Kategorija</th>
									<th style="width: 40%"></th>
								</tr>';
								$sel1 = mysqli_query($mysqli, "SELECT * from tema where kategorija_Id='$kategorija_Id' ");
								while($row1=mysqli_fetch_assoc($sel1)){
									extract($row1);
									echo '<tr>';
									echo '<td>'.$naslov.'</td>';
									echo '<td>'.$kategorija.'</td>';
									echo '<td><a href="podrobno.php?tema_id='.$tema_Id.'"><button class="btn btn-primary pull-right" style="min-width: 100px;">Več</button></td>';
									echo '</tr>';
								}
						echo '</table>';
			        echo '</div>';
				}
			?>	
		</div>	
	</main>
			
			
			

	<!-- Okno za vnos (Modal) -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Nova tema</h4>
				</div>
				<div class="modal-body">
		
					<form method="POST" action="../functions/tema-add.php">
					
						<div class="form-group">
						  <label for="sel1">Kategorija</label>
						  <select name="kategorija" class="form-control" id="sel1" required>
							<option></option>
							<?php $sel = mysqli_query($mysqli, "SELECT * from kategorija");
								if($sel==true){
									while($row=mysqli_fetch_assoc($sel)){
										extract($row);
										echo '<option value='.$kategorija_Id.'>'.$kategorija.'</option>';
									}
								}
							?>
						  </select>
						</div>

						<div class="form-group">
						  <label for="naslov">Naziv</label>
						  <input name="naslov" type="text" class="form-control" id="naslov">
						</div>
						
					
						<div class="form-group">
						  <label for="vsebina">Komentar</label>
						  <textarea name="vsebina" class="form-control" rows="3" id="vsebina" required></textarea>
						</div>

					   <br>
						<input type="hidden" name="uporabnikid" value=<?php echo $uporabnikid; ?>>
						<input type="submit" class="btn btn-primary btn-block" value="Objavi">
				   </form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Zapri</button>
				</div>
			</div>
		</div>  
	</div> 

	
	
	
	<footer class="">
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
	
	
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>