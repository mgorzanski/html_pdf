<?php

namespace App;
use App\Config;
use App\Helpers\Templates;

define("DEFAULT_MOD", (new Config)->app('default_module'));

class Startup {
	public function __construct() {
		if(isset($_GET['module'])) {
			$module = ucfirst($_GET['module']);
		} else {
			$module = DEFAULT_MOD;
		}

		$this->loadModule($module);
	}

	public function loadModule($module) {
		$newModule = __NAMESPACE__.'\\'.$module.'\\'.$module;
		$newModule = new $newModule();
		if(method_exists($newModule, "useCustomLayout")) {
			$layout = call_user_func(array($newModule, "useCustomLayout"));
			$templates = Templates::getInstance();
			$templates->setLayout($layout);
		}
		$newModule->index();
	}
}



?>