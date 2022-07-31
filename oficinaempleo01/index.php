<?php
include "conexion.php";
$con = mysqli_connect($host, $user, $pw, $db) or die ("ERROR DE CONEXION");
$incorrecto=0;
$pass=0;

if (isset($_POST['txtUsuario']) && $_POST['txtUsuario']!=null){
    $query="SELECT * FROM `usuarios` WHERE `usuario`='$_POST[txtUsuario]'";
    $result=mysqli_query($con, $query) or die ("PROBLEMA CONECTANDO CON LA BASE DE DATOS");
    $usuarios=mysqli_fetch_array($result);

    if ($usuarios!=null && $usuarios['usuario']==$_POST['txtUsuario'] && $usuarios['password']==$_POST['txtPassword']){
        session_start();
        $_SESSION["usuario"]=$usuarios['usuario'];
        $_SESSION["permisos"]=$usuarios['permisos'];
        header ("Location: inicio.php");

}
    else{
        $incorrecto=1;
}
}
?>
<html lang="es">
    <head>
    <link rel="stylesheet" href="estilos.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="muniIcon.ico">

</head>
  
    <body>

        <main class="contenedorIndex">
            <div class="iniciarsesion">

                INICIAR SESION
        </div>

            <form method="post" action="index.php">

                <input class="user" type="text" name="txtUsuario" placeholder="USUARIO">
</br>
                <input class="password" type="password" name="txtPassword" placeholder="CONTRASEÑA">
</br>
                <input class="ingresar" type="submit" value="Ingresar">

            </form>
</br>
            <?php
            if($incorrecto==1){
                ?>
                <h3 style="color:red;"><?php echo("El nombre de usuario o contraseña son incorrectos."); ?></h3>
                <?php
            }
            ?>
        </main>


</body>

</html>