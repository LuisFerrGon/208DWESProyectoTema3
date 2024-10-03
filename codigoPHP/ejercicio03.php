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
                $zonaEspana=new DateTimeZone("Europe/Madrid");
                $zonaPortugal=new DateTimeZone("Europe/Lisbon");
                $fechaEspana=new DateTime('now', $zonaEspana);
                $fechaPortugal=new DateTime('now',$zonaPortugal);
                $fechaNacimiento=new DateTime("2005-12-11",$zonaEspana);
                $fechaFuturo=new DateTime("2050-01-01",$zonaEspana);
                echo(
                    "Hola, hoy es ".$fechaEspana->format('d \d\e m \d\e\l Y').
                    " y son las ".$fechaEspana->format('H:i:s').
                    " en Benavente y las ".$fechaPortugal->format('H:i:s').
                    " en Oporto.<br>Nací el ".$fechaEspana->format('d \d\e m \d\e\l Y').
                    " y por tanto tengo ".$fechaEspana->diff($fechaNacimiento)->y.
                    " años, que es lo mismo que ".$fechaEspana->diff($fechaNacimiento)->days.
                    " días.<br/>El ".$fechaFuturo->format('d \d\e m \d\e\l Y').
                    " tendré ".$fechaFuturo->diff($fechaNacimiento)->y." años."
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