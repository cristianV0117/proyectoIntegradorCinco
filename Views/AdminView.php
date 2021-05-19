<!DOCTYPE html>
<html>
   <head>
      <title>Admin</title>
      <link rel="stylesheet" type="text/css" href="/Public/css/global.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
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
      <div class="container col-md-12 mt-4">
         <div class="card" >
            <div class="card-header" >
               <strong>Proyecto integrador</strong>
            </div>
            <div class="card-body" >
               <div id="info">
                  <div class="row">
                     <div class="col-md-2" >
                        <img class="img-fluid" alt="Responsive image" width="179" src="Public/media/sm.png">
                        <hr>
                        <strong>Trabajo elaborado por:</strong>
                        <br>
                        <li>Nicolas Maldonado</li>
                        <li>Cristian Vasquez</li>
                        <li>Cristian Briñez</li>
                        <li>Viviana Beltran</li>
                     </div>
                     <div class="col-md-10" >
                        <nav>
                           <div class="nav nav-tabs" id="nav-tab" role="tablist">
                              <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Introducción</a>
                              <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Herramientas Utilizadas</a>
                           </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                           <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                              <br />
                              <div class="row">
                                 <div class="col-md-6">
                                    <img class="img-fluid" alt="Responsive image" src="Public/media/empresariodos.png">
                                 </div>
                                 <div class="col-md-6">
                                    <h2>Bienvenido <?= $_SESSION['user'] ?>!</h2>
                                    <br />
                                    <p class="text-justify" >
                                       Bienvenido a nuestro panel de administracion en donde podrás tener control de un pequeño dormulario de administracion de usuarios donde podrás asignarles un area, ver historial de ingresos y salidas, editar perfil y consultar informacion basica sobre este proyecto realizado para la <strong>Universidad de San Mateo</strong>
                                    </p>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                              <br />
                              <ul class="list-group text-center">
                                 <li class="list-group-item active" aria-current="true">PHP 8</li>
                                 <li class="list-group-item">JAVASCRIPT</li>
                                 <li class="list-group-item">CSS 3</li>
                                 <li class="list-group-item">HTML 5</li>
                                 <li class="list-group-item">BOOTSTRAP 5</li>
                                 <li class="list-group-item">SLIM PHP 3</li>
                                 <li class="list-group-item">NMP - NODE JS</li>
                                 <li class="list-group-item">COMPOSER</li>
                                 <li class="list-group-item">XAMPP</li>
                                 <li class="list-group-item">VISUAL STUDIO CODE</li>
                                 <li class="list-group-item">MYSQL WORKBENCH</li>
                                 <li class="list-group-item">HEROKU</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
      <script type="text/javascript" src="/Public/js/Login.js"></script>
   </body>
</html>