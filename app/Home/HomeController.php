<?php

namespace App\Home;
use App\Controller;

class HomeController extends Controller {
    public function home() {
        $this->loadView('home');
    }

    public function aboutMe() {
        echo 'About me';
    }
}

?>