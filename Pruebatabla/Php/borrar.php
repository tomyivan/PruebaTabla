<?php

include_once './conexion.php';

class Borrar extends Conectar {

    function borrar($id) {
     
        $sql = "DELETE FROM periodismo WHERE Id={$id}";
        $result = $this->conectar()->query($sql);
        if (!empty($result)) {
            header("Location: ../Editar.php");
        } else {
            echo '<div class="alert alert-danger">No se elimino correctamente</div>';
        }
    }

}
$id = $_GET['Id'];
$con  = new Borrar();
$con->borrar($id);
