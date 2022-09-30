<?php
class User extends Conectar{
    
    public function getUser($nombre, $pass){
        $sql = "SELECT * FROM productor WHERE Nombre='$nombre' and Pass='$pass'";
        $result = $this->conectar()->query($sql);
        $registro = $result->fetch_array(MYSQLI_BOTH);
         $_SESSION['nombre'] = $nombre;
         $_SESSION['IdProductor'] = $registro['IdProductor'];
         $_SESSION['fecha'] = date('Y-m-d');
        $numRows = $result->num_rows;//devuelve el numero de usuario con esas caracteristicas 
        if($numRows !== false && $numRows ==1){
            return True;
        }
        else{
            return False;
        }
        
    }
}