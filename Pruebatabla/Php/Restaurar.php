<?php
//include_once 'Backups.php';
$Edicion = $_POST['edicion'];
$Realizada_en = $_POST['realizada_en'];

for($i=0;$i<count($Edicion);$i++){
    $EdicionAux = $Edicion[$i];
}
for($i=0;$i<count($Realizada_en);$i++){
    $Realizada_aux = $Realizada_en[$i];
}
$Fecha = $_POST['fecha'];
$mysqlDatabaseName ='periodismo';
$mysqlUserName ='root';
$mysqlPassword ='';
$mysqlHostName ='localhost';
$mysqlExportPath ='Escaleta-'.$Realizada_aux.'-'.$EdicionAux.'-'.$Fecha.'.sql';
$mysqlExportPath = str_replace(" ","_",$mysqlExportPath);

$conexionB = new mysqli($mysqlHostName,$mysqlUserName,$mysqlPassword,$mysqlDatabaseName);
$directorio  = 'C:\\xampp\\htdocs\\ProyectoPrensaV4\\Tablas\\'.$mysqlExportPath;
if(file_exists($directorio))
{
    $sql = "DROP TABLE periodismo";
    $conexionB->query($sql);
    $conR =new mysqli($mysqlHostName,$mysqlUserName,$mysqlPassword);
    if($conR->connect_error){
    die("Fallo de Conexión: " . $conR->connect_error);
    } 

    $command='C:\xampp\mysql\bin\mysql.exe --user=' .$mysqlUserName .' --password="' .$mysqlPassword .'" ' .$mysqlDatabaseName .' < ' .$directorio;

    exec($command,$output,$worked);
    system($command,$error);

    header('location: ../Editar.php');

}
else{
    echo '<script>if(confirm("No existe Escaleta registrada con las caracteristicas")){window.location.href ="../Escaloneta.php"}</script>';
    
}

?>