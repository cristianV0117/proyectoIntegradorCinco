<!DOCTYPE html>
<html>
<head>
	<title>Crear usuario</title>
	<link rel="stylesheet" type="text/css" href="/Public/css/global.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-info">
         <div class="container-fluid">
            <a class="navbar-brand" href="/admin">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="/usuarios">Usuarios</a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Aplicacion
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Descargar script de la DB</a></li>
                        <li>
                           <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/history/login">Historial de ingresos y salidas</a></li>
                     </ul>
                  </li>
                  <li  class="nav-item">
                     <a id="logOut" class="nav-link active" aria-current="page">Salir</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
	<div class="container col-md-10 mt-5" >
		<a href="/usuarios" class="btn btn-outline-primary" role="button" >Usuarios</a>
		<div class="card mt-2">
			<div class="card-header">
				<center><h3>Crear usuario</h3></center>
			</div>
			<div class="card-body">
				<form id="create" >
					<div class="row">
						<div class="col-md-3">
							<label><h4>Primer nombre</h4></label>
							<input id="firstName" class="form-control" placeholder="Primer nombre..." required />
						</div>
						<div class="col-md-3">
							<label><h4>Segundo nombre</h4></label>
							<input id="secondName" class="form-control" placeholder="Segundo nombre..."  />
						</div>
						<div class="col-md-3">
							<label><h4>Primer apellido</h4></label>
							<input id="firstLastName" class="form-control" placeholder="Primer apellido..." required />
						</div>
						<div class="col-md-3">
							<label><h4>Segundo apellido</h4></label>
							<input id="secondLastName" class="form-control" placeholder="Segundo apellido..." />
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-3">
							<label><h4>Documento</h4></label>
							<input id="documentUser" type="number" class="form-control" placeholder="Documento..." required />
						</div>
						<div class="col-md-3">
							<label><h4>Email</h4></label>
							<input id="email" type="email" class="form-control" placeholder="Email..." required />
						</div>
						<div class="col-md-3">
							<label><h4>Area</h4></label>
							<select id="areas" class="form-control" required>
								<option value="">-- Area --</option>
								<?php
								foreach ($data as $value) {
									echo '<option value="'.$value["id"].'">'.$value["name"].'</option>';
								}
								?>
							</select>
						</div>
						<div class="col-md-3">
							<label><h4>Contraseña</h4></label>
							<input id="password" type="password" class="form-control" placeholder="Contraseña..." required />
						</div>
					</div>
					<hr />
					<button class="btn btn-outline-success">Registrar</button>
					<span id="alert" ></span>
				</form>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<script type="text/javascript" src="/Public/js/Users.js"></script>
</body>
</html>