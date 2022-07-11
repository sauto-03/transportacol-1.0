<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location:login.php');
}
//!auto carga de clases
include_once  __DIR__ . "/vendor/autoload.php";
include_once  __DIR__ . "/mold/header.php";

use Sauto\Transportacol\Services\BaseDatos;
use Sauto\Transportacol\Services\Session;
use Sauto\Transportacol\Services\Correos;


$correos = new Correos();

$btn_send = $_POST['btn-mail'];
$id_gmail = $_POST['gmail'];
$msg_send = $_POST['msg-send'];

if ($btn_send == "send") {
    if ($id_gmail == "todos") {
        $correos->Envio_todos($msg_send);
    } else {
        $correos->Envio_Select($id_gmail, $msg_send);
    }
}


$c = new BaseDatos();
$bd = $c->Conexion();

$query = "SELECT * FROM Clientes LIMIT 100;";

$consulta = $bd->prepare($query);

$consulta->execute();

$clientes = $consulta->fetchAll(PDO::FETCH_ASSOC);

$btn = $_POST['salir'];

if ($btn == 'salir') {
    $salir = new Session();
    $salir->Salir();
}






$query = "SELECT * FROM login WHERE id='1'";
$exe = $bd->prepare($query);
$exe->execute();
$info = $exe->fetch(PDO::FETCH_LAZY);

$perfil = $info['user'];
$contasena = $info['pass'];


$consulta = "SELECT * FROM Serve_correo WHERE id='1' ";
$resultado = $bd->prepare($consulta);
$resultado->execute();
$datos = $resultado->fetch(PDO::FETCH_LAZY);

$id = $datos['id'];
$host = $datos['host'];
$username = $datos['user'];
$emisor = $datos['correo'];
$pass = $datos['pass'];
$puerto = $datos['puerto'];
$msg = $datos['mensage'];


$pid = $_POST['id'];
$Phost = $_POST['host'];
$Puser = $_POST['usuario'];
$Ppass = $_POST['pass'];
$Pemisor = $_POST['correo'];
$Ppuerto = $_POST['puerto'];
$Pmsg = $_POST['mensage'];
$btn = $_POST['btn'];

if ($btn == 2) {

    $consulta = "UPDATE Serve_correo SET  host='$Phost', user='$Puser',pass='$Ppass', correo='$Pemisor',puerto='$Ppuerto', mensage='$Pmsg' WHERE id='1' ";
    $exe = $bd->prepare($consulta);
    $exe->execute();
    header('Location: admin.php');
}
?>


<nav class="navbar is-fixed-top box-shadow-y " role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a  id="vista-1" class="navbar-item">
        Gestion de Correos
        </a>


        <a  id="vista-2" class="navbar-item">
        Configuracion del Servidor de correos
        </a>


        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">

            <a class="navbar-item" id="item1">
                Inicio
            </a>

            <a class="navbar-item" id="item2">
                Configuracion
            </a>


        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <form method="post">
                        <button name="salir" value="salir" class="button is-light" id="btn-salir">
                            Salir &nbsp; <i id="i" class="bi bi-box-arrow-right"></i>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</nav>

<br>

<div class="section">
    <!--vista uno-->
    <div id="correos" class="section">

        <form method="post" class="box">
            <div class="columns">
                <div class="column is-two-fifths">
                    <div class="field">
                        <label class="label">ENVIAR COREO</label>
                    </div>

                    <div class="field">
                        <label class="label">Message</label>
                        <div class="control">
                            <textarea class="textarea" name="msg-send" placeholder="Textarea"></textarea>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Enviar a todos</label>
                        <div class="control">
                            <input type="checkbox" name="gmail[]" value="todos">
                        </div>
                    </div>

                    <br>
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link" name="btn-mail" value="send">ENVIAR</button>
                        </div>
                        <div class="control">
                            <button class="button is-link is-light">CANCELAR</button>
                        </div>
                    </div>
                </div>
                <div class="column">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center thead-dark">

                                <tr>
                                    <th>Selecionar</th>
                                    <th>Cliente</th>
                                    <th>Gmail</th>
                                    <th>Telefono</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($clientes as $dat) {
                                ?>
                                    <tr>
                                        <td class="col-md-1">
                                            <input type="checkbox" name="gmail[]" value="<?php print $dat['id']; ?>">
                                        </td>
                                        <td>
                                            <?php
                                            print $dat['cliente'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            print $dat['gmail'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            print $dat['telefono'];
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>


    </div>

    <!--Vista de Configuraciones-->
    <div id="config">

        <div>

            <div class="section" id="uno-form">

                <div class="card">
                    <div class="card-content">
                        <div class="content">
                            <h2>Datos Requeridos</h2>

                            <div class="columns">

                                <div class="column">
                                    <label class="label">Host</label>
                                    <input class="input" value="<?php print $host; ?>" type="text" readonly>
                                </div>

                                <div class="column">
                                    <label class="label">Usurio</label>
                                    <input type="email" value="<?php print $username; ?>" readonly class="input" placeholder="Correo" require>
                                </div>

                            </div>

                            <div class="columns">

                                <div class="column">
                                    <label class="label">Contraseña</label>
                                    <input class="input" type="text" require value="<?php print $pass; ?>" readonly>
                                </div>

                                <div class="column">
                                    <label class="label">Correo</label>
                                    <input type="email" class="input" value="<?php print $emisor ?>" readonly require>
                                </div>

                            </div>

                            <div class="columns">

                                <div class="column">
                                    <label class="label">puerto</label>
                                    <input class="input" type="number" require value="<?php $puerto; ?>" readonly>
                                </div>

                                <div class="column">
                                    <div class="field">
                                        <label class="label">Mensage prederteminado</label>
                                        <div class="control">
                                            <textarea class="textarea" readonly placeholder="Textarea">
                                            <?php
                                            print $msg;
                                            ?>
                                        </textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <br>
                            <br>

                            <button type="button" id="btn-canvio" class="button is-primary">Editar</button>


                        </div>

                    </div>
                </div>


            </div>

            <div class="section" id="dos-form">
                <div class="card">
                    <div class="card-content">
                        <div class="content">
                            <h2>Datos Requeridos</h2>
                            <form method="post" enctype="multipart/form-data">
                                <div class="columns">
                                    <input type="hidden" name="id" value="<?php print $id; ?>">

                                    <div class="column">
                                        <label class="label">Host</label>
                                        <input class="input" type="text" value="<?php print $host; ?>" require placeholder="Nombre del participante" name="host">
                                    </div>

                                    <div class="column">
                                        <label class="label">Usurio</label>
                                        <input type="email" name="usuario" value="<?php print $username; ?>" class="input" placeholder="Correo" require>
                                    </div>

                                </div>

                                <div class="columns">

                                    <div class="column">
                                        <label class="label">Contraseña</label>
                                        <input class="input" type="text" require value="<?php print $pass; ?>" placeholder="Nombre del participante" name="pass">
                                    </div>

                                    <div class="column">
                                        <label class="label">Correo</label>
                                        <input type="email" name="correo" class="input" value="<?php print $emisor; ?>" placeholder="Correo" require>
                                    </div>

                                </div>

                                <div class="columns">

                                    <div class="column">
                                        <label class="label">puerto</label>
                                        <input class="input" type="number" value="<?php print $puerto; ?>" require placeholder="Nombre del participante" name="puerto">
                                    </div>

                                    <div class="column">
                                        <div class="field">
                                            <label class="label">Mensage prederteminado</label>
                                            <div class="control">
                                                <textarea class="textarea" name="mensage" placeholder="Textarea">
                                        <?php print $msg; ?>
                                        </textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <br>
                                <br>

                                <button class="button is-primary" name="btn" value="2">Guardar canbios</button>

                                <button class="button is-danger" type="button" id="cancelar">cancelar</button>

                            </form>
                        </div>

                    </div>
                </div>


            </div>
        </div>

    </div>



</div>


<?php
include_once  __DIR__ . "/mold/footer.php";
?>