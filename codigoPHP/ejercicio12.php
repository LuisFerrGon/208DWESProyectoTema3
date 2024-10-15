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
            <h1>Ejercicio 12</h1>
        </header>
        <main>
            <?php
                if(!empty($_SERVER)){
                    echo '<h2>$_SERVER</h2>';
                    foreach($_SERVER as $key=>$value){
                        print_r($key."=>".$value."<br>");
                    }
                }
                if(!empty($_REQUEST)){
                    echo '<h2>$_REQUEST</h2>';
                    foreach($_REQUEST as $key=>$value){
                        print_r($key."=>".$value."<br>");
                    }
                }
                if(!empty($_GET)){
                    echo '<h2>$_GET</h2>';
                    foreach($_GET as $key=>$value){
                        print_r($key."=>".$value."<br>");
                    }
                }
                if(!empty($_POST)){
                    echo '<h2>$_POST</h2>';
                    foreach($_POST as $key=>$value){
                        print_r($key."=>".$value."<br>");
                    }
                }
                if(!empty($_COOKIE)){
                    echo '<h2>$_COOKIE</h2>';
                    foreach($_COOKIE as $key=>$value){
                        print_r($key."=>".$value."<br>");
                    }
                }
                if(!empty($_ENV)){
                    echo '<h2>$_ENV</h2>';
                    foreach($_ENV as $key=>$value){
                        print_r($key."=>".$value."<br>");
                    }
                }
                if(!empty($_FILES)){
                    echo '<h2>$_FILES</h2>';
                    foreach($_FILES as $key=>$value){
                        print_r($key."=>".$value."<br>");
                    }
                }
                if(!empty($_SESSION)){
                    echo '<h2>$_SESSION</h2>';
                    foreach($_SESSION as $key=>$value){
                        print_r($key."=>".$value."<br>");
                    }
                }
                if(!empty($GLOBAL)){
                    echo '<h2>$GLOBAL</h2>';
                    foreach($GLOBAL as $key=>$value){
                        print_r($key."=>".$value."<br>");
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