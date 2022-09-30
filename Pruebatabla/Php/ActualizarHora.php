<?php
include_once 'conexion.php';
class ActualizarHora extends Conectar{
    function actualizarHora(){
        global $resulhora;
        $this->consultaObtenerHora(1);
        $obtener = $resulhora->fetch_array(MYSQLI_BOTH);
        //if(){}
        //$obtener['Id'];
        if(!empty($obtener['Duracion']) and !empty($obtener['Hora_Prog'])){
            $aux = $this->sumar($obtener['Duracion'], $obtener['Hora_Prog']);
       
            while($obtener = $resulhora->fetch_array(MYSQLI_BOTH)){
    
                $mm_ss =$this->sumar($obtener['Duracion'], $aux);
                $aux=$mm_ss;
                $update_field= "Hora_Prog='".$aux."'";
                $this->consulta($update_field,$obtener['Id']);       
            }
        }
        
    }
    function sumar($hora1, $hora2)
    {
        list($h, $m, $s) = explode(':', $hora2); //Separo los elementos de la segunda hora
        $a = new DateTime($hora1); //Creo un DateTime
        $b = new DateInterval(sprintf('PT%sH%sM%sS', $h, $m, $s)); //Creo un DateInterval
        $a->add($b); //SUMO las horas
        return $a->format('H:i:s'); //Retorno la Suma
    }    
    public function consultaObtenerHora($id){
            global $resulhora;
            $sql_query = "SELECT *FROM periodismo  WHERE Id>='" . $id . "'"; 
            $resulhora =$this->conectar()->query($sql_query);      
            if(empty($resulhora)){
                echo 'Ocurrio un error';
            }
    }
    public function consulta($update_field,$id){
        if($update_field && $id) {
            $sql_query = "UPDATE periodismo SET $update_field WHERE Id='" . $id . "'"; 
            $resul =$this->conectar()->query($sql_query);
            if(empty($resul)){
                echo 'Ocurrio un error';
            }
        }
    }

}
$con1 = new ActualizarHora();
$con1->actualizarHora();
?>