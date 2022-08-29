<?php include ("conexion.php") ?>
<?php include ("consultas.php") ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="portafolio.php">Gestión</a>
        <a class="btn btn-warning" href="#" onclick="window.print();">Imprimir registro</a>
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Biguá</a>
      </div>
    </div>
  </div>
</nav>


<?php 
    
   
    
    if($_POST){
        setlocale(LC_TIME, "spanish");
        $fecha=$_POST["date-search"];
        $newDate = date("d-m-Y", strtotime($fecha));
        $mesDesc = strftime("día %A, %e de %B de %Y", strtotime($newDate));
        $objConexion = new conexion();
        $ingresos=$objConexion->consultar("SELECT * FROM ingreso INNER JOIN persona ON ingreso.dni=persona.dni INNER JOIN barcaza ON ingreso.matricula=barcaza.matricula WHERE fecha = '$fecha';");
        


    
    
    ?>
    <div class="container my-4" id="todo">
        

        


<h2>Planilla ingreso embarcaciones del <?php echo $mesDesc;?></h2>
<div id="eldivis"> <table id="tabla-imprimir" class="table" id="tabla-full">
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
                    <th>Telefono adicional</th>
                    <th>DNI</th>
                    <th>Horario ingreso</th>

                </tr>
            </thead>
            <tbody>
                <tr><?php foreach ($ingresos as $ingreso) { ?>
                    <!-- <img width="50%" src="imagenes/anchor.svg" alt=""> -->
                    <td scope="row"><?php echo $ingreso['matricula']?></td>
                    <td><?php echo $ingreso['tipo']?></td>
                    <td><?php echo $ingreso['color']?></td>
                    <td><?php echo ("Personas: ".$ingreso['capacidad'])?></td>
                    <td><?php echo $ingreso['marca']?></td>
                    <td><?php echo $ingreso['nombre']?></td>
                    <td><?php echo $ingreso['adicional']?></td>
                    <td><?php echo $ingreso['nombre_persona']?></td>
                    <td><?php echo $ingreso['telefono_1']?></td>
                    <td><?php echo $ingreso['telefono_2']?></td>
                    <td><?php echo $ingreso['dni']?></td>
                    <td><?php echo $ingreso['hora']?></td>
                    
                </tr><?php } ?> 
            </tbody>
        </table>
    </div>
       
    </div>
    <?php } else { header("location:index.php"); }?>

    
    



  


<?php include ("pie.php") ?>