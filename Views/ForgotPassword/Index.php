<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="/Public/css/global.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
	<div class="container col-md-6 mt-5">
		<a href="/" role="button" class="btn btn-outline-primary" >Inicio</a>
		<div class="card text-center mt-2">
			<div class="card-header">
		    	<center><h3>Olvidaste tu contraseña?</h3></center>
		  	</div>
		  	<div class="card-body">
		  		<div>
		  			<form id="searchEmail">
			  			<p><strong>Porfavor introduce tu correo electronico</strong></p>
			  			<input id="email" class="form-control" type="email" name="email" required>
			  			<hr />
			  			<button class="btn btn-outline-success" >Continuar</button>
		  			</form>
		  			<div id="response" >
		  			</div>
		  		</div>
			</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<script type="text/javascript" src="/Public/js/ForgotPassword.js"></script>
</body>
</html>