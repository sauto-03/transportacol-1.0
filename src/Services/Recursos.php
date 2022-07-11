<?php

namespace Sauto\Transportacol\Services;

class Recursos
{

    public function Css($nombre)
    {

        return print 'src/Public/' . 'css/' . $nombre;
    }

    
    public function Js($nombre)
    {

        return print 'src/Public/' . 'js/' . $nombre;
    }



    public function Img($nombre)
    {
        return print 'src/Public/' . 'img/' . $nombre;
    }
}
