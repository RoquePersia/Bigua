<?php include ("cabecera.php") ?>
<?php include ("conexion.php") ?>
<?php include ("consultas.php") ?>


<?php 
    $objConexion = new conexion();
    
    if($_POST){
        $id = $_POST['edit_boton'];
        $ingresos=$objConexion->consultar("SELECT * FROM ingreso INNER JOIN persona ON ingreso.dni=persona.dni INNER JOIN barcaza ON ingreso.matricula=barcaza.matricula WHERE id = '$id';");


    }
    
    

   
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
                    
                </div>
                
                
            </div>
        </div>

        



<div id="tabla-full"> <table id="tabla-imprimir" class="tabla table table-striped table-light table-hover" >
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Tipo de embarcación</th>
                    <th>Color</th>
                    <th>Capacidad</th>
                    <th>Marca</th>
                    <th>Nombre embarcación</th>
                    <th>Adicional</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>DNI</th>
                    <th>Vehículo</th>
                    <th>Horario ingreso</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- <img width="50%" src="imagenes/anchor.svg" alt=""> -->
                    <form action="editar_estado.php" method="post">
                    <td><input placeholder="matricula" class="form-control" type="text" name="matricula" id="" value="<?php echo $ingresos[0]['matricula']?>"></td>
                    <td><?php echo $ingresos[0]['tipo']?></td>
                    <td><?php echo $ingresos[0]['color']?></td>
                    <td><?php echo $ingresos[0]['capacidad']?></td>
                    <td><?php echo $ingresos[0]['marca']?></td>
                    <td><?php echo $ingresos[0]['nombre']?></td>
                    <td><?php echo $ingresos[0]['adicional']?></td>
                    <td><?php echo $ingresos[0]['nombre_persona']?></td>
                    <td><?php echo nl2br($ingresos[0]['telefono_1']."\n".$ingresos[0]['telefono_2'])?></td>
                    <td><input placeholder="dni" class="form-control" type="text" name="dni" id="" value="<?php echo $ingresos[0]['dni']?>"></td>
                    <td>
                        <input placeholder="vehiculo" class="form-control" type="text" name="vehiculo" id="" value="<?php echo $ingresos[0]['vehiculo']?>">
                        <input placeholder="patente" class="form-control" type="text" name="patente" id="" value="<?php echo $ingresos[0]['patente']?>">
                        <input placeholder="color" class="form-control" type="text" name="color" id="" value="<?php echo $ingresos[0]['color_v']?>">
                
                    </td>
                    <td><?php echo $ingresos[0]['hora']?></td>
                    <td>
                            <input type="hidden" name="id" value="<?php echo $ingresos[0]['id']?>">
                            <button class="btn my-2" name="action" type="submit" value="edit_ingreso">Enviar</button>
                    </td>


                    </form>
                    
                        
                    
                </tr>
            </tbody>
        </table></div>

        

    
       
    </div>

    
    



  


<?php include ("pie.php") ?>