<!DOCTYPE html>
<!--Autor: Luis Ferreras González-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Luis Ferreras</title>
        <link rel="stylesheet" type="text/css" href="webroot/css/estilo.css">
    </head>
    <body>
        <header>
            <h1>Ejercicio 21 Tratamiento</h1>
        </header>
        <main>
            <?php
            /*
             * @author Luis Ferreras
             * @version 2024/10/09
             */
            // Respuestas dadas en el formulario
                $nombre=$_REQUEST['nombre'];
                $apellidos=$_REQUEST['apellidos'];
            // Se muestran las respuestas
                echo"Nombre: $nombre<br/>";
                echo"Apellidos: $apellidos";
            ?>
        </main>
        <footer>
            <a href="../../index.php">Luis Ferreras</a>
            <a href="../../208DWESProyectoDWES/indexProyectoDWES.php">DWES</a>
            <a href="../indexProyectoTema3.php">Tema 3</a>
            <a href="https://github.com/LuisFerrGon/208DWESProyectoTema3">GitHub</a>
        </footer>
    </body>
</html>