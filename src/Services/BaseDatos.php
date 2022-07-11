<?php

namespace Sauto\Transportacol\Services;

use PDO;

class BaseDatos
{
    public static function Conexion()
    {
        $vendorDir = dirname(__DIR__);
        $baseDir = dirname($vendorDir);

        $bd = $baseDir . '/src/Transportacol.db';

        $c = new PDO('sqlite:' . $bd);

        return $c;
    }
}


