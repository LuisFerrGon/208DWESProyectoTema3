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
            <h1>Ejercicio 24</h1>
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
            $aRespuestas=[
                'nombreApellidos'=>null,
                'nacimiento'=>null,
                'clima'=>null
            ];//Respuesas enviadas
            if(isset($_REQUEST['enviar'])){// Se ha enviado el formulario
                $aErrores['nombreApellidos']=validacionFormularios::comprobarAlfabetico($_REQUEST['nombreApellidos'], 1000, 1, 1);
                $aErrores['nacimiento']=validacionFormularios::validarFecha(date_format(date_create($_REQUEST['nacimiento']), "Y-m-d"), $hoy->format('m/d/Y'), '01/01/1970', 1);
                $aErrores['clima']= validacionFormularios::comprobarAlfabetico($_REQUEST['clima']);
                //Se llena el array de los mesajes de error
                foreach ($aErrores as $key => $value) {
                    if($value!=null){
                        $entradaOK=false;
                    }
                }
            }else{
                $entradaOK=false;
            }
            if($entradaOK){
                foreach ($aRespuestas as $key => $value) {
                    if(!empty($_REQUEST[$key])){
                        $aRespuestas[$key]=$_REQUEST[$key];
                    }
                }
                echo"Nombre y apellidos: ".$aRespuestas['nombreApellidos']."<br/>";
                echo"Fecha de nacimiento: ".$aRespuestas['nacimiento']."<br/>";
                if(!empty($aRespuestas['clima'])){
                    echo"Clima: ".$aRespuestas['clima']."<br/>";
                }
                echo"Fecha actual: ".$hoy->format('Y-m-d');
            }else{// No se ha enviado?>
            <form name="ej24" action="<?php echo $_SERVER['PHP_SELF'];// A si mismo?>" method="post" novalidate>
                    Nombre y apellidos:
                    <input type="text" name="nombreApellidos" id="nombreApellidos" class="obligatorio" value="<?php echo(isset($_REQUEST['nombreApellidos']) && empty($aErrores['nombreApellidos'])?$_REQUEST['nombreApellidos']:'');?>" required/>
                    <?php
                        if(!empty($aErrores['nombreApellidos'])){
                            echo "<span class='error'>".$aErrores['nombreApellidos']."</span>";
                        };
                    ?><br/>
                    Fecha de nacimiento: 
                    <input type="date" name="nacimiento" id="nacimiento" class="obligatorio" value="<?php echo(isset($_REQUEST['nacimiento']) && empty($aErrores['nacimiento'])?$_REQUEST['nacimiento']:'')?>" required/>
                    <?php
                        if(!empty($aErrores['nacimiento'])){
                            echo "<span class='error'>".$aErrores['nacimiento']."</span>";
                        };
                    ?><br/>
                    Clima: <input type="text" name="clima" id="clima" class="opcional" value="<?php echo(isset($_REQUEST['clima']) && empty($aErrores['clima'])?$_REQUEST['clima']:'');?>"/>
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