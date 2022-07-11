<?php

//!auto carga de clases
include_once  __DIR__ . "/vendor/autoload.php";

//!parte superior
include_once __DIR__ . "/mold/header.php";

use Sauto\Transportacol\Services\Session;

$user = $_POST['usuario'];
$pass = $_POST['password'];

$btn2 = $_POST['btn2'];

$login = new Session();

if ($btn2 == 'login') {
    $login->Iniciar($user, $pass);
}


?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <img src="<?php $img->Img('favicon.png') ?>" class="col-lg-6 d-none d-lg-block ">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">¡ Bienvenido !</h1>
                                </div>
                                <form method="POST">

                                    <div class="form-group">
                                        <input type="text" name="usuario" class="form-control" placeholder="usuario">
                                    </div>

                                    <br>

                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control " id="password" placeholder="Password">
                                    </div>

                                    <br>

                                    <button class="btn btn-primary btn-block" name="btn2" value="login">
                                        <i class="bi bi-person-fill"></i> Login
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>





<?php
include_once __DIR__ . "/mold/footer.php";
?>