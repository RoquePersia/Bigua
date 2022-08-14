
<?php 
    session_start();

    if($_POST){
        if(($_POST['usuario'] =="bigua") && ($_POST['contraseña'] == "12345")){
            $_SESSION['usuario'] = "bigua";
            header("Location: index.php");
        }else{
            echo "<script> alert ('Usuario o contraseña incorrecta'); </script>";
        }
    }

?>



<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body style="background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);
    background: linear-gradient(to right, #2C5364, #203A43, #0F2027);height: 100%; width: 100%;margin: 0; display: flex;">
    <div class="container" style="margin:auto">
        <div class="row" >
            <div class="col-md-4"></div>

            <div class="col-md-4">
                <br>
                <div class="card bg-dark text-white">
                    <div class="card-header ">
                        Biguá
                    </div>
                    <div class="card-body" style="margin:auto;">
                        <form action="login.php" method="post" style="margin: auto;">
                
                            Usuario: <input class="form-control" type="text" name="usuario" id="">
                            Contraseña: <input class="form-control" type="password" name="contraseña" id="">
                            <br>
                            <button class="btn btn-success" type="submit">Entrar al sistema</button>

                        </form> 
                    </div>
                    <div class="card-footer text-muted">
                        Sistema de gestión de barcazas
                    </div>
                </div>
            
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    


  </body>
</html>
            
