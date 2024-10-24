<!DOCTYPE html>
<!--Autor: Luis Ferreras González-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Luis Ferreras</title>
        <link rel="stylesheet" type="text/css" href="../webroot/estilosEjercicios.css">
        <style>
            table{
                margin: 5px auto;
                border: 0.5px solid lightgrey;
                border-radius: 5px;
                background-color: #f0f0f5;
            }
            div{
                width: fit-content;
                margin: 5px auto;
                border: 0.5px solid lightgrey;
                border-radius: 5px;
                background-color: #f0f0f5;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Ejercicio 27</h1>
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
            $oHoy=new DateTime('now');
            // Estado de las respuestas
            $entradaOK=true;
            // Mensajes de error
            //text, date, radio, number, datalist, textarea
            $aErrores=[
                'nombreApellidos'=>null,
                'nacimiento'=>null,
                'sentimiento'=>null,
                'curso'=>null,
                'navidad'=>null,
                'texto'=>null
            ];
            //Respuesas enviadas
            $aRespuestas=[
                'nombreApellidos'=>null,
                'nacimiento'=>null,
                'sentimiento'=>null,
                'curso'=>null,
                'navidad'=>null,
                'texto'=>null
            ];
            // Se ha dado a enviar
            if(isset($_REQUEST['enviar'])){
                //Se llena el array de los mesajes de error
                $aErrores['nombreApellidos']=validacionFormularios::comprobarAlfabetico($_REQUEST['nombreApellidos'], 1000, 1, OBLIGATORIO);
                $aErrores['nacimiento']=validacionFormularios::validarFecha($_REQUEST['nacimiento'], $oHoy->format('m/d/Y'), '01/01/1970', OBLIGATORIO);
                $aErrores['curso']= validacionFormularios::comprobarEntero($_REQUEST['curso'], 10, 1, OBLIGATORIO);
                $aErrores['navidad']=validacionFormularios::validarElementoEnLista($_REQUEST['navidad'], ['Ni idea','Con la familia','De fiesta','Trabajando','Estudiando DWES']);
                $aErrores['texto']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['texto'], 1000, 1, OBLIGATORIO);
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
                    'nacimiento'=>date_create($_REQUEST['nacimiento']),
                    'sentimiento'=>$_REQUEST['sentimiento'],
                    'curso'=>$_REQUEST['curso'],
                    'navidad'=>$_REQUEST['navidad'],
                    'texto'=>$_REQUEST['texto']
                ];
                //Se muestran las respuestas
                echo(
                    "<div>Hoy ".$oHoy->format('d \d\e m \d\e\l Y').
                    " a las ".$oHoy->format('H:i:s').
                    ".<br>D.".$aRespuestas['nombreApellidos'].
                    " nacido hace ".$oHoy->diff($aRespuestas['nacimiento'])->y.
                    " años se siente ".$aRespuestas['sentimiento'].
                    ".<br>Valora su curso actual con ".$aRespuestas['curso'].
                    " sobre 10.<br>Estas navidades las dedicará a ".$aRespuestas['navidad'].
                    ".<br>Y, además, opina que:<br>".$aRespuestas['texto']."</div>"
                    );
            }else{// No se ha enviado?>
                <form name="ej27" action="<?php echo $_SERVER['PHP_SELF'];// A si mismo?>" method="post" novalidate>
                    <table>
                        <tbody>
                            <tr>
                                <td>Nombre y apellidos:</td>
                                <td><input type="text" name="nombreApellidos" id="nombreApellidos" class="obligatorio" value="<?php echo(isset($_REQUEST['nombreApellidos'])?$_REQUEST['nombreApellidos']:'');?>" required/></td>
                                <?php echo(!empty($aErrores['nombreApellidos'])?"<td class='error'>".$aErrores['nombreApellidos']."</td>":null);?>
                            </tr>
                            <tr>
                                <td>Fecha de nacimiento:</td>
                                <td><input type="date" name="nacimiento" id="nacimiento" class="obligatorio" value="<?php echo(isset($_REQUEST['nacimiento'])?$_REQUEST['nacimiento']:'')?>" required/></td>
                                <?php echo(!empty($aErrores['nacimiento'])?"<td class='error'>".$aErrores['nacimiento']."</td>":null);?>
                            </tr>
                            <tr>
                                <td>¿Cómo te sientes hoy?</td>
                                <td>
                                    <input type="radio" id="sentimiento" name="sentimiento" value="muy_mal" class="obligatorio" required <?php echo((isset($_REQUEST['sentimiento']) && $_REQUEST['sentimiento']=='muy_mal')?'checked':null)?>>
                                    <label for="muy_mal">MUY MAL</label><br>
                                    <input type="radio" id="sentimiento" name="sentimiento" value="mal" class="obligatorio" required <?php echo((isset($_REQUEST['sentimiento']) && $_REQUEST['sentimiento']=='mal')?'checked':null)?>>
                                    <label for="mal">MAL</label><br>
                                    <input type="radio" id="sentimiento" name="sentimiento" value="regular" class="obligatorio" required <?php echo((!isset($_REQUEST['sentimiento']))||(isset($_REQUEST['sentimiento']) && $_REQUEST['sentimiento']=='regular')?'checked':null)?>>
                                    <label for="regular">REGULAR</label><br>
                                    <input type="radio" id="sentimiento" name="sentimiento" value="bien" class="obligatorio" required <?php echo((isset($_REQUEST['sentimiento']) && $_REQUEST['sentimiento']=='bien')?'checked':null)?>>
                                    <label for="bien">BIEN</label><br>
                                    <input type="radio" id="sentimiento" name="sentimiento" value="muy_bien" class="obligatorio" required <?php echo((isset($_REQUEST['sentimiento']) && $_REQUEST['sentimiento']=='muy_bien')?'checked':null)?>>
                                    <label for="muy_bien">MUY BIEN</label>
                                </td>
                                <td style="width: 185px"></td>
                            </tr>
                            <tr>
                                <td>¿Cómo va el curso?</td>
                                <td><input type="number" name="curso" id="curso" class="obligatorio" value="<?php echo(isset($_REQUEST['curso'])?$_REQUEST['curso']:'');?>" placeholder="1-10" required/></td>
                                <?php echo(!empty($aErrores['curso'])?"<td class='error'>".$aErrores['curso']."</td>":null);?>
                            </tr>
                            <tr>
                                <td>¿Cómo se presentan las vacaciones de navidad?</td>
                                <td>
                                    <input list="opciones" id="navidad" name="navidad" class="obligatorio" value="<?php echo(isset($_REQUEST['navidad'])?$_REQUEST['navidad']:'');?>"required>
                                    <datalist id="opciones">
                                        <option value="Ni idea">
                                        <option value="Con la familia">
                                        <option value="De fiesta">
                                        <option value="Trabajando">
                                        <option value="Estudiando DWES">
                                    </datalist>
                                </td>
                                <?php echo(!empty($aErrores['navidad'])?"<td class='error'>".$aErrores['navidad']."</td>":null);?>
                            </tr>
                            <tr>
                                <td>Describe brevemente tu estado de ánimo</td>
                                <td colspan="2">
                                    <textarea id="texto" name="texto" class="obligatorio" maxlength="1000" minlength="1" required><?php echo(isset($_REQUEST['texto'])?$_REQUEST['texto']:'');?></textarea>
                                </td>
                                <td class='error' style="width: 89px"><?php echo(!empty($aErrores['texto'])?$aErrores['texto']:null);?></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td class="boton"><input type="submit" name="enviar" id="enviar"></td>
                            </tr>
                        </tfoot>
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