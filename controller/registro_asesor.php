<?php

//Proceso al dar clic en el botón registrar
if(!empty($_POST["btnregistrar"])){

    // Validación de que todos los campos estén llenos
    if(!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["cargo"]) and
    !empty($_POST["telefono"]) and !empty($_POST["correo"])){
        
        $nombre =  $_POST["nombre"];
        $apellido =  $_POST["apellido"];
        $cargo =  $_POST["cargo"];
        $telefono =  $_POST["telefono"];
        $correo =  $_POST["correo"];

        //Sentencia para registrar al asesor
        $sql = $conexion->query("insert into asesor (nombre, apellido, cargo, telefono, correo) values ('$nombre', '$apellido', '$cargo', $telefono, '$correo')");


        //Validar si efectivamente se ha registrado el asesor

        if($sql==1){
            echo '<div class="alert alert-success">Asesor registrado Correctamente :D</div>';
        }else{
            echo '<div class="alert alert-warning">Hubo un error al registrar al Asesor :c </div>';
        }
        
    
    } 
}

?>