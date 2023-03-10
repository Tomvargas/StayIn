

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Asesor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/17785f4468.js" crossorigin="anonymous"></script>


</head>
<body>

    <h1 class="text-center p-3" > ASESORES - StayIn </h1>
    
    <?php
        include("../../model/conexion.php");
        include("../../controller/registro_asesor.php");
        include("../../controller/eliminar_asesor.php");
    ?>
    <script>
        function eliminar(){
            var respuesta = confirm("¿Estás seguro que deseas eliminar este registro?");
            return respuesta;
        }
    </script>

   

    <div class="container-fluid row">
    
        <form class="col-4 p-3" method="POST"> 
            <h3 class="text-center text-secondary"> Registrar Asesor en el siguiente formulario</h3>
            <div class="mb-3">
             <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
     
        </div>
        <div class="mb-3">
             <label for="exampleInputEmail1" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido">
    
        </div>
        <div class="mb-3">
             <label for="exampleInputEmail1" class="form-label">Cargo</label>
                <input type="text" class="form-control" name="cargo">
   
        </div>
        <div class="mb-3">
             <label for="exampleInputEmail1" class="form-label">Teléfono</label>
                <input type="number" class="form-control" name="telefono">
    
        </div>
        <div class="mb-3">
             <label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" name="correo">
 
        </div>
       
    <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
        </form>
        <div class="col-8 p-4">
            <table class="table">
        <thead class="bg-info">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Cargo</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo</th>
                <th scope="col"></th>

            </tr>
        </thead>
        <tbody>

            <?php
                
                
                $sql=$conexion->query("select * from asesor");
                while($datos = $sql->fetch_object()){?>
                    <tr>

                        <th scope="row"> <?= $datos->id ?></th>
                        <td><?= $datos->nombre ?></td>
                        <td><?= $datos->apellido ?></td>
                        <td><?= $datos->cargo?></td>
                        <td><?= $datos->telefono ?></td>
                        <td><?= $datos->correo ?></td>
                        <td> 
                            <a href="asesoresedit.php?id=<?= $datos->id?>" class="btn btn-small btn-warning"> <i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="eliminar()"  href="asesoresnew.php?id<?= $datos->id?>" class="btn btn-small btn-danger"> <i class="fa-solid fa-trash"></i></a>
                        </td>


                        </tr>   

                <?php }

            ?>

            
           
        </tbody>
        </table>
    </div>

    </div>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>