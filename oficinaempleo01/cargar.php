<html>
  <head>
    <link rel="stylesheet" href="estilos.css">
    <link rel="shortcut icon" href="muniIcon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap" rel="stylesheet">
  </head>
  <form action="formulario.php">
    <button class="botonInicio" type="submit" style="width:70px; height:30px; font-size: 16px;">&#10094; Volver</button>
  </form>
</html>

<?php
session_start();
include "conexion.php";
date_default_timezone_set('America/Argentina/Buenos_Aires');

function calculaedad($fechanacimiento){
    list($ano,$mes,$dia) = explode("-",$fechanacimiento);
    $ano_diferencia  = date("Y") - $ano;
    $mes_diferencia = date("m") - $mes;
    $dia_diferencia   = date("d") - $dia;
    if ($dia_diferencia < 0 || $mes_diferencia < 0)
      $ano_diferencia--;
    return $ano_diferencia;
  }

if ($_SESSION['permisos']<3){
    echo ("NO CUENTAS CON LOS PERMISOS SUFICIENTES PARA REALIZAR ESTA ACCION");
}
else{
    $fechaN = $_POST['fechaNacimiento'];
    $fechaN = strtotime("$fechaN");
    $fechaN = date("Y-m-d", $fechaN);
    $edad = calculaedad($fechaN);
    $fechaIngreso = date('Y-m-d H:i:s');
    $con = mysqli_connect($host, $user, $pw, $db) or die ("ERROR DE CONEXION");
    $query= "INSERT INTO `cvpersonas`(`dni`, `usuario`, `nombre`, `apellido`, `sexo`, `fechaNacimiento`,`edad`,`calle`,`altura`,`estudios`, `email`,`telefono`, `comentario`, `fechaIngreso`) VALUES ('$_POST[txtDni]','$_SESSION[usuario]','$_POST[txtNombre]','$_POST[txtApellido]','$_POST[selecSexo]','$fechaN','$edad','$_POST[txtCalle]','$_POST[txtAltura]','$_POST[selecEstudios]','$_POST[txtMail]','$_POST[txtTelefono]','$_POST[txtComentario]','$fechaIngreso')";
    mysqli_query($con,$query) or die ("ERROR DE CONSULTAaaa");

  //carga de experiencia laboral
    $idExperiencia=0;
    $query0="SELECT `idExperiencia` FROM `experiencia`";
    $result=mysqli_query($con, $query0) or die ("PROBLEMA CONECTANDO CON LA BASE DE DATOS");
    $mayor=0;
    
    while ($resultadofetch = mysqli_fetch_array($result)){
      
      if ($resultadofetch['idExperiencia']>$mayor){
        $idExperiencia=$resultadofetch['idExperiencia'];
      }
      $mayor=intval($resultadofetch['idExperiencia']);
    }
    
    $idExperiencia=$idExperiencia+1;
    $expTiempo=$_POST['txtExpTiempo']." ".$_POST['selectExperienciaTiempo'];
    $query= "INSERT INTO `experiencia`(`idExperiencia`, `dni`, `tipoExperiencia`, `empresa`, `tiempo`) VALUES ('$idExperiencia','$_POST[txtDni]','$_POST[selecExperiencia]','$_POST[txtEmpresa]','$expTiempo')";
    mysqli_query($con,$query) or die ("ERROR DE CONSULTAs");

    
}
?>
<h3><?php echo ("CARGA DE DATOS EXITOSA");?></h3>