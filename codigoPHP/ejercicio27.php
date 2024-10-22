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
            <h1>Ejercicio 27</h1>
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
            $oHoy=new Datetime('now');
            // Estado de las respuestas
            $entradaOK=true;
            // Mensajes de error
            //text, date, radio, number, datalist, textarea
            $aErrores=[
                'nombreApellidos'=>null,
                'nacimiento'=>null,
                'curso'=>null
            ];
            //Respuesas enviadas
            $aRespuestas=[
                'nombreApellidos'=>null,
                'nacimiento'=>null,
                
                'curso'=>null
            ];
            // Se ha dado a enviar
            if(isset($_REQUEST['enviar'])){
                //Se llena el array de los mesajes de error
                $aErrores['nombreApellidos']=validacionFormularios::comprobarAlfabetico($_REQUEST['nombreApellidos'], 1000, 1, OBLIGATORIO);
                $aErrores['nacimiento']=validacionFormularios::validarFecha($_REQUEST['nacimiento'], $oHoy->format('m/d/Y'), '01/01/1970', OBLIGATORIO);
                $aErrores['curso']= validacionFormularios::comprobarEntero($_REQUEST['curso'], PHP_INT_MAX, -PHP_INT_MAX, OBLIGATORIO);
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
                    'curso'=>$_REQUEST['curso']
                ];
                //Se muestran las respuestas
                echo"Nombre y apellidos: ".$aRespuestas['nombreApellidos']."<br/>";
                echo"Fecha de nacimiento: ".$aRespuestas['nacimiento']."<br/>";
                echo"Número favorito: ".$aRespuestas['curso']."<br>";
            }else{// No se ha enviado?>
                <form name="ej27" action="<?php echo $_SERVER['PHP_SELF'];// A si mismo?>" method="post" novalidate>
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
                                <td>¿Cómo te sientes hoy?</td>
                                <td>
                                    <input type="radio" id="muy_mal" name="fav_language" value="muy_mal" class="obligatorio" required>
                                    <label for="muy_mal">MUY MAL</label><br>
                                    <input type="radio" id="mal" name="fav_language" value="mal" class="obligatorio" required>
                                    <label for="mal">MAL</label><br>
                                    <input type="radio" id="regular" name="fav_language" value="regular" class="obligatorio" required checked>
                                    <label for="regular">REGULAR</label><br>
                                    <input type="radio" id="bien" name="fav_language" value="bien" class="obligatorio" required>
                                    <label for="bien">BIEN</label><br>
                                    <input type="radio" id="muy_bien" name="fav_language" value="muy_bien" class="obligatorio" required>
                                    <label for="muy_bien">MUY BIEN</label>
                                </td>
                                <?php if(!empty($aErrores['curso'])){
                                    echo "<td class='error'>".$aErrores['curso']."</td>";
                                }?>
                            </tr>
                            <tr>
                                <td>Número favorito:</td>
                                <td><input type="number" name="curso" id="curso" class="obligatorio" value="<?php echo(isset($_REQUEST['curso'])?$_REQUEST['curso']:'');?>" required/></td>
                                <?php if(!empty($aErrores['curso'])){
                                    echo "<td class='error'>".$aErrores['curso']."</td>";
                                }?>
                            </tr>
                            <tr>
                                <td>¿Cómo te sientes hoy?</td>
                                <td>
                                    <input list="opciones" id="navidad" name="navidad">
                                    <datalist id="opciones">
                                        <option value="Ni idea">
                                        <option value="Con la familia">
                                        <option value="De fiesta">
                                        <option value="Trabajando">
                                        <option value="Estuiando DWES">
                                    </datalist>
                                </td>
                                <?php if(!empty($aErrores['curso'])){
                                    echo "<td class='error'>".$aErrores['curso']."</td>";
                                }?>
                            </tr>
                            <tr>
                                <td>¿Cómo te sientes hoy?</td>
                                <td><textarea></textarea></td>
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