<?php
include_once 'conexion.php';
class Renumerar extends Conectar{
    function renumerar(){
        $sql = "SELECT *FROM periodismo";
        $resul = $this->conectar()->query($sql);
        if (empty($resul)) {
            echo 'Ocurrio un error';
        } 
        $con = 1;
        while($obtenerD = $resul->fetch_array(MYSQLI_BOTH)){
            $Id = $obtenerD['Id'];
            $sql = "UPDATE periodismo SET Id= $con WHERE Id = $Id";
            $con++;
            $resul1 = $this->conectar()->query($sql);
        }
      
        
    }
}
$con = new Renumerar();
$con->renumerar();
?>