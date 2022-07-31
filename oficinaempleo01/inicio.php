<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Oficina de empleo</title>
        <link rel="stylesheet" href="estilos.css">
        <link rel="shortcut icon" href="muniIcon.ico" />
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="title">
                <a href="inicio.php"><img class="logo" src="munilogo.png"></a>
                <h4 class="upperTittle">OFICINA DE EMPLEOS:</h4>
                <h1 class="tittleText">INICIO</h1>
            </div>

            <form action="cerrarSesion.php">
                <h3 class="session"><?php echo ($_SESSION['usuario']);?>:</h3>
                <button type="submit" class="cerrarSesion">CERRAR SESION</button>
            </form>
           
            
        </header>

        <main class="contenedorInicio">
            <h3>MODIFICAR PERSONA:</h3>
            <form class="busqueda" method="post" action="modificar.php">
                <input class="buscarInicio" type="text" name="txtBusqueda" placeholder="DNI">
                <button class="botonBusqueda" type="submit">BUSCAR</button>
            </form>
        </br>
            <form method="post" action="formulario.php">
                <button class="botonInicio" type="submit">CARGAR PERSONAS</button>
            </form>
        </br>
            <form method="post" action="buscar.php">
                <button class="botonInicio" type="submit">BUSCAR PERSONAS</button>
            </form>
        </main>

    </body>
</html>