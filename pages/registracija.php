<html lang="sl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forum by Nataša</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
</head>
<body>
	<header>
	</header>
	
	<main>
		<div class="container h-100">
			<div class="row align-items-center h-100">
				<div class="mx-auto col-lg-4 col-md-6">
				
					<h3 style="margin-bottom:50px; text-align:center;">Registracija</h3>
						
					<form method="POST" action="../functions/registracija.php">
					
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-user"></i> </span>
							 </div>
							<input name="ime" class="form-control" placeholder="Ime" type="text" style = "border: 1px;" required>
						</div> 
						
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-user"></i> </span>
							 </div>
							<input name="priimek" class="form-control" placeholder="Priimek" type="text" style = "border: 1px;" required>
						</div> 
						
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-user"></i> </span>
							 </div>
							<input name="upIme" class="form-control" placeholder="Uporabniško ime" type="text" style = "border: 1px;" required>
						</div> 
						
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
							</div>
							<input name="geslo" class="form-control" placeholder="Geslo" type="password" style = "border: 1px;">
						</div> 
																		
						<div class="form-group" style="">
							<button type="submit" class="btn btn-primary btn-block">Registracija</button>
						</div>                                                                
					</form>
									
				</div>
			</div>
		</div>
	</main>
	
	<footer>
	</footer>

	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>