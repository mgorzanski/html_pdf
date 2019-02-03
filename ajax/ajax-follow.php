<?php

require __DIR__.'/../vendor/autoload.php';

if(!empty($_POST['module'])) {
    $Ajax = new App\Ajax;
    $Ajax->callModule($_POST);
}

?>