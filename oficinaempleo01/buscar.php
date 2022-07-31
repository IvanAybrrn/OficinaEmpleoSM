<?php
session_start();
include "conexion.php";
if ($_SESSION["permisos"]<2){
    echo ("NO CUENTAS CON LOS PERMISOS SUFICIENTES PARA REALIZAR ESTA ACCION");
}
else{
    if (isset($_POST['filtrar'])){

        $sexo=$_POST['selecSexo'];
        $estudios=$_POST['selecEstudios'];
        $edadMin=$_POST['edadMin'];
        $edadMax=$_POST['edadMax'];
        $where="WHERE";

        if (empty($_POST['selecSexo'])==false and empty($_POST['selecEstudios'])==false){
            $where="WHERE sexo= '".$sexo."' AND estudios>='".$estudios."' AND";
            $prueba=3; 
        }
        else if (empty($_POST['selecSexo']==false)){
            $where="WHERE sexo= '".$sexo."' AND";
            $prueba=1;
        }
        else if (empty($_POST['selecEstudios'])==false){
            $where="WHERE estudios>='".$estudios."' AND";
            $prueba=2;
        }

        $con = mysqli_connect($host, $user, $pw, $db) or die ("ERROR DE CONEXION");
        $query="SELECT * FROM `cvpersonas` $where edad>= $edadMin AND edad< $edadMax";
        $result=mysqli_query($con, $query) or die ("PROBLEMA CONECTANDO CON LA BASE DE DATOS");
    }
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
                <h1 class="tittleText">BUSCAR PERSONAS</h1>
            </div>

            <form action="cerrarSesion.php">
                <h3 class="session"><?php echo ($_SESSION['usuario']);?>:</h3>
                <button type="submit" class="cerrarSesion">CERRAR SESION</button>
            </form>

        </header>

        <main class="contenedorBuscar">
            <div class="barraFiltros">
                <form method="post" action="buscar.php">
                    
                    Sexo:
                    <select class="selectFiltro" name="selecSexo">
                        <option></option>
                        <option value="Hombre">Hombre</option>
                        <option value="Mujer">Mujer</option>
                        <option value="Otro">Otro</option>
                    </select>

                    Edad de:
                    <input type="number" name="edadMin" class="selectFiltro" min="18" max="80" value="18" style="width: 45px;">
                    a
                    <input type="number" name="edadMax" class="selectFiltro" min="18" max="80" value="75" style="width: 45px;">

                    Estudios:
                    <select class="selectFiltro" name="selecEstudios">
                        <option></option>
                        <option value="1">Primario</option>
                        <option value="2">Secundario en curso</option>
                        <option value="3">Secundario completo</option>
                        <option value="4">Terciario</option>
                        <option value="5">Universitarios en curso</option>
                        <option value="6">Universitarios completo</option>
                    </select>
                    Rubro solicitado:
                    <select class="selectFiltro" name="selecExperiencia">
                        <option></option>
                        <option value="1">Gastronomia</option>
                        <option value="2">Construccion</option>
                        <option value="3">Informatica</option>
                        <option value="4">Limpieza</option>
                        <option value="5">Otro</option>
                    </select>
                    Idioma:
                    <select class="selectFiltro" name="selecIdiomas">
                        <option></option>
                        <option value="1">Ingles</option>
                        <option value="2">Italiano</option>
                        <option value="3">Portugues</option>
                        <option value="4">Aleman</option>
                        <option value="5">Otro</option>
                    </select>

                    <input style="width: 80px;" class="selectFiltro" type="submit" value="FILTRAR" name="filtrar">

                </form>

            </div>
            
            <?php
            if (isset($_POST['filtrar'])){
            ?>
            <div class="buscarLista">
                <table border="1">
                    <tr class="tr1">
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Sexo</th>
                        <th>Edad</th>
                        <th>Calle</th>
                        <th>Altura</th>
                        <th>Estudios</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Fecha de ingreso</th>
                    </tr>
                    <?php
                    while ($personas=mysqli_fetch_array($result)){
                        switch ($personas['estudios']){
                            case 1:
                                $estudios="Primario";
                                break;
                            case 2:
                                $estudios="Secundario en curso";
                                break;
                            case 3:
                                $estudios="Secundario Completo";
                                break;
                            case 4:
                                $estudios="Terciario";
                                break;
                            case 5:
                                $estudios="Universitarios en curso";
                                break;
                            case 6:
                                $estudios="Universitarios completos";
                                break;

                        }
                        ?>
                        <tr class="trBuscar">
                            <td><?php echo ($personas['dni']." ");?></td> 
                            <td><?php echo ($personas['nombre']." ");?></td>
                            <td><?php echo ($personas['apellido']." ");?></td>
                            <td><?php echo ($personas['sexo']." ");?></td>
                            <td><?php echo ($personas['edad']." ");?></td>
                            <td><?php echo ($personas['calle']." ");?></td>
                            <td><?php echo ($personas['altura']." ");?></td>
                            <td><?php echo ($estudios);?></td>
                            <td><?php echo ($personas['email']." ");?></td>
                            <td><?php echo ($personas['telefono']." ");?></td>
                            <td><?php echo ($personas['fechaIngreso']." ");?></td>     
                        </tr>
                    <?php
                    }
                    ?>

                </table>

            </div>
        </main>
        
    </body>
</html>
<?php
}
}
?>