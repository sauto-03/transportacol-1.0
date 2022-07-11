<?php
//!auto carga de clases

include_once  __DIR__ . "/vendor/autoload.php";

//!parte superior
include_once __DIR__ . "/mold/header.php";

use Sauto\Transportacol\Services\Correos;
use Sauto\Transportacol\Services\Registro;

$cliente = $_POST['cliente'];
$gmail = $_POST['gmail'];
$telefono = $_POST['telefono'];


$btn = $_POST['btn2'];

$correo = new Correos();

$resgistro = new Registro();

if ($btn == 'registrar') {
    $resgistro->Guardar($cliente, $gmail, $telefono);
    $correo->Enviar_info($gmail);
}

?>

<header class="header">
    <figure class="image is-16by8 is-640x360 ">
        <img src="<?php $img->Img('inicio.png') ?>">
    </figure>
</header>

<br>


<div class="section">


    <div class="servicos">

        <div class="card mb-3" style="max-width: 1200px;" id="color-fondo">
            <div class="row g-0">
                <div class="col-md-7">
                    <img src="<?php $img->Img('baner1.png') ?>" class="img-fluid rounded-start" alt="...">

                </div>
                <div class="col-md-4">
                    <div class="card-body">

                        <br>
                        <h2 class="card-title" id="color2" style="text-align: justify;">Nuestros servicios</h2>
                        <ul class="lista">
                            <li id="color2-c" style="text-align: justify;" class="sangria">
                                Ejecutivo
                            </li>
                            <li id="color2-c" style="text-align: justify;" class="sangria">
                                Transporte Empresarial
                            </li>
                            <li id="color2-c" style="text-align: justify;" class="sangria">
                                Transporte Escolar
                            </li>
                            <li id="color2-c" style="text-align: justify;" class="sangria">
                                Transporte Turístico
                            </li>
                            <li id="color2-c" style="text-align: justify;" class="sangria">
                                Transporte Usuarios de <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;la Salud
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <br>
    <!--targeta uno-->
    <div class="servicos">
        <div class="card mb-3" style="max-width: 900px;">
            <div class="row g-0">
                <div class="col-md-5" id="color-fondo">
                    <div class="card-body">
                        <h1 id="color-title" style="text-align: center;" class="card-title"> Transporte Ejecutivo</h1>
                        <p id="color2" class="text-card-mi" style="text-align: center; padding: 12px;">
                            Prestamos servicio de translado desde y hacia el aeropuerto, hoteles y diferentes
                            destinos adentro y fuera de la ciudad
                        </p>
                        <p class="read-more">
                            <a href="#contactos" id="btn-ir" class="btn btn-secondary">Cotiza Ahora</a>
                        </p>
                    </div>
                </div>

                <div class="col-md-7">
                    <img src="<?php $img->Img('w3.jpg') ?>" class="img-fluid rounded-start" alt="...">
                </div>
            </div>
        </div>
    </div>


    <!--targeta dos-->

    <div class="servicos">
        <div class="card mb-3" style="max-width: 900px;">
            <div class="row g-0">

                <div class="col-md-7">
                    <img src="<?php $img->Img('w0.jpg') ?>" class="img-fluid rounded-start" width="800px" alt="...">
                </div>

                <div class="col-md-5" id="color-fondo">
                    <div class="card-body">
                        <h1 id="color-title" class="card-title" style="text-align: center;">Transporte Empresarial</h1>
                        <div class="text2">
                            <li id="color2" style="font-size: 18px;" class="sangria2">
                                Servicio de transporte a nivel nacional
                            </li>
                            <li id="color2" class="sangria2" style="font-size: 18px;">
                                Translados desde y hacia su empresa&nbsp;&nbsp;&nbsp;&nbsp;
                            </li>
                            <br>
                            <p class="read-more">
                                <a href="#contactos" class="btn btn-secondary">Cotiza Ahora</a>
                            </p>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!--targeta tres-->

    <div class="servicos">
        <div class="card mb-3" style="max-width: 900px;">
            <div class="row g-0">
                <div class="col-md-5" id="color-fondo">
                    <div class="card-body">
                        <h1 id="color-title" class="card-title" style="text-align:center ;">Transporte Escolar</h1>
                        <p id="color2" class="text-card-mi" style="text-align: center; padding: 12px;">
                            Cumplimos con todas las normas exigidas para la presentación del servicio de transporte
                            escolar
                        </p>
                        <p class="read-more">
                            <a href="#contactos" class="btn btn-secondary">Cotiza Ahora</a>
                        </p>
                    </div>
                </div>

                <div class="col-md-7">
                    <img src="<?php $img->Img('w2.jpg') ?>" class="img-fluid rounded-start" alt="...">
                </div>
            </div>
        </div>
    </div>

    <!--targeta cuatro-->

    <div class="servicos">
        <div class="card mb-3" style="max-width: 900px;">
            <div class="row g-0">

                <div class="col-md-7">
                    <img src="<?php $img->Img('w1.jpg') ?>" class="img-fluid rounded-start" width="800px" alt="...">
                </div>

                <div class="col-md-5" id="color-fondo">
                    <div class="card-body">

                        <h1 id="color-title" class="card-title" style="text-align:center ;">Transporte Turístico</h1>
                        <p id="color2" class="text-card-mi" style="text-align: center; padding: 12px;">
                            Prestamos servicio de translado para eventos, reuniones, tours, entre otros a nivel
                            regional y/o nacional
                        </p>
                        <p class="read-more">
                            <a class="btn btn-secondary" href="#contactos">Cotiza Ahora</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!--targeta cinco-->
    <div class="servicos">
        <div class="card mb-3" style="max-width: 900px;">
            <div class="row g-0">
                <div class="col-md-5" id="color-fondo">
                    <div class="card-body">

                        <h1 id="color-title" class="card-title" style="text-align:center ;">Transporte de Usuarios</h1>
                        <p id="color2" class="text-card-mi" style="text-align: center; padding: 12px;">
                            Servicio de translado para funcionarios, personal de la salud, pacientes y/o
                            acompañantes desde sus hogares hacia los centros de atención y/o entre centros de
                            atención
                        </p>
                        <p class="read-more">
                            <a href="#contactos" class="btn btn-secondary">Cotiza Ahora</a>
                        </p>
                    </div>
                </div>

                <div class="col-md-7">
                    <img src="<?php $img->Img('w5.jpg') ?>" class="img-fluid rounded-start" alt="...">
                </div>
            </div>
        </div>
    </div>

</div>



<!--Formulario-->

<h1 class="logo">Contacto</h1>

<div class="servicos" id="contacto">
    <div class="card mb-3" style="max-width: 1000px;" id="color-fondo2">
        <div class="row g-0">
            <div class="col-md-7">
                <div class="card-body">
                    <form method="POST">
                        <label id="color2-c">Nombre</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input type="text" class="form-control" name="cliente" placeholder="Nombre.." aria-label="Username" aria-describedby="basic-addon1">
                        </div>


                        <label id="color2-c">Correo</label>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" class="form-control" name="gmail" placeholder="Correo.." aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <label id="color2-c">Telefono</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-telephone-fill"></i>
                            </span>
                            <input type="text" class="form-control" name="telefono" placeholder="Telefono.." aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <button name="btn2" value="registrar" class="btn btn-primary"><i class="bi bi-send-fill"></i>Enviar</button>

                    </form>
                </div>
            </div>

            <!--informacion-->
            <div class="col-md-4">
                <h4 id="color2"> Info</h4>
                <ul>
                    <li id="color2"><i class="bi bi-envelope-fill" id="color2"></i> (111) 111 111 111</li>
                    <li id="color2"><i class="bi bi-telephone-fill" id="color2"></i> contact@website.com</li>
                </ul>
                <p id="color2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero provident ipsam necessitatibus repellendus?</p>
                <p id="color2">Company.com</p>
            </div>
        </div>
    </div>

</div>

<br>


<!--Pie de pagina-->

<footer class="bg-dark text-center text-white">
    <figure class="image is-16by8 is-640x360 ">
        <img src="<?php $img->Img('footer.png') ?>">
    </figure>

    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                <i class="bi bi-facebook">
                </i>
            </a>
            <!-- Twitter -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                <i class="bi bi-whatsapp">
                </i>
            </a>
            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                <i class="bi bi-instagram">
                </i>
            </a>
        </section>
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © Santiago
    </div>
    <!-- Copyright -->
</footer>



<?php
include_once __DIR__ . "/mold/footer.php";

?>