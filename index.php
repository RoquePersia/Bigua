<?php include ("cabecera.php") ?>
<?php include ("conexion.php") ?>
<?php include ("consultas.php") ?>
<?php 
header('Content-Type: text/html; charset=UTF-8');
?>

<script>
            function printContent(el) {
            
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
    }
</script>


<?php 
    $objConexion = new conexion();
    $fecha = date("Y-m-d");
    if($_POST){
        $action=(isset($_POST["date-search"]) ? $_POST["date-search"] : "");
        if($action == "buscar-por-dia") {
            $fecha=$_POST["fecha"];
        
        }


    }

    setlocale(LC_TIME, 'es_ES.UTF-8');
    $newDate = date("d-m-Y", strtotime($fecha));
    $mesDesc = strftime("%A, %e de %B de %Y", strtotime($newDate));
    $reemplazar = array("/mi�rcoles/","/s�bado/");
    $por = array("miercoles","sabado");
    $newMesDesc = preg_replace ($reemplazar, $por, $mesDesc);
    $fmt = new IntlDateFormatter(
        'es_ES',
        IntlDateFormatter::FULL,
        IntlDateFormatter::FULL,
        'America/Buenos_Aires',
        IntlDateFormatter::GREGORIAN
    );
    echo 'First Formatted output is ' . $fmt->format(0);
    

    

    $ingresos=$objConexion->consultar("SELECT * FROM ingreso INNER JOIN persona ON ingreso.dni=persona.dni INNER JOIN barcaza ON ingreso.matricula=barcaza.matricula WHERE fecha = '$fecha';");
    

   
?>
    <div class="container my-4" id="todo">
        <div class="py-5 px-1" style="background-color: none;">
            <div class="container">
                <div class="container" style="display: flex;">
                    <h1 class="display-3"> <strong>El Biguá</strong> </h1>
            
                </div>
                
                <h3 class="lead px-3"><strong> Sistema de gestión de barcazas</strong> | <?php echo $newMesDesc;?></h3>
                <hr class="my-2">
                <div class="container" style="align-items: start; display: flex;">
                    <form action="index.php" method="post" style=" display: flex;">
                        <input class="form-control" type="date" name="fecha">
                        <button class="btn btn-warning" name="date-search" type="submit" value="buscar-por-dia">Buscar</button>
                    </form>
                </div>
                
                
            </div>
        </div>

        



<div id="tabla-full" style="justify-content: center;"> <table id="tabla-imprimir" class="tabla table table-striped table-light table-hover" >
            <thead>
                <tr>
                    <th class="centrado">Estado</th>
                    <th class="centrado"> Matrícula</th>
                    <th class="centrado">Tipo de embarcación</th>
                    <th class="centrado">Color</th>
                    <th class="centrado">Capacidad</th>
                    <th class="centrado">Marca</th>
                    <th class="centrado">Nombre embarcación</th>
                    <th class="centrado">Adicional</th>
                    <th class="centrado">Nombre</th>
                    <th class="centrado">Telefono</th>
                    <th class="centrado">DNI</th>
                    <th class="centrado">Vehículo</th>
                    <th class="centrado">Horario ingreso</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <tr><?php foreach ($ingresos as $ingreso) { ?>
                    <!-- <img width="50%" src="imagenes/anchor.svg" alt=""> -->
                    <td class="centrado">
                        <form action="" method="post">
                            <input type="hidden" name="id_boton" value="<?php echo $ingreso['id']?>">
                            <button class="btn my-2" name="action" type="submit" value="<?php echo $ingreso['estado']?>"><img width="100%" src="imagenes/<?php echo $ingreso['estado']?>.svg"></button>
                        </form>
                    </td>
                    <td class="centrado" scope="row"><?php echo $ingreso['matricula']?></td>
                    <td class="centrado"><?php echo $ingreso['tipo']?></td>
                    <td class="centrado"><?php echo $ingreso['color']?></td>
                    <td class="centrado"><?php echo $ingreso['capacidad']?></td>
                    <td class="centrado"><?php echo $ingreso['marca']?></td>
                    <td class="centrado"><?php echo $ingreso['nombre']?></td>
                    <td class="centrado"><?php echo $ingreso['adicional']?></td>
                    <td class="centrado"><?php echo $ingreso['nombre_persona']?></td>
                    <td class="centrado"><?php echo nl2br($ingreso['telefono_1']."\n".$ingreso['telefono_2'])?></td>
                    <td class="centrado"><?php echo $ingreso['dni']?></td>
                    <td class="centrado"><?php echo nl2br ($ingreso['vehiculo']."\n".$ingreso['patente']."\n".$ingreso['color_v']);?></td>
                    <td class="centrado"><?php echo $ingreso['hora']?></td>
                    <td class="centrado">
                        <form action="editar_estado.php" method="post">
                            <input type="hidden" name="edit_boton" value="<?php echo $ingreso['id']?>">
                            <button class="btn btn-primary my-2" name="edit_ingreso" type="submit" value="editar_ingreso">Editar</button>
                        </form>
                    </td>
                </tr><?php } ?>
            </tbody>
        </table></div>

        <form action="print.php" method="post" style="background-color: transparent;">
          
          
        <button class="btn btn-warning" name="date-search" type="submit" value="<?php echo $fecha; ?>">Imprimir</button>
   
        </form>
        
       
    </div>

<?php include ("pie.php") ?>