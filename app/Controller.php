<?php

namespace App;
use App\Helpers\Templates;

abstract class Controller {
    public function loadView($view) {
        $templates = Templates::getInstance();
        $templates->loadview($view);
    }
}

?>