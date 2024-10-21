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
            //Librería de validación
            require_once '../core/231018libreriaValidacion.php';
            //Definición de variables
            define("OBLIGATORIO", 1);
            $hoy=new Datetime('now');
            // Estado de las respuestas
            $entradaOK=true;
            // Mensajes de error
            $aErrores=[
                'nombreApellidos'=>null,
                'nacimiento'=>null,
                'clima'=>null
            ];
            //Respuesas enviadas
            $aRespuestas=[
                'nombreApellidos'=>null,
                'nacimiento'=>null,
                'clima'=>null
            ];
            // Se ha dado a enviar
            if(isset($_REQUEST['enviar'])){
                //Se llena el array de los mesajes de error
                $aErrores['nombreApellidos']=validacionFormularios::comprobarAlfabetico($_REQUEST['nombreApellidos'], 1000, 1, OBLIGATORIO);
                $aErrores['nacimiento']=validacionFormularios::validarFecha($_REQUEST['nacimiento'], $hoy->format('m/d/Y'), '01/01/1970', OBLIGATORIO);
                $aErrores['clima']= validacionFormularios::comprobarAlfabetico($_REQUEST['clima']);
                //Se comprueban las respuestas
                foreach ($aErrores as $key => $value) {
                    if($value!=null){
                        $entradaOK=false;
                    }
                }
            }else{
                $entradaOK=false;
            }
            //Se ha enviado y las respuestas son correctas
            if($entradaOK){
                //Se llena el array de respuestas
                foreach ($aRespuestas as $key => $value) {
                    $aRespuestas[$key]=$_REQUEST[$key];
                }
                echo"Nombre y apellidos: ".$aRespuestas['nombreApellidos']."<br/>";
                echo"Fecha de nacimiento: ".$aRespuestas['nacimiento']."<br/>";
                //Si esta vaio no se pone
                if(!empty($aRespuestas['clima'])){
                    echo"Clima: ".$aRespuestas['clima']."<br/>";
                }
                echo"Fecha actual: ".$hoy->format('Y-m-d');
            }else{// No se ha enviado?>
                <form name="ej24" action="<?php echo $_SERVER['PHP_SELF'];// A si mismo?>" method="post" novalidate>
                    <table>
                        <tbody>
                            <tr>
                                <td>Nombre y apellidos:</td>
                                <td><input type="text" name="nombreApellidos" id="nombreApellidos" class="obligatorio" value="<?php echo(isset($_REQUEST['nombreApellidos']) && empty($aErrores['nombreApellidos'])?$_REQUEST['nombreApellidos']:'');?>" required/></td>
                                <?php if(!empty($aErrores['nombreApellidos'])){
                                    echo "<td class='error'>".$aErrores['nombreApellidos']."</td>";
                                }?>
                            </tr>
                            <tr>
                                <td>Fecha de nacimiento:</td>
                                <td><input type="date" name="nacimiento" id="nacimiento" class="obligatorio" value="<?php echo(isset($_REQUEST['nacimiento']) && empty($aErrores['nacimiento'])?$_REQUEST['nacimiento']:'')?>" required/></td>
                                <?php if(!empty($aErrores['nacimiento'])){
                                    echo "<span class='error'>".$aErrores['nacimiento']."</span>";
                                }?>
                            </tr>
                            <tr>
                                <td>Clima:</td>
                                <td><input type="text" name="clima" id="clima" class="opcional" value="<?php echo(isset($_REQUEST['clima']) && empty($aErrores['clima'])?$_REQUEST['clima']:'');?>"/></td>
                                <?php if(!empty($aErrores['clima'])){
                                    echo "<span class='error'>".$aErrores['clima']."</span>";
                                }?>
                            </tr>
                            <tr>
                                <td>Fecha actual:</td>
                                <td><input type="text" name="hoy" id="hoy" class="invariable" value="<?php echo ($hoy->format('Y-m-d'));?>" disabled/><br/></td>
                            </tr>
                            <tr>
                                <td><input type="submit" name="enviar" id="enviar"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            <?php
            
                                }
            ?>
        </main>
        <footer>
            <a href="../../">Luis Ferreras</a>
            <a href="../../208DWESProyectoDWES/indexProyectoDWES.php">DWES</a>
            <a href="../indexProyectoTema3.php">Tema 3</a>
            <a href="https://github.com/LuisFerrGon/208DWESProyectoTema3">GitHub</a>
        </footer>
    </body>
</html>