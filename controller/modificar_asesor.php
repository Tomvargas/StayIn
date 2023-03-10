<?php

if(!empty($_POST["btnregistrar"])){

    //Validar que los campos no estén vacíos
    if(!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["cargo"])
    and !empty($_POST["telefono"]) and !empty($_POST["correo"])){
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $cargo = $_POST["cargo"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];
        $sql = $conexion->query("UPDATE `asesor` SET `nombre`='$nombre',`apellido`='$apellido',`cargo`='$cargo',
        `telefono`='$telefono',`correo`='$correo' WHERE id=$id");

        // $sql = $conexion->query("update asesor set 'nombre'='$nombre', 'apellido'='$apellido', 
        // 'cargo'='$cargo', 'telefono'=$telefono, correo='$correo' where id=$id");



        //UPDATE `asesor` SET `nombre`='$nombre',`apellido`='$apellido',`cargo`='$cargo',
        //`telefono`='$telefono',`correo`='$corre' WHERE id=$id
        //Verificar si se ha modificado el asesor

        if ($sql==1) {
            header("Location:$../view/asesores/asesoresnew.php");
           
        } else {
            echo "<div class='alert alert-danger'>Ocurrió un error al modifcar al asesor</div>";
        }
        

    }else{
        echo"<div class='alert alert-warning'> Tienes campos vacíos así que no puedes modificar el asesor</div>";
    }

}

?>