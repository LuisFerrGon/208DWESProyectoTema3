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
            <h1>Ejercicio 23</h1>
        </header>
        <main>
            <?php
            /*
             * @author Luis Ferreras
             * @version 2024/10/09
             */
            require_once '../core/231018libreriaValidacion.php';
                $entradaBien=true; // Estado de las respuestas
                /*$errores=[
                    nombreApellidos=>"",
                    naciminento=>"",
                    sentimiento=>"",
                    curso=>"",
                ];// Mensajes de error
                $respuestas=[
                    nombreApellidos=>"",
                    naciminento=>"",
                    sentimiento=>"",
                    curso=>"",
                ];// Respuestas correctas*/
                if(isset($_REQUEST['enviar'])){// Se ha enviado el formulario
                    echo"Nombre y apellidos: ".$_REQUEST['nombreApellidos']."<br/>";
                    echo"Fecha de naciemiento: ".$_REQUEST['nacimiento'];
                }else{// No se ha enviado?>
                    <form name="ej23" action="<?php echo $_SERVER['PHP_SELF'];// A si mismo?>" method="post">
                        Nombre y apellidos: <input type="text" name="nombreApellidos" id="nombreApellidos" required/><br/>
                        Fecha de nacimiento: <input type="text" name="naciminento" id="nacimiento" required/><br/>
                        <!--¿Cómo te sientes hoy?<br/>
                            <input type="radio" name="sentimiento" id="muybien"/>
                                <label for="muybien">Muy bien</label><br/>
                            <input type="radio" name="sentimiento" id="bien"/>
                                <label for="bien">Bien</label><br/>
                            <input type="radio" name="sentimiento" id="regular" checked="true"/>
                                <label for="regular">Regular</label><br/>
                            <input type="radio" name="sentimiento" id="mal"/>
                                <label for="mal">Mal</label><br/>
                            <input type="radio" name="sentimiento" id="muymal"/>
                                <label for="muymal">Muy mal</label><br/>
                        ¿Cómo va el curso?: <input type="number" name="curso" id="curso" min="0" max="10"/>--><br/>
                        <input type="submit" name="enviar" id="enviar">
                    </form><?php
                };
                if($entradaBien){
                    
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