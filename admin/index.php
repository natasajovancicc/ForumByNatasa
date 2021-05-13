<html lang="sl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin ForumByNataša</title>
    <meta name="description" content="Administracija ForumByNataša">
	<meta name="keywords" content="administracija, splet, fiš, spletno programiranje, forum">
	<meta name="author" content="Nataša Jovančić">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap2.min.css">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
</head>
<body>

	<header>
	</header>
	
	<main>
		<div class="container h-75">
			<div class="row align-items-center h-75">
				<div class="mx-auto col-lg-4 col-md-6">
				
					<h3 class="text-center" style="margin-bottom:50px;">Administracija</h3>
					
					<form method="POST" action="functions/prijava.php">
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-user"></i> </span>
							 </div>
							<input name="upIme" class="form-control" placeholder="Uporabniško ime" type="text" required>
						</div> 
								
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
							</div>
							<input name="geslo" class="form-control" placeholder="Geslo" type="password" required>
						</div> 
									 
						<div class="form-group" style="">
							<button type="submit" class="btn btn-primary btn-block">Prijava</button>
						</div>                                                               
					</form>
									
				</div>
			</div>
		</div>
	</main>

	<footer class="footerIndex">
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
