<?php
//Introduzca aquí la información de su base de datos y el nombre del archivo de copia de seguridad.

if(!isset($_POST['edicion'])){
    if(empty($_SESSION['edicion'])){
        $Edicion[]  = '';
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
        $Realizada_en[]   = '';
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
if(empty($_SESSION['fecha'])){
$fecha = date('Y-m-d');
}
else{
    $fecha = $_SESSION['fecha'];
}
for($i=0;$i<count($Edicion);$i++){
    $EdicionAux = $Edicion[$i];
}
for($i=0;$i<count($Realizada_en);$i++){
    $Realizada_aux = $Realizada_en[$i];
}
$mysqlDatabaseName ='periodismo';
$mysqlUserName ='root';
$mysqlPassword ='';
$mysqlHostName ='localhost';
$mysqlExportPath ="Escaleta-$Realizada_aux-$EdicionAux-$fecha.sql";
$mysqlExportPath = str_replace(" ","_",$mysqlExportPath);
$directorio  = 'C:\\xampp\\htdocs\\ProyectoPrensaV4\\Tablas\\'.$mysqlExportPath;
//Por favor, no haga ningún cambio en los siguientes puntos
//Exportación de la base de datos y salida del status
$command='C:\xampp\mysql\bin\mysqldump.exe --opt -h' .$mysqlHostName .' -u' .$mysqlUserName .' --password="' .$mysqlPassword .'" ' .$mysqlDatabaseName .' periodismo > ' .$directorio;
exec($command,$output,$worked);


$conexionB = new mysqli($mysqlHostName,$mysqlUserName,$mysqlPassword,$mysqlDatabaseName);
$sql = "DELETE FROM  periodismo";
$conexionB->query($sql);
$conR =new mysqli($mysqlHostName,$mysqlUserName,$mysqlPassword);
if($conR->connect_error){
    die("Fallo de Conexión: " . $conR->connect_error);
} 

?>