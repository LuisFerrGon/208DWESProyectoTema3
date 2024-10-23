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
            <h1>Ejercicio 24</h1>
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
                'alfanumericoObl'=>null,
                'alfanumericoOpc'=>null,
                'alfabeticoObl'=>null,
                'alfabeticoOpc'=>null,
                'enteroObl'=>null,
                'enteroOpc'=>null,
                'floatObl'=>null,
                'floatOpc'=>null,
            ];
            //Respuesas enviadas
            $aRespuestas=[
                'alfanumericoObl'=>null,
                'alfanumericoOpc'=>null,
                'alfabeticoObl'=>null,
                'alfabeticoOpc'=>null,
                'enteroObl'=>null,
                'enteroOpc'=>null,
                'floatObl'=>null,
                'floatOpc'=>null,
            ];
            // Se ha dado a enviar
            if(isset($_REQUEST['enviar'])){
                //Se llena el array de los mesajes de error
                $aErrores['alfanumericoObl']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoObl'], 1000, 1, OBLIGATORIO);
                $aErrores['alfanumericoOpc']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoOpc'], 1000, 1, OPCIONAL);
                $aErrores['alfabeticoObl']=validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoObl'], 1000, 1, OBLIGATORIO);
                $aErrores['alfabeticoOpc']=validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoOpc'], 1000, 1, OPCIONAL);
                $aErrores['enteroObl']=validacionFormularios::comprobarEntero($_REQUEST['enteroObl'], PHP_INT_MAX, -PHP_INT_MAX, OBLIGATORIO);
                $aErrores['enteroOpc']=validacionFormularios::comprobarEntero($_REQUEST['enteroOpc'], PHP_INT_MAX, -PHP_INT_MAX, OPCIONAL);
                $aErrores['floatObl']=validacionFormularios::comprobarFloat($_REQUEST['floatObl'], PHP_FLOAT_MAX, -PHP_FLOAT_MAX, OBLIGATORIO);
                $aErrores['floatOpc']=validacionFormularios::comprobarFloat($_REQUEST['floatOpc'], PHP_FLOAT_MAX, -PHP_FLOAT_MAX, OPCIONAL);
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
                    'alfanumericoObl'=>$_REQUEST['alfanumericoObl'],
                    'alfanumericoOpc'=>$_REQUEST['alfanumericoOpc'],
                    'alfabeticoObl'=>$_REQUEST['alfabeticoObl'],
                    'alfabeticoOpc'=>$_REQUEST['alfabeticoOpc'],
                    'enteroObl'=>$_REQUEST['enteroObl'],
                    'enteroOpc'=>$_REQUEST['enteroOpc'],
                    'floatObl'=>$_REQUEST['floatObl'],
                    'floatOpc'=>$_REQUEST['floatOpc'],
                ];
                //Se muestran las respuestas
                echo "<div>";
                echo "Alfanumerico Obligatorio: ".$aRespuestas['alfanumericoObl']."<br/>";
                echo (!empty($aRespuestas['alfanumericoOpc'])?"Alfanumerico Opcional: ".$aRespuestas['alfanumericoOpc']."<br/>":null);
                echo "Alfabetico Obligatorio: ".$aRespuestas['alfabeticoObl']."<br/>";
                echo (!empty($aRespuestas['alfabeticoOpc'])?"Alfabetico Opcional: ".$aRespuestas['alfabeticoOpc']."<br/>":null);
                echo "Entero Obligatorio: ".$aRespuestas['enteroObl']."<br/>";
                echo (!empty($aRespuestas['enteroOpc'])?"Entero Opcional: ".$aRespuestas['enteroOpc']."<br/>":null);
                echo "Float Obligatorio: ".$aRespuestas['floatObl']."<br/>";
                echo (!empty($aRespuestas['floatOpc'])?"Float Opcional: ".$aRespuestas['floatOpc']."<br/>":null);
                echo "</div>";
            }else{// No se ha enviado?>
                <form name="ej27" action="<?php echo $_SERVER['PHP_SELF'];// A si mismo?>" method="post" novalidate>
                    <table>
                        <tbody>
                            <tr>
                                <td>Alfanumerico Obligatorio:</td>
                                <td><input type="text" name="alfanumericoObl" id="alfanumericoObl" class="obligatorio" value="<?php echo(isset($_REQUEST['alfanumericoObl'])?$_REQUEST['alfanumericoObl']:'');?>" required/></td>
                                <?php echo(!empty($aErrores['alfanumericoObl'])?"<td class='error'>".$aErrores['alfanumericoObl']."</td>":null);?>
                            </tr>
                            <tr>
                                <td>Alfanumerico Opcional:</td>
                                <td><input type="text" name="alfanumericoOpc" id="alfanumericoOpc" class="opcional" value="<?php echo(isset($_REQUEST['alfanumericoOpc'])?$_REQUEST['alfanumericoOpc']:'');?>"/></td>
                                <?php echo(!empty($aErrores['alfanumericoOpc'])?"<td class='error'>".$aErrores['alfanumericoOpc']."</td>":null);?>
                            </tr>
                            <tr>
                                <td>Alfabetico Obligatorio:</td>
                                <td><input type="text" name="alfabeticoObl" id="alfabeticoObl" class="obligatorio" value="<?php echo(isset($_REQUEST['alfabeticoObl'])?$_REQUEST['alfabeticoObl']:'');?>" required/></td>
                                <?php echo(!empty($aErrores['alfabeticoObl'])?"<td class='error'>".$aErrores['alfabeticoObl']."</td>":null);?>
                            </tr>
                            <tr>
                                <td>Alfabetico Opcional:</td>
                                <td><input type="text" name="alfabeticoOpc" id="alfabeticoOpc" class="opcional" value="<?php echo(isset($_REQUEST['alfabeticoOpc'])?$_REQUEST['alfabeticoOpc']:'');?>"/></td>
                                <?php echo(!empty($aErrores['alfabeticoOpc'])?"<td class='error'>".$aErrores['alfabeticoOpc']."</td>":null);?>
                            </tr>
                            <tr>
                                <td>Entero Obligatorio:</td>
                                <td><input type="number" name="enteroObl" id="enteroObl" class="obligatorio" value="<?php echo(isset($_REQUEST['enteroObl'])?$_REQUEST['enteroObl']:'');?>" required/></td>
                                <?php echo(!empty($aErrores['enteroObl'])?"<td class='error'>".$aErrores['enteroObl']."</td>":null);?>
                            </tr>
                            <tr>
                                <td>Entero Opcional:</td>
                                <td><input type="number" name="enteroOpc" id="enteroOpc" class="opcional" value="<?php echo(isset($_REQUEST['enteroOpc'])?$_REQUEST['enteroOpc']:'');?>"/></td>
                                <?php echo(!empty($aErrores['enteroOpc'])?"<td class='error'>".$aErrores['enteroOpc']."</td>":null);?>
                            </tr>
                            <tr>
                                <td>Float Obligatorio:</td>
                                <td><input type="number" name="floatObl" id="floatObl" class="obligatorio" value="<?php echo(isset($_REQUEST['floatObl'])?$_REQUEST['floatObl']:'');?>" required/></td>
                                <?php echo(!empty($aErrores['floatObl'])?"<td class='error'>".$aErrores['floatObl']."</td>":null);?>
                            </tr>
                            <tr>
                                <td>Float Opcional:</td>
                                <td><input type="number" name="floatOpc" id="floatOpc" class="opcional" value="<?php echo(isset($_REQUEST['floatOpc'])?$_REQUEST['floatOpc']:'');?>"/></td>
                                <?php echo(!empty($aErrores['floatOpc'])?"<td class='error'>".$aErrores['floatOpc']."</td>":null);?>
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