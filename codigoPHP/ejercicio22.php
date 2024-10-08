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
            <h1>Ejercicio 22</h1>
        </header>
        <main>
            <?php
                if(isset($_REQUEST['enviar'])){
                    echo"Nombre: ".$_REQUEST['nombre']."<br/>";
                    echo"Apellidos: ".$_REQUEST['apellidos'];
                }else{?>
                    <form name="ej22" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        Nombre: <input type="text" name="nombre" id="nombre"/><br/>
                        Apellidos: <input type="text" name="apellidos" id="apellidos"><br/>
                        <input type="submit" name="enviar" id="enviar">
                    </form><?php
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