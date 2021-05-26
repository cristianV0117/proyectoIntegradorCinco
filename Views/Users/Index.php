<!DOCTYPE html>
<html>
   <head>
      <title>Usuarios</title>
      <link rel="stylesheet" type="text/css" href="/Public/css/global.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="/node_modules/sweetalert2/dist/sweetalert2.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
         <a href="/usuarios/crear" class="btn btn-outline-primary" role="button" >Registrar usuario</a>
         <div class="card mt-2">
            <div class="card-header">
               <center>
                  <h3>Lista de usuarios</h3>
               </center>
            </div>
            <div class="card-body table-responsive">
               <table class="table table-borderless">
                  <thead>
                     <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Documento</th>
                        <th>Area</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        foreach ($data as $value) {
                        	echo '<tr><td>'.$value['firstName'].'</td><td>'.$value["firstLastName"].'</td><td>'.$value['email'].'</td><td>'.$value["document"].'</td><td>'.$value["name"].'</td><td><a role="button" class="btn btn-outline-primary" href="/usuarios/'.$value["id"].'">Editar<a/></td><td><button key="'.$value["id"].'" class="btn btn-outline-danger delete" >Eliminar</button></td></tr>';
                        }
                        ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
      <script type="text/javascript" src="/node_modules/sweetalert2/dist/sweetalert2.min.js" ></script>
      <script type="text/javascript" src="/Public/js/Users.js"></script>
   </body>
</html>