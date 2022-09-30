<?php

include_once 'conexion.php';

class modificaDatos extends Conectar {

    public function modificar() {
        $Fecha = $_POST['fecha'];
        //$Presentador = $_POST['presentador'];
        $Edicion = $_POST['edicion'];
    
        $Realizada_en =$_POST['realizada_en']; //$_POST['realizada_en'];
        $hora = $_POST['hora_prog'];
        session_start();
        
        $_SESSION['realizada_en'] = $Realizada_en;
        $_SESSION['fecha'] = $Fecha ;
        $_SESSION['hora_prog'] = $hora;
        if(!empty($_SESSION['edicion'])){
            $Edicion2 = $_SESSION['edicion'];
            for($i = 0;$i<count($Edicion2);$i++){
                $EdicionAux2=$Edicion2[$i];
            }
        }
        else{
            $EdicionAux2 = 'Al Dia Bolivision';
        }
        for ($i = 0; $i < count($Edicion); $i++) {
            $EdicionAux = $Edicion[$i];
        }
        for($i=0;$i<count($Realizada_en);$i++){
            $Realizada_aux = $Realizada_en[$i];
        }
        if($EdicionAux != $EdicionAux2){
            if($EdicionAux =='Al Dia Revista'){            
                $Hora_Prog= '06:00:00';
            }else if($EdicionAux =='Segunda Edicion'){
                $Hora_Prog= '12:25:00';
            }
            else if($EdicionAux =='Tercera Edicion'){
                $Hora_Prog= '20:30:00';
            }
            else if($EdicionAux =='Aqui en Vivo'){
                $Hora_Prog= '23:00:00';
            }
            else if($EdicionAux =='Primera Edicion de Sabado'){
                $Hora_Prog= '12:30:00';
            }
            else if($EdicionAux =='Segunda Edicion de Sabado'){
                $Hora_Prog= '19:00:00';
            }
            else if($EdicionAux =='Primera Edicion de Domingo'){
                $Hora_Prog= '12:30:00';
            }
            else if($EdicionAux =='Segunda Edicion de Domingo'){
                $Hora_Prog= '18:30:00';
            }
            $_SESSION['hora_prog'] = $Hora_Prog;
        }
        else{
            $Hora_Prog = $_POST['hora_prog'];
        }
        
        $sql = "UPDATE periodismo SET  Fecha='$Fecha',Edicion='$EdicionAux',Hora_Prog='$Hora_Prog', Realiza_en='$Realizada_aux'";
        $resul = $this->conectar()->query($sql);
        
        
        $_SESSION['edicion'] = $Edicion;
        
        if (!empty($resul)) {
            header('Location: ../Editar.php');
        } else {
            echo 'Ocurrio un error';
        }
    }

}
$con = new modificaDatos();
$con->modificar();
