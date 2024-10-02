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
            <h1>Ejercicio 03</h1>
        </header>
        <main>
            <?php
                //$fechaActual=new DateTime('now', new DateTimeZone("Europe/Madrid"));
                //echo $fechaActual->format('E\s d \d\e m \d\e\l Y \y \s\o\n \l\a\s H:i:s');
                $fechaEspana=new DateTime('now', new DateTimeZone("Europe/Madrid"));
                $fechaPortugal=new DateTime('now', new DateTimeZone("Europe/Lisbon"));
                $fechaNacimiento=mktime(00, 00, 00, 12, 11, 2005);
                $fechaFuturo=mktime(00, 00, 00, 01, 01, 2050);
                echo(
                    "Hola, hoy es ".$fechaEspana->format('d \d\e m \d\e\l Y').
                    " y son las ".$fechaEspana->format('H:i:s').
                    " en Benavente y las ".$fechaPortugal->format('H:i:s').
                    " en Oporto.<br>Nací el ".date('d \d\e m \d\e\l Y', $fechaNacimiento).
                    ""
                );
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