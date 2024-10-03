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
            <h1>Ejercicio 12</h1>
        </header>
        <main>
            <?php
                $superglobales=[
                    1=>'_SERVER',
                    2=>'_REQUEST',
                    3=>'_GET',
                    4=>'_POST',
                    5=>'_COOKIE',
                    6=>'_ENV',
                    7=>'_FILES',
                    8=>'_SESSION',
                    9=>'GLOBAL'
                ];
                foreach($superglobales as $valor){
                    if(!is_null($$valor)){
                        echo '<h2>$_SERVER</h2>';
                        foreach($_SERVER as $key=>$key){
                            print_r($key."=>".$key."<br>");
                        }
                    }
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