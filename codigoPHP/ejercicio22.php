<!DOCTYPE html>
<!--Autor: Luis Ferreras González-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Luis Ferreras</title>
        <link rel="stylesheet" type="text/css" href="../webroot/estilosEjercicios.css">
    </head>
    <body>
        <header>
            <h1>Ejercicio 22</h1>
        </header>
        <main>
            <?php
            /*
             * @author Luis Ferreras
             * @version 2024/10/09
             */
                if(isset($_REQUEST['enviar'])){
                // Se ha enviado el formulario
                    echo"Nombre: ".$_REQUEST['nombre']."<br/>";
                    echo"Apellidos: ".$_REQUEST['apellidos'];
                }else{
                // No se ha eviado
            ?>
                <form name="ej22" action="<?php echo $_SERVER['PHP_SELF']// A si mismo;?>" method="post">
                    Nombre: <input type="text" name="nombre" id="nombre"/><br/>
                    Apellidos: <input type="text" name="apellidos" id="apellidos"><br/>
                    <input type="submit" name="enviar" id="enviar">
                </form>
            <?php
                }
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