<?php
session_destroy();
   session_start();
if(isset($_POST['submit'])){
    $username = $_POST['nombre'];
    $pass = $_POST['pass'];
    if(empty($username)|| empty($pass)){
        echo '<div class="alert alert-danger">Nombre de Usuario vacio</div>';
    }
    else{
        $user = new User();
        if($user ->getUser($username, $pass)){
         
           
            header('Location: Escaloneta.php');
        }
        
        else{
            echo '<div class="alert alert-danger">Usuario no Existe</div>';
        }
    }
}