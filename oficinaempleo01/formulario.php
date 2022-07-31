<?php
session_start();
?>
<html lang="es">
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
                <h1 class="tittleText">CARGA DE DATOS</h1>
            </div>

            <form action="cerrarSesion.php">
                <h3 class="session"><?php echo ($_SESSION['usuario']);?>:</h3>
                <button type="submit" class="cerrarSesion">CERRAR SESION</button>
            </form>
           
            
        </header>

        <main class="contenedorForm">
            
            <form class="formCarga" method="POST" action="cargar.php">
                <fieldset>
                    <legend>Datos personales</legend>
                    Nombre: <input type="text" name="txtNombre" required>  Apellido: <input type="text" name="txtApellido" required>
</br>
</br>
                    DNI: <input type="text" name="txtDni" required>
</br>
</br>
                    Sexo: 
                    <select name="selecSexo">
                        <option value="Hombre">Hombre</option>
                        <option value="Mujer">Mujer</option>
                        <option value="Otro">Otro</option>
                    </select>
                    
                    Fecha de nacimiento: <input type="date" name="fechaNacimiento" required min="1940-01-01" max="2005-01-01">
</br>
</br>
                    <u>Direccion:</u>
</br>
</br>
                    Calle: <input type="text" name="txtCalle"> 
                    Altura: <input type="text" name="txtAltura">
                </fieldset>
</br>
</br>
                <fieldset>
                    <legend>Datos laborales</legend>
                    Estudios: 
                    <select name="selecEstudios">
                        <option></option>
                        <option value="1">Primario</option>
                        <option value="2">Secundario en curso</option>
                        <option value="3">Secundario completo</option>
                        <option value="4">Terciario</option>
                        <option value="5">Universitarios en curso</option>
                        <option value="6">Universitarios completo</option>
                    </select>
</br>
</br>
                    Cursos adicionales: <input type="text" name="txtCursos">
</br>
</br>
                    <u>Experiencia Laboral:</u>
</br>
</br>
                    Rubro:
                    <select name="selecExperiencia">
                        <option></option>
                        <option value="Gastronomia">Gastronomia</option>
                        <option value="Construccion">Construccion</option>
                        <option value="Informatica">Informatica</option>
                        <option value="Limpieza">Limpieza</option>
                        <option value="Otro">Otro</option>
                    </select>
                    
                    Empresa: <input type="text" name="txtEmpresa">
                    
                    Tiempo: <input type="text" name="txtExpTiempo">
                    
                    <select name="selectExperienciaTiempo">
                        <option></option>
                        <option value="Meses">Meses</option>
                        <option value="Años">Años</option>
                    </select>

</br>
</br>           
                    idiomas: 
                    <select name="selecIdiomas">
                        <option value="0"> </option>
                        <option value="1">Ingles</option>
                        <option value="2">Italiano</option>
                        <option value="3">Portugues</option>
                        <option value="4">Aleman</option>
                        <option value="5">Otro</option>
                    </select>

                    <select name="selecIdiomas2">
                        <option value="0"> </option>
                        <option value="1">Ingles</option>
                        <option value="2">Italiano</option>
                        <option value="3">Portugues</option>
                        <option value="4">Aleman</option>
                        <option value="5">Otro</option>
                    </select>
</br>
</br>
                    Intereses laborales (opcional):
                    <select name="selecInteres">
                        <option value="0"> </option>
                        <option value="1">Gastronomia</option>
                        <option value="2">Construccion</option>
                        <option value="3">Informatica</option>
                        <option value="4">Limpieza</option>
                        <option value="5">Otro</option>
                    </select>
                    
                    <select name="selecInteres2">
                        <option value="0"> </option>
                        <option value="1">Gastronomia</option>
                        <option value="2">Construccion</option>
                        <option value="3">Informatica</option>
                        <option value="4">Limpieza</option>
                        <option value="5">Otro</option>
                    </select>
                    
                    <select name="selecInteres3">
                        <option value="0"> </option>
                        <option value="1">Gastronomia</option>
                        <option value="2">Construccion</option>
                        <option value="3">Informatica</option>
                        <option value="4">Limpieza</option>
                        <option value="5">Otro</option>
                    </select>
                    
                </fieldset>                    
</br>
</br>

           <fieldset>
               <legend>Datos extra</legend>
                Email:
                <input type="email" name="txtMail" required>
</br>
</br>
                Telefono:
                <input type="text" name="txtTelefono" required>
</br>
</br>
                Informacion adicional:
</br>
</br>
                <textarea class="comentario" name="txtComentario" cols="85" rows="20"></textarea>

           </fieldset>
</br>
</br>
                <input class="botonSubir" type="submit" value="SUBIR">

            </form>






        </main>

    </body>



</html>
