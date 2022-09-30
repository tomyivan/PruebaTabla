<?php 
    include_once 'Php/SelectList.php';
    $sel = new selectList();
    $sel->hora(); 
    if(!empty($_SESSION['edicion'])){ 
        $Edicion =$_SESSION['edicion'];
        for($i=0;$i<count($Edicion);$i++){
            $EdicionAux = $Edicion[$i];
            }}
    else{
        $EdicionAux = 'Al Dia Bolvision';
    }
    if(!empty($_SESSION['realizada_en'])){
    $Realizada_en = $_SESSION['realizada_en'];
        for($i=0;$i<count($Realizada_en);$i++){
            $RealizadaAux = $Realizada_en[$i];
        }
    }
    else{
        $RealizadaAux = 'La Paz';
    }

?>
<nav class="navbar ">
  <div class="container-fluid">
  <form class="d-flex" action="php/InsertarDatos.php" method="POST" role="Agregar">
  

      <input class="form-control me-2" type="search" placeholder="Descripcion" name='descripcion' aria-label="Search" autofocus>
    
      <button class="btn btn-primary" type="submit">Ingresar</button>
     

    </form>
    <form class="d-flex" action="php/ModificarDatos.php" method="POST" role="Editar">
                        <select id="Realizada_en" class="form-select" value="<?php echo $RealizadaAux;?>" name="realizada_en[]">
                        <?php
                        $con->Realizadaen();
                        ?>
                       </select>
                        <select id="Edicion" class="form-select" selected="<?php echo $EdicionAux;?>" name="edicion[]">
                        <?php $con->Edicion();?>
                           
                        </select>
      <input class="form-control me-2" type="date" name='fecha' value=<?php echo $_SESSION['fecha'];?>>
      <input class="form-control me-2" type="time" name='hora_prog' value=<?php echo $_SESSION['hora_prog'];?>>
      <button class="btn btn-primary" type="submit">Editar</button>
    </form>
  </div>
</nav>
