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
            <h1>Ejercicio 25</h1>
        </header>
        <main>
            <?php
            /**
             * @author Luis Ferreras
             * @version 2024/10/23
             */
            //Librería de validación
            require_once '../core/231018libreriaValidacion.php';
            //Definición de variables
            define("OBLIGATORIO", 1);
            define("OPCIONAL", 0);
            $oHoy=new Datetime('now');
            // Estado de las respuestas
            $entradaOK=true;
            // Mensajes de error
            $aErrores=[
                'alfanumerico-Obl'=>null,
                'alfanumerico-Opc'=>null,
                'alfabetico-Obl'=>null,
                'alfabetico-Opc'=>null,
                'entero-Obl'=>null,
                'entero-Opc'=>null,
                'float-Obl'=>null,
                'float-Opc'=>null,
                'checkbox-Obl'=>null,
            ];
            //Respuesas enviadas
            $aRespuestas=[
                'alfanumerico-Obl'=>null,
                'alfanumerico-Opc'=>null,
                'alfabetico-Obl'=>null,
                'alfabetico-Opc'=>null,
                'entero-Obl'=>null,
                'entero-Opc'=>null,
                'float-Obl'=>null,
                'float-Opc'=>null,
                'radio'=>null,
                'checkbox-Obl'=>[],
                'checkbox-Opc'=>[],
            ];
            // Se ha dado a enviar
            if(isset($_REQUEST['enviar'])){
                //Se llena el array de los mesajes de error
                $aErrores['alfanumerico-Obl']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumerico-Obl'], 1000, 1, OBLIGATORIO);
                $aErrores['alfanumerico-Opc']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumerico-Opc'], 1000, 1, OPCIONAL);
                $aErrores['alfabetico-Obl']=validacionFormularios::comprobarAlfabetico($_REQUEST['alfabetico-Obl'], 1000, 1, OBLIGATORIO);
                $aErrores['alfabetico-Opc']=validacionFormularios::comprobarAlfabetico($_REQUEST['alfabetico-Opc'], 1000, 1, OPCIONAL);
                $aErrores['entero-Obl']=validacionFormularios::comprobarEntero($_REQUEST['entero-Obl'], PHP_INT_MAX, -PHP_INT_MAX, OBLIGATORIO);
                $aErrores['entero-Opc']=validacionFormularios::comprobarEntero($_REQUEST['entero-Opc'], PHP_INT_MAX, -PHP_INT_MAX, OPCIONAL);
                $aErrores['float-Obl']=validacionFormularios::comprobarFloat($_REQUEST['float-Obl'], PHP_FLOAT_MAX, -PHP_FLOAT_MAX, OBLIGATORIO);
                $aErrores['float-Opc']=validacionFormularios::comprobarFloat($_REQUEST['float-Opc'], PHP_FLOAT_MAX, -PHP_FLOAT_MAX, OPCIONAL);
                if(!isset($_REQUEST['checkboxA-Obl']) && !isset($_REQUEST['checkboxB-Obl']) && !isset($_REQUEST['checkboxC-Obl']) && !isset($_REQUEST['checkboxD-Obl']) && !isset($_REQUEST['checkboxE-Obl'])){
                    $aErrores['checkbox-Obl']=" Campo vacío.";
                };
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
                    'alfanumerico-Obl'=>$_REQUEST['alfanumerico-Obl'],
                    'alfanumerico-Opc'=>$_REQUEST['alfanumerico-Opc'],
                    'alfabetico-Obl'=>$_REQUEST['alfabetico-Obl'],
                    'alfabetico-Opc'=>$_REQUEST['alfabetico-Opc'],
                    'entero-Obl'=>$_REQUEST['entero-Obl'],
                    'entero-Opc'=>$_REQUEST['entero-Opc'],
                    'float-Obl'=>$_REQUEST['float-Obl'],
                    'float-Opc'=>$_REQUEST['float-Opc'],
                    'radio'=>$_REQUEST['radio'],
                    'checkbox-Opc'=>[],
                ];
                $checkObl=[
                    isset($_REQUEST['checkboxA-Obl'])?$_REQUEST['checkboxA-Obl']:null,
                    isset($_REQUEST['checkboxB-Obl'])?$_REQUEST['checkboxB-Obl']:null,
                    isset($_REQUEST['checkboxC-Obl'])?$_REQUEST['checkboxC-Obl']:null,
                    isset($_REQUEST['checkboxD-Obl'])?$_REQUEST['checkboxD-Obl']:null,
                    isset($_REQUEST['checkboxE-Obl'])?$_REQUEST['checkboxE-Obl']:null,
                ];
                foreach($checkObl as $respuesta){
                    if($respuesta!=null){
                        array_push($aRespuestas['checkbox-Obl'], $respuesta);
                    };
                };
                //Se muestran las respuestas
                echo "<div>";
                echo "Alfanumerico Obligatorio: ".$aRespuestas['alfanumerico-Obl']."<br/>";
                echo (!empty($aRespuestas['alfanumerico-Opc'])?"Alfanumerico Opcional: ".$aRespuestas['alfanumerico-Opc']."<br/>":null);
                echo "Alfabetico Obligatorio: ".$aRespuestas['alfabetico-Obl']."<br/>";
                echo (!empty($aRespuestas['alfabetico-Opc'])?"Alfabetico Opcional: ".$aRespuestas['alfabetico-Opc']."<br/>":null);
                echo "Entero Obligatorio: ".$aRespuestas['entero-Obl']."<br/>";
                echo (!empty($aRespuestas['entero-Opc'])?"Entero Opcional: ".$aRespuestas['entero-Opc']."<br/>":null);
                echo "Float Obligatorio: ".$aRespuestas['float-Obl']."<br/>";
                echo (!empty($aRespuestas['float-Opc'])?"Float Opcional: ".$aRespuestas['float-Opc']."<br/>":null);
                echo "Radio: ".$aRespuestas['radio']."<br/>";
                echo "Checkbox obligatorio: ".implode(", ", $aRespuestas['checkbox-Obl'])."<br/>";
                echo "</div>";
            }else{// No se ha enviado?>
                <form name="ej27" action="<?php echo $_SERVER['PHP_SELF'];// A si mismo?>" method="post" novalidate>
                    <table>
                        <tbody>
                            <tr>
                                <td>Alfanumerico Obligatorio:</td>
                                <td><input type="text" name="alfanumerico-Obl" id="alfanumerico-Obl" class="obligatorio" value="<?php echo(isset($_REQUEST['alfanumerico-Obl'])?$_REQUEST['alfanumerico-Obl']:'');?>" required/></td>
                                <?php echo(!empty($aErrores['alfanumerico-Obl'])?"<td class='error'>".$aErrores['alfanumerico-Obl']."</td>":null);?>
                            </tr>
                            <tr>
                                <td>Alfanumerico Opcional:</td>
                                <td><input type="text" name="alfanumerico-Opc" id="alfanumerico-Opc" class="opcional" value="<?php echo(isset($_REQUEST['alfanumerico-Opc'])?$_REQUEST['alfanumerico-Opc']:'');?>"/></td>
                                <?php echo(!empty($aErrores['alfanumerico-Opc'])?"<td class='error'>".$aErrores['alfanumerico-Opc']."</td>":null);?>
                            </tr>
                            <tr>
                                <td>Alfabetico Obligatorio:</td>
                                <td><input type="text" name="alfabetico-Obl" id="alfabetico-Obl" class="obligatorio" value="<?php echo(isset($_REQUEST['alfabetico-Obl'])?$_REQUEST['alfabetico-Obl']:'');?>" required/></td>
                                <?php echo(!empty($aErrores['alfabetico-Obl'])?"<td class='error'>".$aErrores['alfabetico-Obl']."</td>":null);?>
                            </tr>
                            <tr>
                                <td>Alfabetico Opcional:</td>
                                <td><input type="text" name="alfabetico-Opc" id="alfabetico-Opc" class="opcional" value="<?php echo(isset($_REQUEST['alfabetico-Opc'])?$_REQUEST['alfabetico-Opc']:'');?>"/></td>
                                <?php echo(!empty($aErrores['alfabetico-Opc'])?"<td class='error'>".$aErrores['alfabetico-Opc']."</td>":null);?>
                            </tr>
                            <tr>
                                <td>Entero Obligatorio:</td>
                                <td><input type="number" name="entero-Obl" id="entero-Obl" class="obligatorio" value="<?php echo(isset($_REQUEST['entero-Obl'])?$_REQUEST['entero-Obl']:'');?>" required/></td>
                                <?php echo(!empty($aErrores['entero-Obl'])?"<td class='error'>".$aErrores['entero-Obl']."</td>":null);?>
                            </tr>
                            <tr>
                                <td>Entero Opcional:</td>
                                <td><input type="number" name="entero-Opc" id="entero-Opc" class="opcional" value="<?php echo(isset($_REQUEST['entero-Opc'])?$_REQUEST['entero-Opc']:'');?>"/></td>
                                <?php echo(!empty($aErrores['entero-Opc'])?"<td class='error'>".$aErrores['entero-Opc']."</td>":null);?>
                            </tr>
                            <tr>
                                <td>Float Obligatorio:</td>
                                <td><input type="number" name="float-Obl" id="float-Obl" class="obligatorio" value="<?php echo(isset($_REQUEST['float-Obl'])?$_REQUEST['float-Obl']:'');?>" placeholder="1.2" step="0.1" required/></td>
                                <?php echo(!empty($aErrores['float-Obl'])?"<td class='error'>".$aErrores['float-Obl']."</td>":null);?>
                            </tr>
                            <tr>
                                <td>Float Opcional:</td>
                                <td><input type="number" name="float-Opc" id="float-Opc" class="opcional" value="<?php echo(isset($_REQUEST['float-Opc'])?$_REQUEST['float-Opc']:'');?>" placeholder="1.2" step="0.1"/></td>
                                <?php echo(!empty($aErrores['float-Opc'])?"<td class='error'>".$aErrores['float-Opc']."</td>":null);?>
                            </tr>
                            <tr>
                                <td>Radio</td>
                                <td>
                                    <input type="radio" id="radio" name="radio" value="1" class="obligatorio" required <?php echo((!isset($_REQUEST['radio']))||(isset($_REQUEST['radio']) && $_REQUEST['radio']=='1')?'checked':null)?>>
                                    <label for="1">1</label><br>
                                    <input type="radio" id="radio" name="radio" value="2" class="obligatorio" required <?php echo((isset($_REQUEST['radio']) && $_REQUEST['radio']=='2')?'checked':null)?>>
                                    <label for="2">2</label><br>
                                    <input type="radio" id="radio" name="radio" value="3" class="obligatorio" required <?php echo((isset($_REQUEST['radio']) && $_REQUEST['radio']=='3')?'checked':null)?>>
                                    <label for="3">3</label><br>
                                    <input type="radio" id="radio" name="radio" value="4" class="obligatorio" required <?php echo((isset($_REQUEST['radio']) && $_REQUEST['radio']=='4')?'checked':null)?>>
                                    <label for="4">4</label><br>
                                    <input type="radio" id="radio" name="radio" value="5" class="obligatorio" required <?php echo((isset($_REQUEST['radio']) && $_REQUEST['radio']=='5')?'checked':null)?>>
                                    <label for="5">5</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Checkbox Obligatorio</td>
                                <td>
                                    <input type="checkbox" id="checkboxA-Obl" name="checkboxA-Obl" value="A" class="obligatorio" <?php echo(isset($_REQUEST['checkboxA-Obl'])?'checked':null)?>>
                                    <label for="A">A</label><br>
                                    <input type="checkbox" id="checkboxB-Obl" name="checkboxB-Obl" value="B" class="obligatorio" <?php echo(isset($_REQUEST['checkboxB-Obl'])?'checked':null)?>>
                                    <label for="B">B</label><br>
                                    <input type="checkbox" id="checkboxC-Obl" name="checkboxC-Obl" value="C" class="obligatorio" <?php echo(isset($_REQUEST['checkboxC-Obl'])?'checked':null)?>>
                                    <label for="C">C</label><br>
                                    <input type="checkbox" id="checkboxD-Obl" name="checkboxD-Obl" value="D" class="obligatorio" <?php echo(isset($_REQUEST['checkboxD-Obl'])?'checked':null)?>>
                                    <label for="D">D</label><br>
                                    <input type="checkbox" id="checkboxE-Obl" name="checkboxE-Obl" value="E" class="obligatorio" <?php echo(isset($_REQUEST['checkboxE-Obl'])?'checked':null)?>>
                                    <label for="E">E</label>
                                </td>
                                <?php echo(!empty($aErrores['checkbox-Obl'])?"<td class='error'>".$aErrores['checkbox-Obl']."</td>":null);?>
                            </tr>
                            <tr>
                                <td>Checkbox Opcional</td>
                                <td>
                                    <input type="checkbox" id="checkboxA-Opc" name="checkboxA-Opc" value="A" class="opcional" <?php echo(isset($_REQUEST['checkboxA-Opc'])?'checked':null)?>>
                                    <label for="A">A</label><br>
                                    <input type="checkbox" id="checkboxB-Opc" name="checkboxB-Opc" value="B" class="opcional" <?php echo(isset($_REQUEST['checkboxB-Opc'])?'checked':null)?>>
                                    <label for="B">B</label><br>
                                    <input type="checkbox" id="checkboxC-Opc" name="checkboxC-Opc" value="C" class="opcional" <?php echo(isset($_REQUEST['checkboxC-Opc'])?'checked':null)?>>
                                    <label for="C">C</label><br>
                                    <input type="checkbox" id="checkboxD-Opc" name="checkboxD-Opc" value="D" class="opcional" <?php echo(isset($_REQUEST['checkboxD-Opc'])?'checked':null)?>>
                                    <label for="D">D</label><br>
                                    <input type="checkbox" id="checkboxE-Opc" name="checkboxE-Opc" value="E" class="opcional" <?php echo(isset($_REQUEST['checkboxE-Opc'])?'checked':null)?>>
                                    <label for="E">E</label>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="boton" colspan="3"><input type="submit" name="enviar" id="enviar" style="margin: 5px auto"></td>
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