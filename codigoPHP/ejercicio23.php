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
            <h1>Ejercicio 23</h1>
        </header>
        <main>
            <?php
            /**
             * @author Luis Ferreras
             * @version 2024/10/17
             */
            require_once '../core/231018libreriaValidacion.php';
            $hoy=new Datetime('now');
            $entradaOK=true; // Estado de las respuestas
            $aErrores=[
                'nombreApellidos'=>null,
                'nacimiento'=>null,
                'clima'=>null
            ];// Mensajes de error
            if(isset($_REQUEST['enviar'])){// Se ha enviado el formulario
                $clima=$_REQUEST['clima'];
                $aErrores['nombreApellidos']=validacionFormularios::comprobarAlfabetico($_REQUEST['nombreApellidos'], 1000, 1, 1);
                $aErrores['nacimiento']=validacionFormularios::validarFecha($_REQUEST['nacimiento'], '01/01/2024', '01/01/1950', 1);
                if(!empty($clima)){
                    $aErrores['clima']= validacionFormularios::comprobarAlfabetico($clima);
                }
                //Se llena el array de los mesajes de error
                foreach ($aErrores as $value) {
                    if($value!= null){
                        $entradaOK=false;
                    }
                }
            }else{
                $entradaOK=false;
            }
            if($entradaOK){
                echo"Nombre y apellidos: ".$_REQUEST['nombreApellidos']."<br/>";
                echo"Fecha de naciemiento: ".$_REQUEST['nacimiento']."<br/>";
                if(!empty($clima)){
                    echo"Clima: ".$clima."<br/>";
                }
                echo"Fecha actual: ".$hoy->format('Y-m-d');
            }else{// No se ha enviado?>
                <form name="ej23" action="<?php echo $_SERVER['PHP_SELF'];// A si mismo?>" method="post" novalidate>
                    Nombre y apellidos: <input type="text" name="nombreApellidos" id="nombreApellidos" class="obligatorio" required/>
                    <?php if(!empty($aErrores['nombreApellidos'])){
                        echo "<span class='error'>".$aErrores['nombreApellidos']."</span>";
                    };?><br/>
                    Fecha de nacimiento: <input type="text" name="nacimiento" id="nacimiento" class="obligatorio" required/>
                    <?php if(!empty($aErrores['nacimiento'])){
                        echo "<span class='error'>".$aErrores['nacimiento']."</span>";
                    };?><br/>
                    Clima: <input type="text" name="clima" id="clima" class="opcional"/>
                    <?php if(!empty($aErrores['clima'])){
                        echo "<span class='error'>".$aErrores['clima']."</span>";
                    };?><br/>
                    Fecha actual: <input type="text" name="hoy" id="hoy" class="invariable" value="<?php echo ($hoy->format('Y-m-d'));?>" disabled/><br/>
                    <input type="submit" name="enviar" id="enviar">
                </form><?php
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
