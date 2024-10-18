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
            <h1>Ejercicio 15</h1>
        </header>
        <main>
            <?php
                $asientos=[
                    1=>[1=>"Vacio", "Vacio", "Vacio", "Vacio", "Vacio"],
                    [1=>"Vacio", "Vacio", "Vacio", "Vacio", "Vacio"],
                    [1=>"Vacio", "Vacio", "Vacio", "Vacio", "Vacio"],
                    [1=>"Vacio", "Vacio", "Vacio", "Vacio", "Vacio"],
                    [1=>"Vacio", "Vacio", "Vacio", "Vacio", "Vacio"],
                    [1=>"Vacio", "Vacio", "Vacio", "Vacio", "Vacio"],
                    [1=>"Vacio", "Vacio", "Vacio", "Vacio", "Vacio"],
                    [1=>"Vacio", "Vacio", "Vacio", "Vacio", "Vacio"],
                    [1=>"Vacio", "Vacio", "Vacio", "Vacio", "Vacio"],
                    [1=>"Vacio", "Vacio", "Vacio", "Vacio", "Vacio"],
                    [1=>"Vacio", "Vacio", "Vacio", "Vacio", "Vacio"],
                    [1=>"Vacio", "Vacio", "Vacio", "Vacio", "Vacio"],
                    [1=>"Vacio", "Vacio", "Vacio", "Vacio", "Vacio"],
                    [1=>"Vacio", "Vacio", "Vacio", "Vacio", "Vacio"],
                    [1=>"Vacio", "Vacio", "Vacio", "Vacio", "Vacio"],
                    [1=>"Vacio", "Vacio", "Vacio", "Vacio", "Vacio"],
                    [1=>"Vacio", "Vacio", "Vacio", "Vacio", "Vacio"],
                    [1=>"Vacio", "Vacio", "Vacio", "Vacio", "Vacio"],
                    [1=>"Vacio", "Vacio", "Vacio", "Vacio", "Vacio"],
                    [1=>"Vacio", "Vacio", "Vacio", "Vacio", "Vacio"]
                ];
                echo "<h2>Usando foreach</h2>";
                foreach ($asientos as $key=>$fila){
                    echo "Fila $key: ";
                    foreach ($fila as $columna){
                        echo "$columna ";
                    };
                    echo "<br>";
                };
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