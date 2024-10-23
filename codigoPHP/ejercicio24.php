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
             * @version 2024/10/22
             */
            //Librería de validación
            require_once '../core/231018libreriaValidacion.php';
            //Definición de variables
            define("OBLIGATORIO", 1);
            $oHoy=new Datetime('now');
            // Estado de las respuestas
            $entradaOK=true;
            // Mensajes de error
            $aErrores=[
                'nombreApellidos'=>null,
                'nacimiento'=>null,
                'clima'=>null,
                'contrasena'=>null,
                'dni'=>null,
                'numFavorito'=>null
            ];
            //Respuesas enviadas
            $aRespuestas=[
                'nombreApellidos'=>null,
                'nacimiento'=>null,
                'clima'=>null,
                'contrasena'=>null,
                'dni'=>null,
                'numFavorito'=>null,
                'hoy'=>null
            ];
            // Se ha dado a enviar
            if(isset($_REQUEST['enviar'])){
                //Se llena el array de los mesajes de error
                $aErrores['nombreApellidos']=validacionFormularios::comprobarAlfabetico($_REQUEST['nombreApellidos'], 1000, 1, OBLIGATORIO);
                $aErrores['nacimiento']=validacionFormularios::validarFecha($_REQUEST['nacimiento'], $oHoy->format('m/d/Y'), '01/01/1970', OBLIGATORIO);
                $aErrores['clima']= validacionFormularios::comprobarAlfabetico($_REQUEST['clima']);
                $aErrores['contrasena']= validacionFormularios::validarPassword($_REQUEST['contrasena'], 16, 2, 2, OBLIGATORIO);
                $aErrores['numFavorito']= validacionFormularios::comprobarEntero($_REQUEST['numFavorito'], PHP_INT_MAX, -PHP_INT_MAX, OBLIGATORIO);
                $aErrores['dni']= validacionFormularios::validarDni($_REQUEST['dni']);
                //Se comprueban las respuestas
                foreach ($aErrores as $key => $value) {
                    if($value!=null){
                        $_REQUEST[$key]=null;
                        $entradaOK=false;
                    }
                }
            }else{
                $entradaOK=false;
            }
            //Se ha enviado y las respuestas son correctas
            if($entradaOK){
                //Se llena el array de respuestas
                $aRespuestas=[
                    'nombreApellidos'=>$_REQUEST['nombreApellidos'],
                    'nacimiento'=>$_REQUEST['nacimiento'],
                    'clima'=>$_REQUEST['clima'],
                    'contrasena'=>$_REQUEST['contrasena'],
                    'dni'=>$_REQUEST['dni'],
                    'numFavorito'=>$_REQUEST['numFavorito'],
                    'hoy'=>$oHoy
                ];
                //Se muestran las respuestas
                echo"Nombre y apellidos: ".$aRespuestas['nombreApellidos']."<br/>";
                echo"Fecha de nacimiento: ".$aRespuestas['nacimiento']."<br/>";
                //Si esta vacio no se pone
                if(!empty($aRespuestas['clima'])){
                    echo"Clima: ".$aRespuestas['clima']."<br/>";
                };
                echo"Contraseña: ".$aRespuestas['contrasena']."<br>";
                if(!empty($aRespuestas['dni'])){
                    echo"DNI: ".$aRespuestas['dni']."<br/>";
                };
                echo"Número favorito: ".$aRespuestas['numFavorito']."<br>";
                echo"Fecha actual: ".$aRespuestas['hoy']->format('Y-m-d')."<br>";
            }else{// No se ha enviado?>
                <form name="ej24" action="<?php echo $_SERVER['PHP_SELF'];// A si mismo?>" method="post" novalidate>
                    <table>
                        <tbody>
                            <tr>
                                <td>Nombre y apellidos:</td>
                                <td><input type="text" name="nombreApellidos" id="nombreApellidos" class="obligatorio" value="<?php echo(isset($_REQUEST['nombreApellidos'])?$_REQUEST['nombreApellidos']:'');?>" required/></td>
                                <?php if(!empty($aErrores['nombreApellidos'])){
                                    echo "<td class='error'>".$aErrores['nombreApellidos']."</td>";
                                }?>
                            </tr>
                            <tr>
                                <td>Fecha de nacimiento:</td>
                                <td><input type="date" name="nacimiento" id="nacimiento" class="obligatorio" value="<?php echo(isset($_REQUEST['nacimiento'])?$_REQUEST['nacimiento']:'')?>" required/></td>
                                <?php if(!empty($aErrores['nacimiento'])){
                                    echo "<td class='error'>".$aErrores['nacimiento']."</td>";
                                }?>
                            </tr>
                            <tr>
                                <td>Clima:</td>
                                <td><input type="text" name="clima" id="clima" class="opcional" value="<?php echo(isset($_REQUEST['clima'])?$_REQUEST['clima']:'');?>"/></td>
                                <?php if(!empty($aErrores['clima'])){
                                    echo "<td class='error'>".$aErrores['clima']."</td>";
                                }?>
                            </tr>
                            <tr>
                                <td>Contraseña:</td>
                                <td><input type="password" name="contrasena" id="contrasena" class="obligatorio" value="<?php echo(isset($_REQUEST['contrasena'])?$_REQUEST['contrasena']:'');?>" required/></td>
                                <?php if(!empty($aErrores['contrasena'])){
                                    echo "<td class='error'>".$aErrores['contrasena']."</td>";
                                }?>
                            </tr>
                            <tr>
                                <td>DNI:</td>
                                <td><input type="text" name="dni" id="dni" class="opcional" value="<?php echo(isset($_REQUEST['dni'])?$_REQUEST['dni']:'');?>"/></td>
                                <?php if(!empty($aErrores['dni'])){
                                    echo "<td class='error'>".$aErrores['dni']."</td>";
                                }?>
                            </tr>
                            <tr>
                                <td>Número favorito:</td>
                                <td><input type="number" name="numFavorito" id="numFavorito" class="obligatorio" value="<?php echo(isset($_REQUEST['numFavorito'])?$_REQUEST['numFavorito']:'');?>" required/></td>
                                <?php if(!empty($aErrores['numFavorito'])){
                                    echo "<td class='error'>".$aErrores['numFavorito']."</td>";
                                }?>
                            </tr>
                            <tr>
                                <td>Fecha actual:</td>
                                <td><input type="text" name="hoy" id="hoy" class="invariable" value="<?php echo ($oHoy->format('Y-m-d'));?>" disabled/><br/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="boton"><input type="submit" name="enviar" id="enviar"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            <?php }?>
        </main>
        <footer>
            <a href="../../">Luis Ferreras</a>
            <a href="../../208DWESProyectoDWES/indexProyectoDWES.php">DWES</a>
            <a href="../indexProyectoTema3.php">Tema 3</a>
            <a href="https://github.com/LuisFerrGon/208DWESProyectoTema3">GitHub</a>
        </footer>
    </body>
</html>