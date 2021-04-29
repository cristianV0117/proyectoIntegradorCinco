<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="/Public/css/global.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
	<div class="container col-md-6 mt-5">
		<div class="card text-center">
		  <div class="card-header">
		    <center><h3>Inicia sesión</h3></center>
		  </div>
		  <div class="card-body">
		  	<form id="login" >
			    <div class="row">
			    	<div class="container col-md-11">
			    		<label><h4>Email</h4></label>
			    		<input id="user" type="email" class="form-control" placeholder="Email..." required/>
			    	</div>
			    </div>
			    <div class="row mt-4">
			    	<div class="container col-md-11">
			    		<label><h4>Contraseña</h4></label>
			    		<input id="password" type="password" class="form-control" placeholder="Contraseña..." required/>
			    	</div>
			    </div>
			    <br />
			    <hr />
			    <button class="btn btn-outline-success" >Iniciar sesion</button>
			</form>
			<span class="mt-3" id="alert" ></span>
		  </div>
		</div>
	</div>
	<script type="text/javascript" src="/Public/js/Login.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>