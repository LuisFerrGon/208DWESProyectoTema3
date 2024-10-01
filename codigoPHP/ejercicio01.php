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
            <h1>Ejercicio 01</h1>
        </header>
        <main>
            <div>
                <h2>Utilizando la función echo</h2>
                <?php
                    $cadena="texto";
                    $entero=10;
                    $decimal=11.3;
                    $booleana=true;
                    echo'La variable $cadena es tipo '.gettype($cadena)." y su valor es $cadena<br>";
                    echo'La variable $entero es tipo '.gettype($entero)." y su valor es $entero<br>";
                    echo'La variable $decimal es tipo '.gettype($decimal)." y su valor es $decimal<br>";
                    echo'La variable $booleana es tipo '.gettype($booleana)." y su valor es $booleana<br>";
                ?>
            </div>
            <div>
                <h2>Utilizando la función print</h2>
                <?php
                    print'La variable $cadena es tipo '.gettype($cadena)." y su valor es $cadena<br>";
                    print'La variable $entero es tipo '.gettype($entero)." y su valor es $entero<br>";
                    print'La variable $decimal es tipo '.gettype($decimal)." y su valor es $decimal<br>";
                    print'La variable $booleana es tipo '.gettype($booleana)." y su valor es $booleana<br>";
                ?>
            </div>
            <div>
                <h2>Utilizando la función printf</h2>
                <?php
                    $formato="La variable %s es tipo %s y su valor es %s<br>";
                    printf($formato, '$cadena', gettype($cadena), "$cadena");
                    printf($formato, '$entero', gettype($entero), "$entero");
                    printf($formato, '$decimal', gettype($decimal), "$decimal");
                    printf($formato, '$booleana', gettype($booleana), "$booleana");
                ?>
            </div>
            <div>
                <h2>Utilizando la función print_r</h2>
                <?php
                    echo'La variable $cadena es tipo '.gettype($cadena)." y su valor es ";
                    print_r($cadena);
                    echo'<br>La variable $entero es tipo '.gettype($entero)." y su valor es ";
                    print_r($entero);
                    echo'<br>La variable $decimal es tipo '.gettype($decimal)." y su valor es ";
                    print_r($decimal);
                    echo'<br>La variable $booleana es tipo '.gettype($booleana)." y su valor es ";
                    print_r($booleana);
                ?>
            </div>
            <div>
                <h2>Utilizando la función var_dump</h2>
                <?php
                    echo'La variable $cadena es tipo '.gettype($cadena)." y su valor es ";
                    var_dump($cadena);
                    echo'<br>La variable $entero es tipo '.gettype($entero)." y su valor es ";
                    var_dump($entero);
                    echo'<br>La variable $decimal es tipo '.gettype($decimal)." y su valor es ";
                    var_dump($decimal);
                    echo'<br>La variable $booleana es tipo '.gettype($booleana)." y su valor es ";
                    var_dump($booleana);
                ?>
            </div>
        </main>
        <footer>
            <a href="../../index.php">Luis Ferreras</a>
            <a href="../../208DWESProyectoDWES/indexProyectoDWES.php">DWES</a>
            <a href="../indexProyectoTema3.php">Tema 3</a>
            <a href="https://github.com/LuisFerrGon/208DWESProyectoTema3">GitHub</a>
        </footer>
    </body>
</html>