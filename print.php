<?php 
    session_start();
    if(isset($_SESSION['usuario']) !="donramon"){
        header("location:login.php");
    }
?>
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
        <a class="btn btn-warning" href="#" onclick="printContent('eldivis')">Imprimir registro</a>
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Biguá</a>
      </div>
    </div>
  </div>
</nav>

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
    $ingresos=$objConexion->consultar("SELECT * FROM ingreso INNER JOIN persona ON ingreso.dni=persona.dni INNER JOIN barcaza ON ingreso.matricula=barcaza.matricula WHERE fecha = '$fecha';");
   
?>
    <div class="container my-4" id="todo">

        



<div id="eldivis"> <table id="tabla-imprimir" class="table" id="tabla-full">
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
                            <input type="hidden" name="id_boton" value="<?php echo $ingreso['matricula']?>">
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
       
    </div>

    
    



  


<?php include ("pie.php") ?>