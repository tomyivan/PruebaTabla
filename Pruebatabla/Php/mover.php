<?php

include_once './conexion.php';

class Mover extends Conectar {
   

    function moverArriba($id) {
        $sql = "SELECT *FROM periodismo WHERE id = {$id}";
        $resul = $this->conectar()->query($sql);
        if (!empty($resul)) {
        } else {
            echo '<div class="alert alert-danger">Ocurrio un error3</div>';
        } 
        $registro = $resul->fetch_array(MYSQLI_BOTH);
        
        $id2 = $id-1;
        echo  $id2.'--->'.$registro['Descripcion'];
        $sql = "SELECT *FROM periodismo WHERE id = {$id2}";
        $resul = $this->conectar()->query($sql);
        if (!empty($resul)) {
        } else {
            echo '<div class="alert alert-danger">Ocurrio un error2</div>';
        }
        $registro2 = $resul->fetch_array(MYSQLI_BOTH);
        echo  $id.'--->'.$registro2['Descripcion'];
        $this->actualizar($registro,$id2);
       
        $this->actualizar($registro2,$id);
       
    }
    function moverAbajo($id){
        $sql = "SELECT *FROM periodismo WHERE id = {$id}";
        $resul = $this->conectar()->query($sql);
        if (!empty($resul)) {
        } else {
            echo '<div class="alert alert-danger">Ocurrio un error3</div>';
        } 
        $registro = $resul->fetch_array(MYSQLI_BOTH);
        
        $id2 = $id+1;
        $sql = "SELECT *FROM periodismo WHERE id = {$id2}";
        $resul = $this->conectar()->query($sql);
        if (!empty($resul)) {
        } else {
            echo '<div class="alert alert-danger">Ocurrio un error2</div>';
        }
        $registro2 = $resul->fetch_array(MYSQLI_BOTH);
        $this->actualizar($registro,$id2);
       
        $this->actualizar($registro2,$id);
    }
    function actualizar($registro,$id){
        $Fecha = $registro['Fecha'];
        $Presentador = $registro['IdPresentador'];
        $Edicion = $registro['Edicion'];
        $Emitido = $registro['Emitido'];
        $Productor = $registro['IdProductor'];
        $Descripcion = $registro['Descripcion'];
        $Formato =  $registro['Formato'];
        $Ciudad = $registro['Ciudad'];
        $Periodista = $registro['IdPeriodista'];
        $Editor = $registro['IdEditor'];
        $Contenido = $registro['Contenido'];
        $Duracion = $registro['Duracion'];
        $Bloque = $registro['Bloque'];
        $Hora_Prog = $registro['Hora_Prog'];
        $mm_ss=$registro['mm_ss'];
        $sql = "UPDATE periodismo SET  Fecha='$Fecha',IdPresentador = '$Presentador'
        ,Edicion='$Edicion',Emitido='$Emitido',IdProductor='$Productor',Descripcion='$Descripcion',	
        Formato='$Formato',Ciudad='$Ciudad',IdPeriodista='$Periodista',IdEditor='$Editor',Contenido='$Contenido',	
        Duracion='$Duracion',Bloque='$Bloque',mm_ss='$mm_ss', Hora_Prog='$Hora_Prog' WHERE Id='$id'";
        $resul = $this->conectar()->query($sql);
        if (!empty($resul)) {
        } else {
            echo 'Ocurrio un error4';
        }
    }
    function obtenerMax(){
        $sql ="SELECT  *FROM periodismo";
        $resul = $this->conectar()->query($sql);
        $numRows = $resul->num_rows;
        return $numRows;
    }

}
$id = $_GET['Id'];
$sw = $_GET['sw'];


$con  = new Mover();
$max = $con->obtenerMax();
if($sw==0 and $id>1){
$con->moverArriba($id);}

if($sw==1 and $id<$max){
$con->moverAbajo($id);
}
header("Location: ../Editar.php");