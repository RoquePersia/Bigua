

<?php 
//variables barcaza
date_default_timezone_set("America/Argentina/Buenos_Aires");

$visible_mat = "collapse";
$matricula=" ";
$vig_matricula=" ";
$aseguradora=" ";
$vig_seguro=" ";
$tipo=" ";
$color="";
$capacidad=" ";
$marca=" ";
$motor=" ";
$nombre=" ";
$adicional=" ";

// variables persona
$visible_lic = "collapse";
$nombre_p="";
$dni="";
$tel_1="";
$tel_2="";
$vigencia_lic="";

$visible_brand="visible";

if($_POST){
    $action=(isset($_POST["action"]) ? $_POST["action"] : "");
    

    switch ($action){

        case"cargar-mat":
            $matricula= $_POST["matricula"];
            $vig_matricula= $_POST["vigencia_matricula"];
            $datos_seguro= $_POST["datos_seguro"];
            $vig_seguro= $_POST["vigencia_seguro"];
            $tipo= $_POST["tipo"];
            $color= $_POST["color"];
            $capacidad= $_POST["capacidad"];
            $marca= $_POST["marca"];
            $motor= $_POST["motor"];
            $nombre= $_POST["nombre"];
            $adicional= $_POST["adicional"];

        
            
        
            $fecha= new DateTime();
        
            $objConexion = new conexion();
        
            
            $sql_insert="INSERT INTO `barcaza` (`matricula`, `vig_matricula`, `aseguradora`, `vig_seguro`, `tipo`, `color`, `capacidad`, `marca`, `motor`, `nombre`, `adicional`) VALUES ('$matricula', '$vig_matricula', '$datos_seguro', '$vig_seguro', '$tipo', '$color','$capacidad', '$marca', '$motor', '$nombre', '$adicional')";
            $objConexion->ejecutar($sql_insert);
            header("location:portafolio.php"); //recarga la página una vez que se inserta o borra algún dato
            break;

            case"cargar-lic":
                $nombre_persona=$_POST["nombre_persona"];
                $dni= $_POST["dni"];
                $telefono_1=$_POST["telefono_1"];
                $telefono_2=$_POST["telefono_2"];
                $vigencia_licencia= $_POST["vigencia_licencia"];

                $objConexion = new conexion();
        
            
                $sql_insert="INSERT INTO `persona` (`dni`, `nombre_persona`, `telefono_1`, `telefono_2`, `vig_carnet`) VALUES ('$dni', '$nombre_persona', '$telefono_1', '$telefono_2', '$vigencia_licencia')";
                $objConexion->ejecutar($sql_insert);
                header("location:portafolio.php");

                break;
            
            case"buscar-mat":
                $matricula_p=$_POST["matricula"];
                
                $objConexion = new conexion();

                $data=$objConexion->consultar("SELECT * FROM `barcaza` WHERE `matricula` = '$matricula_p';");
                if($data){
                    $visible_brand="collapse";
                    $visible_mat="visible";
                    $matricula=$data[0]['matricula'];
                    $vig_matricula=$data[0]['vig_matricula'];
                    $aseguradora=$data[0]['aseguradora'];
                    $vig_seguro=$data[0]['vig_seguro'];
                    $tipo=$data[0]['tipo'];
                    $color=$data[0]['color'];
                    $capacidad=$data[0]['capacidad'];
                    $marca=$data[0]['marca'];
                    $motor=$data[0]['motor'];
                    $nombre=$data[0]['nombre'];
                    $adicional=$data[0]['adicional'];
                } else {
                    ?><script>window.confirm("No existe la barcaza");</script><?php
                }
                


                break;
            case"buscar-lic":
                $dni=$_POST["dni"];
                
                $objConexion = new conexion();

               

                $data=$objConexion->consultar("SELECT * FROM `persona` WHERE `dni` = '$dni';");
                if($data){
                    $visible_brand="collapse";
                    
                    $nombre_p=$data[0]['nombre_persona'];
                    $dni=$data[0]['dni'];
                    $tel_1=$data[0]['telefono_1'];
                    $tel_2=$data[0]['telefono_2'];
                    $vigencia_lic=$data[0]['vig_carnet'];
                    $visible_lic="visible";
                } else {
                    ?><script>window.confirm("No existe el usuario");</script><?php
                }
               
            break;

            case"cargar-ingreso":
                $matricula= $_POST["matricula"];
                $dni= $_POST["dni"];
                $objConexion= new conexion;
               
                $boolean_mat=$objConexion->consultar("SELECT * FROM `barcaza` WHERE `matricula` = '$matricula';");
                $boolean_dni=$objConexion->consultar("SELECT * FROM `persona` WHERE `dni` = '$dni';");


                if($boolean_mat && $boolean_dni) {

                $vehiculo= $_POST["vehiculo"];
                $patente= $_POST["patente"];
                $color= $_POST["color"];
                $fecha=date("Y-m-d");
                $hora=date("H:i:s");

               


                
                $sql_insert = "INSERT INTO `ingreso` (`matricula`, `dni`, `vehiculo`, `fecha`, `hora`,`estado`,`patente`,`color_v`) VALUES ('$matricula', '$dni', '$vehiculo', '$fecha', '$hora', 'dentro','$patente','$color')";

                $objConexion->ejecutar($sql_insert);

                ?>
                <script>alert("Ingreso realizado");</script><?php
                

                

          
                

             
                } else {
                    if ($boolean_mat){
                        ?><script>window.confirm("Usuario no encontrada");</script><?php
                    } else {
                        ?><script>window.confirm("Barcaza no encontrada");</script><?php
                    }
                   
                }


                break;
            
            case"consulta":
                print($_POST);
                $dni=$_POST["dni"];
                
                $matricula=$_POST["matricula"];
                $objConexion = new conexion();

                $data=$objConexion->consultar("SELECT * FROM ingresos INNER JOIN persona ON ingresos.dni=persona.dni INNER JOIN barcaza ON ingresos.matricula=barcaza.matricula;");
                print_r($data);

                break;
            case"dentro":
                $id_boton=$_POST["id_boton"];
                $objConexion= new conexion;
                $sql_insert = "UPDATE ingreso SET estado='fuera' WHERE id='$id_boton';";

                $objConexion->ejecutar($sql_insert);

               
                break;
            case"fuera":
                $id_boton=$_POST["id_boton"];
                $objConexion= new conexion;
                $sql_insert = "UPDATE ingreso SET estado='dentro' WHERE id='$id_boton';";

                $objConexion->ejecutar($sql_insert);

                
                break;
            
            case"edit_ingreso":
                $id=$_POST["id"];
                $matricula=$_POST["matricula"];
                $dni=$_POST["dni"];
                $vehiculo=$_POST["vehiculo"];
                $patente=$_POST["patente"];
                $color=$_POST["color"];

                $objConexion= new conexion;
                $sql_insert = "UPDATE ingreso SET matricula='$matricula',dni='$dni',vehiculo='$vehiculo',patente='$patente',color_v='$color' WHERE ingreso.id='$id';";

                $objConexion->ejecutar($sql_insert);

                header("location:index.php");
                




            



        
}

   
}

if($_GET){

    $matricula=$_GET['borrar'];
    $objConexion = new conexion();

    
    
    $sql="DELETE FROM `barcaza` WHERE `matricula` LIKE '$matricula'";
    $objConexion->ejecutar($sql);
}





?>