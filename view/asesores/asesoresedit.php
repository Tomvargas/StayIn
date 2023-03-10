
//<!--autor:Erick Campuzano-->
<?php

include("../../model/conexion.php");
include("../../controller/modificar_asesor.php");
//

$id = $_GET["id"];

$sql = $conexion->query("select * from asesor  where id=$id");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/17785f4468.js" crossorigin="anonymous"></script>
    <title>Modificar Asesor</title>
</head>
<body>

<h1 class="text-center p-3" > ASESORES - StayIn </h1>

<form class="col-4 p-3 m-auto"  method="POST"> 
            <h3 class="text-center text-secondary"> Modifica los parámetros del Asesor en el Siguiente Formulario</h3>
         
            <input type="text" name="id" value="<?= $_GET["id"] ?>" >
        <?php 
            // include("../../controller/modificar_asesor.php");

            while($datos = $sql->fetch_object()) {?>

         

                <div class="mb-1">
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value= "<?= $datos->nombre?>" >
                    </div>
                <div class="mb-1">
                     <label for="exampleInputEmail1" class="form-label">Apellido</label>
                    <input type="text" class="form-control" name="apellido" value= "<?= $datos->apellido?>">
    
                    </div>
                <div class="mb-1">
                     <label for="exampleInputEmail1" class="form-label">Cargo</label>
                     <input type="text" class="form-control" name="cargo" value= "<?= $datos->cargo?>">
   
                 </div>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Teléfono</label>
                     <input type="number" class="form-control" name="telefono" value= "<?= $datos->telefono?>">
    
                    </div>
                    <div class="mb-1">
                     <label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
                      <input type="email" class="form-control" name="correo" value= "<?= $datos->correo?>">
 
                      </div>

           <?php }
        
        ?>
            
       
    <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Modificar</button>
    
  
        
        
        </form>
        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>