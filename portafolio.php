<?php include ("cabecera.php") ?>
<?php include ("conexion.php") ?>
<?php include ("consultas.php") ?>

    <div class="container my-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-light text-dark">
                    <div class="card-header" style="text-align: center;">
                    <!-------------------- CARGAR EMBARCACIÓN ------------------->
                        <h4>Ingresar embarcación</h3>
                    </div>
                    <div class="card-body">
                        <form action="portafolio.php" method="post" enctype="multipart/form-data">
                        <div class="datos">
                                <input required class="form-control mb-1" type="text" name="matricula" id="matricula" placeholder="Matricula número">

                                <small id="small_label_vigencia_matricula" class="form-text text-muted">Vencimiento matricula:</small>
                                <div class="row mb-4" name="datos_matricula">
                                    <div class="col-md-8 pe-2">
                                        <input class="form-control" type="date" name="vigencia_matricula" id="">
                                    </div>
                                    <div class="col-md-4 ps-2">
                                        <input style="display:flex; width: 100%; justify-content: center" class="btn btn-warning" type="submit" value="Vencimiento" disabled>
                                    </div>
                                </div>

                                <div class="row mb-4" name="datos_seguro">
                                    <div class="nombre_seguro mb-1" style="display:flex;align-items:center;">
                                        <input type="text" class="form-control" placeholder="Compañía aseguradora" name="datos_seguro" id="datos_seguro">
                                    </div>
                                    
                                    <small id="small_label_vigencia_seguro" class="form-text text-muted">Vencimiento seguro:</small>
                                    <div class="vigencia_seguro col-md-8 pe-2">
                                        <input class="form-control" type="date" name="vigencia_seguro" id="vigencia_seguro">
                                    </div>
                                    <div class="button_actualizar_seguro col-md-4 ps-2">
                                        <input style="display:flex; width: 100%; justify-content: center" class="btn btn-warning" type="submit" value="Vencimiento" disabled >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <input class="form-control" type="text" name="tipo" id="tipo" placeholder="Tipo de embarcación">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <input class="form-control" type="text" name="color" id="color" placeholder="Color">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <select class="form-select" aria-label="Default select example" id="capacidad" name="capacidad">
                                            <option selected>Capacidad</option>
                                            <option value="1">1 persona</option>
                                            <option value="2">2 personas</option>
                                            <option value="3">3 personas</option>
                                            <option value="4">4 personas</option>
                                            <option value="5">5 personas</option>
                                            <option value="6">6 personas</option>
                                            <option value="6">7 personas</option>
                                            <option value="6">8 personas</option>
                                            <option value="6">9 personas</option>
                                            <option value="6">10 personas</option>
                                            <option value="6">11 personas</option>
                                            <option value="6">12 personas</option>
                                            <option value="6">13 personas</option>
                                            <option value="6">14 personas</option>
                                            <option value="6">15 personas</option>
                                        </select>
                                        
                                        
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <input class="form-control" type="text" name="marca" id="marca" placeholder="Marca">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <input class="form-control" type="text" name="motor" id="motor" placeholder="HP">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre fantasía">
                                    </div>
                                </div>
                                        
                                <textarea class="form-control" name="adicional" id="adicional" placeholder="Información adicional" rows="3"></textarea>
                                <button class="btn btn-success my-2" name="action" type="submit" value="cargar-mat" style="width: 100%;">Enviar</button>
                        
                        
                        
                        </form>
                            
                        
                            </div>
                            <div class="container">
                            <div class="card-header" style="text-align: center;">

                    <!-------------------- CARGAR PERSONA ------------------->
                        
                    <h4>Ingresar persona</h3>
                    </div>
                            </div>
                            
                            <form action="portafolio.php" method="post">
                                <div class="datos mt-2" id="datos_persona">
                                    <input required class="form-control mb-4" type="text" name="nombre_persona" id="nombre_persona" placeholder="Nombre">
                                    <input required class="form-control mb-4" type="text" name="dni" id="dni" placeholder="Dni">
                                    <div class="container_telefonos row mb-4" name="datos_matricula">
                                        <div class="col-md-6 pe-2">
                                            <input required class="form-control mb-1" type="text" name="telefono_1" id="telefono_1" placeholder="Telefono">
                                        </div>
                                        <div class="col-md-6 ps-2">
                                            <input class="form-control mb-1" type="text" name="telefono_2" id="telefono_2" placeholder="Telefono">
                                        </div>
                                    </div>
                                    <small id="small_label_vigencia_licencia" class="form-text text-muted">Vencimiento de licencia:</small>
                                    <input class="form-control" type="date" name="vigencia_licencia" id="vigencia_licencia">
                                    <button class="btn btn-success my-2" name="action" type="submit" value="cargar-lic" style="width: 100%;">Enviar</button>
                                
                                </div>
                            </form>
                            
                            
                        
                    </div>
                    <div class="card-footer text-muted"></div>
                </div>
            </div>
            
            
            <div class="col-md-8" id="div-table-container">
                <!-------------------- CARGAR INGRESO ------------------->
                <div class="card bg-light text-dark container-carga-ingreso">
                     <div class="card-header" style="text-align: center;">
                     
                        <h2>Cargar ingreso</h1>
                    </div>
                    <div class="card-body container-body-ingreso">
                       
                      
                            <form class="datos form-busqueda-mat col-md-12 row" action="portafolio.php" method="post" >
                                <div class="col-md-10 pb-2" style="display: flex;">
                                    <div class="col-md-6 px-1">
                                        <input required style="font-size: x-large" class="form-control" type="text" name="matricula" placeholder="Ingresar matricula">
                                    </div> 
                                    <div class="col-md-6 px-1">
                                        <input required style="font-size: x-large" class="form-control" type="text" name="dni" placeholder="Ingresar dni">
                                    </div>
                            
                                </div>
                                    
                               
                                <div class="col-md-2" >
                                  <button class="btn btn-success flex-grow-1 centrado-largo" name="action" type="submit" value="cargar-ingreso" style="white-space: normal;width: 100%;">Cargar</button>
                                </div>
                                
                                <div class="col-md-12" style="display: flex;">
                                    <div class="col-md-4 px-1">
                                        <input required style="font-size: x-large" class="form-control" type="text" name="vehiculo" placeholder="Ingresar vehículo">
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <input required style="font-size: x-large" class="form-control" type="text" name="patente" placeholder="Ingresar patente">
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <input required style="font-size: x-large" class="form-control" type="text" name="color" placeholder="Ingresar color">
                                    </div>
                                </div>
                               
                               
                                
                              
                            </form>
                      
                       
                        
                    </div>
                </div>
                <div class="card bg-light text-dark container-carga-ingreso">
                     <div class="card-header" style="text-align: center;">
                        <h2>Buscar en base de datos</h1>
                    </div>
                    <div class="datos p-0 m-3 row card-body container-body-ingreso" >
                      
                            <form class="datos form-busqueda-mat col-md-6"  action="portafolio.php" method="post" style="display: flex;">
                                <div class="col-md-8 px-2">
                                  <input required class="form-control" type="text" name="matricula" placeholder="Ingresar matricula">
                                </div>
                                <div class="col-md-4">
                                  <button class="btn btn-success" name="action" type="submit" value="buscar-mat" style="width: 100%;">Buscar</button>
                                </div>
                              
                            </form>
                       
                       
                            <form class="datos form-busqueda-lic col-md-6" action="portafolio.php" method="post" style="display: flex">
                                
                               <div class="col-md-8 px-2">
                                 <input required class="form-control col-md-8" type="text" name="dni" placeholder="Ingresar dni">
                               </div>
                               <div class="col-md-4">
                                 <button class="btn btn-success col-md-4" name="action" type="submit" value="buscar-lic" style="width: 100%;">Buscar</button>
                               </div>
                                    
                            
                                
                                    
                                   
                           
                            </form>
                      
                       
                        
                    </div>
                </div>
               
                <table class="tabla tabla-barcaza table table-striped table-light table-hover" id="table-container" style="visibility: <?php echo $visible_mat?>;">
                    <tbody>
                    <?php ?>
                        <tr>
                            <th>Matrícula</th>
                            <td><?php echo $matricula;?></td>
                        </tr>
                        <tr>
                            <th>Vigencia matrícula</th>
                            <td><?php echo $vig_matricula;?></td>
                        </tr>
                        <tr>
                            <th>Aseguradora</th>
                            <td><?php echo $aseguradora;?></td>
                        </tr>
                        <tr>
                            <th>Vigencia seguro</th>
                            <td><?php echo $vig_seguro;?></td>
                        </tr>
                        <tr>
                            <th>Tipo</th>
                            <td><?php echo $tipo;?></td>
                        </tr>
                        <tr>
                            <th>Color</th>
                            <td><?php echo $color;?></td>
                        </tr>
                        <tr>
                            <th>Capacidad</th>
                            <td><?php echo $capacidad;?></td>
                        </tr>
                        <tr>
                            <th>Marca</th>
                            <td><?php echo $marca;?></td>
                        </tr>
                        <tr>
                            <th>Motor</th>
                            <td><?php echo $motor;?></td>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <td><?php echo $nombre;?></td>
                        </tr>
                        <tr>
                            <th>Adicional</th>
                            <td><?php echo $adicional;?></td>
                        </tr>
                        <!-- <tr>
                            <th>Acciones</th>
                            <td><a class="btn btn-primary" type="submit" href="?borrar=<?php echo $barcaza['matricula'];?>">Eliminar</a></td>
                        </tr> -->
                        <?php  ?>
                            
                            
                            
                            
                           
                        </tr>
                    </tbody>
                
                </table>
                <table class="tabla tabla-barcaza table table-striped table-light table-hover" id="table-container" style="visibility: <?php echo $visible_lic?>;">
                    <tbody>
                    <?php ?>
                        <tr>
                            <th>Nombre</th>
                            <td><?php echo $nombre_p;?></td>
                        </tr>
                        <tr>
                            <th>DNI</th>
                            <td><?php echo $dni;?></td>
                        </tr>
                        <tr>
                            <th>Teléfono</th>
                            <td><?php echo $tel_1;?></td>
                        </tr>
                        <tr>
                            <th>Teléfono 2</th>
                            <td><?php echo $tel_2;?></td>
                        </tr>
                        <tr>
                            <th>Vigencia licencia</th>
                            <td><?php echo $vigencia_lic;?></td>
                        <!-- </tr>
                        
                            <th>Acciones</th>
                            <td><a class="btn btn-primary" type="submit" href="?borrar=<?php echo $barcaza['matricula'];?>">Eliminar</a></td>
                        </tr> -->
                        <?php  ?>
                            
                            
                            
                            
                           
                        </tr>
                    </tbody>
                
                </table>
                <div class="container" style="display:flex; justify-content:center; height:50%;padding:6em;visibility: <?php echo $visible_brand?>;" >
                    <img src="imagenes/bigua.png" alt="">
                </div>

                
                    
            </div>
        
            
        </div>
    </div>

    

    

<?php include ("pie.php") ?>
                                    
                             
                                
                                  
                                   
