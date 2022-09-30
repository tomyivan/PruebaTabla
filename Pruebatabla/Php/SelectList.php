<?php
include_once 'conexion.php';

class selectList extends Conectar {

    public function consultaList($tabla) {
        global $resultList;
        $sql = "SELECT *FROM $tabla";
        $resultList = $this->conectar()->query($sql);
       
    }
    /*
    public function presentadorList() {
        global $resultList;
        $this->consultaList('presentador');
        while ($registro = $resultList->fetch_array(MYSQLI_BOTH)) {
            echo '<option value="' . $registro['IdPresentador'] . '">' . $registro['NombrePresentador'] . '</option>';
        }
    }
    public function periodistaList() {
        global $resultList;
        $this->consultaList('periodista');
        while ($registro = $resultList->fetch_array(MYSQLI_BOTH)) {
            echo '<option value="' . $registro['IdPeriodista'] . '">' . $registro['NombrePeriodista'] . '</option>';
        }
    }
    public function editorList() {
        global $resultList;
        $this->consultaList('editor');
        while ($registro = $resultList->fetch_array(MYSQLI_BOTH)) {
            echo '<option value="' . $registro['IdEditor'] . '">' . $registro['NombreEditor'] . '</option>';
        }
    }
    public function ModpresentadorList($consulta) {
        global $resultList;
        $this->consultaList('presentador');
        while ($registro = $resultList->fetch_array(MYSQLI_BOTH)) { 
            if($consulta == $registro['NombrePresentador']){echo '<option value="' . $registro['IdPresentador'] . '" selected>' . $registro['NombrePresentador'] . '</option>';}
            else{echo '<option value="' . $registro['IdPresentador'] . '">' . $registro['NombrePresentador'] . '</option>';}
            }
    }
    public function ModperiodistaList($consulta) {
        global $resultList;
        $this->consultaList('periodista');
        while ($registro = $resultList->fetch_array(MYSQLI_BOTH)) { 
            if($consulta == $registro['NombrePeriodista']){echo '<option value="' . $registro['IdPeriodista'] . '" selected>' . $registro['NombrePeriodista'] . '</option>';}
            else{echo '<option value="' . $registro['IdPeriodista'] . '">' . $registro['NombrePeriodista'] . '</option>';}
            }
    }
    public function ModeditorList($consulta) {
        global $resultList;
        $this->consultaList('editor');
        while ($registro = $resultList->fetch_array(MYSQLI_BOTH)) { 
            if($consulta == $registro['NombreEditor']){echo '<option value="' . $registro['IdEditor'] . '" selected>' . $registro['NombreEditor'] . '</option>';}
            else{echo '<option value="' . $registro['IdEditor'] . '">' . $registro['NombreEditor'] . '</option>';}
            }
    }
*/
//Realiza en
    public function Realizadaen(){
        global $resultList;
        $consulta = array('La Paz','Cochabamba','Santa Cruz');
        $this->consultaList('periodismo');
        
        $sw = 0;
        $numRows = $resultList->num_rows;
        if(empty($_SESSION['realizada_en']) or $numRows>=1){
            $registro = $resultList->fetch_array(MYSQLI_BOTH);
            for($i=0;$i<count($consulta);$i++) { 
                if(($consulta[$i] == $registro['Realiza_en'] )and $sw ==0 ){echo '<option value="' . $consulta[$i]. '" selected>' .$consulta[$i] . '</option>'; $sw=1;}
                else{echo '<option value="' . $consulta[$i]. '">'.$consulta[$i].'</option>';}
                }
        }
        else{
            $consulta = array('La Paz','Cochabamba','Santa Cruz');
            $Realizada_en = $_SESSION['realizada_en'];
            for($i=0;$i<count($Realizada_en);$i++){
                $Realizada_Aux = $Realizada_en[$i];
            }
            for($i=0;$i<count($consulta);$i++) { 
                if(($consulta[$i] == $Realizada_Aux)and $sw ==0 ){echo '<option value="' . $consulta[$i]. '" selected>' .$consulta[$i] . '</option>'; $sw=1;}
                else{echo '<option value="' . $consulta[$i]. '">'.$consulta[$i].'</option>';}
                }
        }   
    }
    //Edicion
    public function Edicion(){
        global $resultList;
        $consulta = array('Al Dia Revista','Segunda Edicion','Tercera Edicion','Primera Edicion de Sabado','Segunda Edicion de Sabado','Primera Edicion de Domingo','Segunda Edicion de Domingo','Aqui en Vivo');
        $this->consultaList('periodismo');

        $sw = 0;
        $numRows = $resultList->num_rows;
            if(empty($_SESSION['edicion']) or $numRows>=1){
              
                $registro = $resultList->fetch_array(MYSQLI_BOTH);
                for($i=0;$i<count($consulta);$i++) { 
                    if(($consulta[$i] == $registro['Edicion'] )and $sw ==0 ){echo '<option value="' . $consulta[$i]. '" selected>' .$consulta[$i] . '</option>'; $sw=1;}
                    else{echo '<option value="' . $consulta[$i]. '">'.$consulta[$i].'</option>';}
                    }
            }
            else{
                $consulta = array('Al Dia Revista','Segunda Edicion','Tercera Edicion','Primera Edicion de Sabado','Segunda Edicion de Sabado','Primera Edicion de Domingo','Segunda Edicion de Domingo','Aqui en Vivo');
                $Edicion = $_SESSION['edicion'];
                for($i=0;$i<count($Edicion);$i++){
                    $EdicionAux = $Edicion[$i];
                }
                for($i=0;$i<count($consulta);$i++) { 
                    if(($consulta[$i] == $EdicionAux )and $sw ==0 ){echo '<option value="' . $consulta[$i]. '" selected>' .$consulta[$i] . '</option>'; $sw=1;}
                    else{echo '<option value="' . $consulta[$i]. '">'.$consulta[$i].'</option>';}
                    }
            }
        } 
    //Presentador 
    public function hora(){
        global $resultList;
        $obtenerDatos='';
        $this->consultaList('periodismo');
        $numRows = $resultList->num_rows;
        if(empty($_SESSION['hora_prog']) and $numRows>=1){
            $registro = $resultList->fetch_array(MYSQLI_BOTH);
            $_SESSION['hora_prog'] = $registro['Hora_Prog'];
        }
      
    }
    public function tablaDinamicaPresentador(){
        global $resultList;
        $obtenerDatos='';
        $this->consultaList('presentador');
        //"Si": "Si", "No": "No"
        while($registro=$resultList->fetch_array(MYSQLI_BOTH)){
           $obtenerDatos ='"'.$obtenerDatos.$registro['IdPresentador'].'":"'.$registro['NombrePresentador'].'","'; 
           //$obtenerDatos[] = $registro['NombreEditor'];
        }
        return $obtenerDatos;
    }
    //periodista
    public function tablaDinamicaPeriodista(){
        global $resultList;
        $obtenerDatos='';
        $this->consultaList('periodista');
        while($registro=$resultList->fetch_array(MYSQLI_BOTH)){
            $obtenerDatos ='"'.$obtenerDatos.$registro['IdPeriodista'].'":"'.$registro['NombrePeriodista'].'","'; 
        }
        return $obtenerDatos;
    }
    //editor 
    public function tablaDinamicaEditor(){
        global $resultList;
        $obtenerDatos='';
        $this->consultaList('editor');
        while($registro=$resultList->fetch_array(MYSQLI_BOTH)){
           $obtenerDatos ='"'.$obtenerDatos.$registro['IdEditor'].'":"'.$registro['NombreEditor'].'","'; 
        }
        return $obtenerDatos;
    }
}
 
?>
