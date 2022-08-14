<?php include ("cabecera.php") ?>
<?php include ("conexion.php") ?>
<?php include ("consultas.php") ?>

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
    $ingresos=$objConexion->consultar("SELECT * FROM ingreso INNER JOIN persona ON ingreso.dni=persona.dni INNER JOIN barcaza ON ingreso.matricula=barcaza.matricula WHERE fecha = '$fecha';");
    

   
?>
    <div class="container my-4" id="todo">
        <div class="py-5 px-1" style="background-color: none;">
            <div class="container">
                <div class="container" style="display: flex;">
                    <h1 class="display-3"> <strong>El Biguá</strong> </h1>
            
                </div>
                
                <p class="lead"><strong> Sistema de gestión de barcazas</strong></p>
                <hr class="my-2">
                <div class="container" style="align-items: start; display: flex;">
                    <form action="index.php" method="post" style=" display: flex;">
                        <input class="form-control" type="date" name="fecha">
                        <button class="btn btn-warning" name="date-search" type="submit" value="buscar-por-dia">Buscar</button>
                    </form>
                </div>
                
                
            </div>
        </div>

        



<div id="tabla-full"> <table id="tabla-imprimir" class="tabla table table-striped table-dark table-hover" >
            <thead>
                <tr>
                    <th>Estado</th>
                    <th>Matrícula</th>
                    <th>Tipo de embarcación</th>
                    <th>Color</th>
                    <th>Capacidad</th>
                    <th>Marca</th>
                    <th>Nombre embarcación</th>
                    <th>Adicional</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Telefono adicional</th>
                    <th>DNI</th>
                    <th>Fecha ingreso</th>
                    <th>Horario ingreso</th>

                </tr>
            </thead>
            <tbody>
                <tr><?php foreach ($ingresos as $ingreso) { ?>
                    <!-- <img width="50%" src="imagenes/anchor.svg" alt=""> -->
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id_boton" value="<?php echo $ingreso['id']?>">
                            <button class="btn my-2" name="action" type="submit" value="<?php echo $ingreso['estado']?>"><img width="100%" src="imagenes/<?php echo $ingreso['estado']?>.svg"></button>
                        </form>
                    </td>
                    <td scope="row"><?php echo $ingreso['matricula']?></td>
                    <td><?php echo $ingreso['tipo']?></td>
                    <td><?php echo $ingreso['color']?></td>
                    <td><?php echo $ingreso['capacidad']?></td>
                    <td><?php echo $ingreso['marca']?></td>
                    <td><?php echo $ingreso['nombre']?></td>
                    <td><?php echo $ingreso['adicional']?></td>
                    <td><?php echo $ingreso['nombre_persona']?></td>
                    <td><?php echo $ingreso['telefono_1']?></td>
                    <td><?php echo $ingreso['telefono_2']?></td>
                    <td><?php echo $ingreso['dni']?></td>
                    <td><?php echo $ingreso['fecha']?></td>
                    <td><?php echo $ingreso['hora']?></td>
                    
                </tr><?php } ?>
            </tbody>
        </table></div>
        <p><a href="print.php" class="btn btn-warning" id="print" onclick="printContent('eldivis')">Print</a></p>
       
    </div>

    
    



  


<?php include ("pie.php") ?>