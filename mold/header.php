<?php

use Sauto\Transportacol\Services\Recursos;

$img = new Recursos();
$css = new Recursos();


error_reporting(E_ALL); // Error/Exception engine, always use E_ALL

ini_set('ignore_repeated_errors', FALSE); // always use TRUE

ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment

ini_set('log_errors', FALSE); // Error/Exception file logging engine.

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="<?php $img->Img('favicon.png')  ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php $css->Css('main.css');  ?>">
    <link rel="stylesheet" href="<?php $css->Css('jquery.dataTables.min.css');  ?>">



    <!--//!DESARROLO-->
    <!--Bulma css-->
    <!--Boostrap-->
    <!--
    <link rel="stylesheet" href="http://localhost/home/boostrap/bootstrap.min.css">

    <link rel="stylesheet" href="http://localhost/home/bulma/bulma.css">
-->


    <!--//!PRODUCION-->
    <!--iconos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Transportacol</title>
</head>

<body>