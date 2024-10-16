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
             * @version 2024/10/16
             */
            require_once '../core/231018libreriaValidacion.php';
            $entradaOK=true; // Estado de las respuestas
            $aErrores=[
                'nombreApellidos'=>'',
                'nacimiento'=>''
            ];// Mensajes de error
            $aRespuestas=[
                'nombreApellidos'=>'',
                'nacimiento'=>''
            ];//Respuesas enviadas
            if(isset($_REQUEST['enviar'])){// Se ha enviado el formulario
                $aErrores['nombreApellidos']=validacionFormularios::comprobarAlfabetico($_REQUEST['nombreApellidos'], 1000, 1, 1);
                $aErrores['nacimiento']=validacionFormularios::validarFecha(date_format(date_create_from_format("d/m/Y", $_REQUEST['nacimiento']), "Y-m-d"), '01/01/2024', '01/01/1950', 1);
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
                echo"Fecha de nacimiento: ".$aRespuestas['nacimiento'];
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
                    <input
                        type="text"
                        name="nacimiento" 
                        id="nacimiento"
                        class="obligatorio"
                        placeholder="Día/Mes/Año"
                        required
                        value="<?php echo(isset($_REQUEST['nacimiento']) && empty($aErrores['nacimiento'])?(date_format(date_create_from_format("d/m/Y", $_REQUEST['nacimiento']), "d/m/Y")):'')?>"
                    /><!--En caso de que se pusiera una fecha no existente, la cambie. Ej 52/01/2005 pasa a ser 21/02/2005-->
                    <?php
                        if(!empty($aErrores['nacimiento'])){
                            echo "<span class='error'>".$aErrores['nacimiento']."</span>";
                        };
                    ?><br/>
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