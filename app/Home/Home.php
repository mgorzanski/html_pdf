<?php

namespace App\Home;
use App\Home\HomeController;

class Home {
	public function index() {
		//$HomeController = new HomeController;

		if(!empty($_GET['page'])) {
			if($_GET['page'] == 'home') {
				(new HomeController)->home();
			} elseif($_GET['page'] == 'about-me') {
				(new HomeController)->aboutMe();
			}
		} else {
			(new HomeController)->home();
		}
	}

	public function createTables() {

	}

	public function dropTables() {

	}
}

?>