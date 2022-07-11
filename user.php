<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('Location:login.php');
}

include_once __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . "/mold/header.php";

use Sauto\Transportacol\Services\BaseDatos;


//usuario
$usuario =  $_POST['user'];

$contraseña = $_POST['pass'];

$btn = $_POST['btn'];

if ($btn == "btn") {
    //configuraion 

    $pass = password_hash($contraseña, PASSWORD_BCRYPT);

    $c = new BaseDatos();
    $conexion = $c->Conexion();

    $query = "UPDATE Login SET user='$usuario',pass='$pass' WHERE id='1'";

    $consulta = $conexion->prepare($query);

    if ($consulta->execute()) {
        print '<div class="alert alert-success" role="alert">
          EXITO! <br>  <a href="./admin.php">Volver</a>
      </div>';
    }
}
?>


<div class="section">
    <div class="card">
        <div class="card-content">
            <div class="content">
                <h2>Datos Requeridos</h2>
                <form method="post" enctype="multipart/form-data">
                    <div class="columns">

                        <div class="column">
                            <label class="label">Usuario</label>
                            <input class="input" name="user" type="text" require>
                        </div>

                        <div class="column">
                            <label class="label">Contraseña</label>
                            <input type="password" name="pass" class="input" require>
                        </div>

                    </div>



                    <br>
                    <br>

                    <button id="btn" name="btn" value="btn" class="button is-primary">Editar</button>

                </form>
            </div>

        </div>
    </div>


</div>




</div>-->