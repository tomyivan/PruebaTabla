<?php
include_once 'conexion.php';
class InsertarDatos extends Conectar{

    public function Ingresar() { 
        session_start();
        if(!isset($_POST['edicion'])){
            if(empty($_SESSION['edicion'])){
                $Edicion[]  = 'Al Dia Revista';
            }
            else{
                $_POST['edicion'] = $_SESSION['edicion'];
                $Edicion=$_POST['edicion'];
               
            }
            
        }
        else{
            $_SESSION['edicion'] =  $_POST['edicion'];
            $Edicion=$_SESSION['edicion'];
        }
        if(!isset($_POST['realizada_en'])){
            if(empty($_SESSION['realizada_en'])){
                $Realizada_en[]   = 'La Paz';
            }
            else{
                $_POST['realizada_en'] = $_SESSION['realizada_en']; 
                $Realizada_en = $_POST['realizada_en'];
            }      
        }
        else{
            $_SESSION['realizada_en'] = $_POST['realizada_en'];
            $Realizada_en = $_SESSION['realizada_en'];
        }
        for($i=0;$i<count($Edicion);$i++){
            $EdicionAux = $Edicion[$i];
        }
        for($i=0;$i<count($Realizada_en);$i++){
            $Realizada_aux = $Realizada_en[$i];
        }
        if(!isset($_POST['fecha'])){
            $Fecha=$_SESSION['fecha']; 
        }
        else{
            $Fecha = $_POST['fecha'];
            $_SESSION['fecha'] = $_POST['fecha'];
        }
        if(!isset($_POST['descripcion'])){
            $Descripcion="";         }
        else{
            $Descripcion=$_POST['descripcion'];
        }
       
        $Presentador=1;
        $Edicion=$_SESSION['edicion'];
        $Emitido="Si";
        $Productor=$_SESSION['IdProductor'];
        $Realizada_en = $_SESSION['realizada_en'];
        $Formato="";
        $Ciudad="";
        $Periodista=1;
        $Editor=1;
        $Contenido="";
        $Duracion="00:00:00";
        $Bloque="";
       $Hora_Prog="00:00:00";
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
        
        //$_SESSION['hora_prog'] = $Hora_Prog;
        $hi = strtotime($Duracion);
        $hf = strtotime($Hora_Prog)- strtotime('midnight');
        $mm_ss = date('H:i:s',$hi+$hf);
        $sql = "INSERT INTO periodismo (id, Fecha, IdPresentador, Edicion, Emitido, IdProductor,Descripcion, Formato, Ciudad, IdPeriodista, IdEditor, Contenido, Duracion, Bloque,mm_ss, Hora_Prog ,Realiza_en)VALUES(NULL,'$Fecha', '$Presentador', '$EdicionAux', '$Emitido', '$Productor', '$Descripcion', '$Formato', '$Ciudad', '$Periodista', '$Editor', '$Contenido', '$Duracion', '$Bloque', '$mm_ss', '$Hora_Prog','$Realizada_aux')";

        $result = $this->conectar()->query($sql);
     
    if(!empty($result)){
       header('Location: ../Editar.php');
    }
    else {
        echo 'Hubo un error'; 
        }
        
    }
}
$con  = new InsertarDatos();
$con->Ingresar();
include_once 'php/renumerar.php';


