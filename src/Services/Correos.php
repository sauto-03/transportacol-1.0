<?php

namespace Sauto\Transportacol\Services;

use Sauto\Transportacol\Services\BaseDatos;

//!php mailer para el envio de correos

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use PDO;

class Correos
{

    private $host;
    private $user;
    private $pass;
    private $correo;
    private $puerto;
    private $mensage;

    public  function __construct()
    {
        //Conexion a la base de datos
        $c = new BaseDatos();
        $conexion = $c->Conexion();

        //Consulta de las configuracines del servidor de correos

        $consulta = "SELECT * FROM Serve_correo WHERE id='1' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $datos = $resultado->fetch(PDO::FETCH_LAZY);

        //Pasamos a varibles los datos propiedades de la clase

        $this->host = $datos['host'];
        $this->user = $datos['user'];
        $this->pass = $datos['pass'];
        $this->correo = $datos['correo'];
        $this->puerto = $datos['puerto'];
        $this->mensage = $datos['mensage'];
    }



    public function Enviar_info($gmail)
    {

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = $this->host;
            $mail->SMTPAuth   = true;
            $mail->Username   = $this->user;
            $mail->Password   = $this->pass;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = $this->puerto;

            $mail->setFrom($this->correo);
            $mail->addAddress($gmail);

            $mail->Subject = 'Transportacol';
            $mail->Body = utf8_decode($this->mensage);

            $mail->send();
        } catch (Exception $e) {
           // print $mail->ErrorInfo;
        }
    }

    //!Envio de Correos a los gmail Selecionados
    public function Envio_Select($id, $msg)
    {
        $c = new BaseDatos();
        $conexion = $c->Conexion();

        $mail = new PHPMailer(true);

        foreach ($id as $i) {

            $query = $conexion->prepare("SELECT * FROM Clientes WHERE id =:id");
            $query->execute(array(':id' => $i));
            $gmail = $query->fetch(PDO::FETCH_LAZY);

            $correos = $gmail['gmail'];

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host       = $this->host;
                $mail->SMTPAuth   = true;
                $mail->Username   = $this->user;
                $mail->Password   = $this->pass;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;

                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');
                $mail->setFrom($this->correo);
                $mail->addAddress($correos);

                $mail->Subject = 'Transportacol';
                $mail->Body = utf8_decode($msg);

                $mail->send();
            } catch (Exception $e) {
                //print "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }

    //!Envio a todos los correos
    public function Envio_todos($msg)
    {
        $mail = new PHPMailer(true);

        //consultar todos los datos de la tabla clientes
        //!conexion ala base de datos
        $c = new BaseDatos();
        $conexion = $c->Conexion();
        //!Consulta de datos
        $query = "SELECT * FROM Clientes";
        $consulta = $conexion->prepare($query);
        $consulta->execute();

        foreach ($consulta as $correos) {
            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host       = $this->host;
                $mail->SMTPAuth   = true;
                $mail->Username   = $this->user;
                $mail->Password   = $this->pass;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = $this->puerto;


                $mail->setFrom($this->correo);
                $mail->addAddress($correos['gmail']);

                $mail->Subject = 'Transportacol';
                $mail->Body = utf8_decode($msg);

                $mail->send();
            } catch (Exception $e) {
               // print "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
}
