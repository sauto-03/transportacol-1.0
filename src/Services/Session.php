<?php

namespace Sauto\Transportacol\Services;

use Sauto\Transportacol\Services\BaseDatos;

use PDOException;

class Session
{
    public function Iniciar($user, $passv)
    {
        try {
            $con = new BaseDatos();
            $db = $con->Conexion();

            session_start();

            $query = $db->prepare("SELECT * FROM Login WHERE user = :user");
            $query->execute(array(':user' => $user));

            while ($row = $query->fetch()) {
                $id = $row['id'];
                $pass = $row['pass'];
                $user = $row['user'];

                if (password_verify($passv, $pass)) {
                    $_SESSION['user'] = $user;
                    header('Location: admin.php');
                } else {
                    header('Location: error.php');
                }
            }
        } catch (PDOException $th) {
            print $th->getMessage();
        }
    }

    public function Salir()
    {
        session_start();
        session_destroy();
        header('Location: login.php');
    }
}
