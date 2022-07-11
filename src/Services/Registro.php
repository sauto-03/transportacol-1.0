<?php

namespace Sauto\Transportacol\Services;

use Sauto\Transportacol\Services\BaseDatos;

class Registro
{
    public function Guardar($cliente, $gmail, $telefono)
    {
        $c = new BaseDatos();
        $conexion = $c->Conexion();

        $query = "INSERT INTO Clientes(cliente,gmail,telefono) VALUES('$cliente','$gmail','$telefono')";
        $accion = $conexion->prepare($query);
        $accion->execute();
    }
}
