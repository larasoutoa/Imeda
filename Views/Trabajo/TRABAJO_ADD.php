<?php
/**
 * Vista para añadir trabajos
 * Autor: Marcos -Grupo Imeda
 * Fecha inicio: 1/12/2017
 * Fecha fin: 1/12/2017
 */

    class TRABAJO_ADD {

        function __construct(){

            $this->pinta();

        }

    
    //función que contiene la vista
    function pinta(){
        //comprueba si hay un idioma en $_SESSION
        //si no, inserta el idioma español
        if(!isset($_SESSION['idioma'])){
            $_SESSION['idioma'] = 'SPANISH'; 
        }

        include_once '../Locales/Strings_index.php';

        $stringslang;//almacena idioma
        $lang;//almacena el idioma en uso

        //bucle foreach que comprueba que idioma esta seleccionado para cargar los strings
        foreach($stringslang as $lang){
            //Comprueba que idioma está seleccionado y carga el strings correspondiente
            if($lang == $_SESSION['idioma'])
                include_once '../Locales/Strings_'. $lang .'.php';
        }

        include '../Views/HEADER_View.php';

        new HEADER();
        ?>
            <section>
                    
            <div class="form">

            <?php

                ?>
                    <h3><?php echo $strings['Añadir Trabajo']; ?></h3>        
                <?php
               
            ?>
            
                <form class="form-basic" enctype="multipart/form-data" method="post" action="../Controllers/TRABAJO_Controller.php" onsubmit="return comprobarTrabajoADD()">

                    <div class="form-group">
                        <label class="form-label" for="idtrabajo"><?php echo $strings['Id Trabajo']; ?></label>
                        <input type="text" class="form-control" maxlength="6" size="6" onblur="messagedel(this);comprobarVacio(this); comprobarTexto(this,6); comprobarstartEspacio(this); comprobarEspacio(this)" id="idtrabajo1" name="IdTrabajo" placeholder="<?php echo $strings['Id Trabajo']; ?>" tabindex="1">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="nombretrabajo"><?php echo $strings['Nombre Trabajo']; ?></label>
                        <input type="text" class="form-control" maxlength="60" size="70" onblur="messagedel(this);comprobarVacio(this); comprobarTexto(this,60); comprobarstartEspacio(this);" id="nombretrabajo1" name="NombreTrabajo" placeholder="<?php echo $strings['Introduzca el Nombre del Trabajo']; ?>" tabindex="1" >
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="fechainitrabajo"><?php echo $strings['Fecha Inicio']; ?></label>
                        <input type="text" readonly class="tcal" onblur="delay(this)" id="fechaini1" name="FechaIniTrabajo" tabindex="1" >
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="fechafintrabajo"><?php echo $strings['Fecha Fin']; ?></label>
                        <input type="text" readonly class="tcal" onblur="delay(this)" id="fechafin1" name="FechaFinTrabajo" tabindex="1" >
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="porcentajenota"><?php echo $strings['Porcentaje Nota']; ?></label>
                        <input type="number" class="form-control" maxlength="2" size="2" step="1.0" onblur="messagedel(this);comprobarVacio(this); comprobarTexto(this,2); comprobarstartEspacio(this); comprobarEspacio(this)" id="porcentaje1" name="PorcentajeNota" tabindex="1" >
                    </div>  

                    <button name="action" value="ADD" type="submit" class="boton-env">
                        <img src="../Views/imgs/send.png" alt="">
                    </button>
                </form>

                

            </div>
            <footer>
                <h6><?php echo $strings['Date']; ?>: 24/11/2017</h6>
                <h6><?php echo $strings['Author']; ?>: IMEDA</h6>
            </footer>
            </section>

            <script src="../Views/js/tcal.js"></script>
            <?php include '../Views/js/Trabajo_validaciones.js'; ?>
            <script src="../Views/js/main.js"></script>
        </body>
        </html>
        
        <?php
    
        }
    }
?>