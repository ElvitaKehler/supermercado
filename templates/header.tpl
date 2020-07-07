 <!DOCTYPE html>
 <html lang="en">

     <head>
         <base href="{$base_url}">
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
         <link rel="icon" href="images/descarga.jpg">
         <link rel="stylesheet" href="estilo/estilo.css">
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

         <title>Supermercado WEB</title>
     </head>

     <body>
        <div class="panel panel-primary"><MARQUEE>
            <a href="easteregg"> <img src="images/descarga.jpg" class="rounded float-left" height="50" width="50"> </a>
             
            <a href="easteregg"> <img src="images/descarga.jpg" class="rounded float-right" height="50" width="50"> </a>
             </MARQUEE>
         </div>
         <div class="panel panel-primary">             
             <h1 class="text-center" style="color:orange"> Supermercado WEB </h1>
         </div>
        

         <nav class="barranav navbar navbar-expand-lg navbar navbar-dark bg-dark mb-3">
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>

             <div class="collapse navbar-collapse" id="navbarNav">
                 <ul class="navbar-nav">
                     <li class="nav-item active">
                         <a class="navbar-brand" href="inicio">Home</a></li>
                     <li class="nav-item active">
                         <a class="navbar-brand" href="listar">Productos</a> </li>
                     <li class="nav-item active">
                         <a class="navbar-brand" href="listrubros">Rubros</a></li>
                     {if $User=='admin'}
                     <li class="nav-item active">
                         <a class="navbar-brand" href="permisos"><b style='color:orange'>Permisos</b><span></span></a></li>
                     {/if}
                 </ul>

             </div>
             <div class="login-container">
                 <ul class="navbar-nav">


                     {if !$User}
                     <li class="nav-item active">
                         <a class="navbar-brand" href="registroUsuario">Registrarse</a></li>
                     <li class="nav-item active">
                         <a class="navbar-brand" href="login"><b style='color:orange'>Login</b><span></span></a></li>
                     {else}

                     <li class="nav-item active">
                         <a class="navbar-brand" href='cerrar_sesion'><b style='color:orange'>{$usuario} - Logout </b></a></li>
                     {/if}

                 </ul>

             </div>

         </nav>