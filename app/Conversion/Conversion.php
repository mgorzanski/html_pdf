<?php

namespace App\Conversion;
use App\Conversion\ConversionController;

class Conversion {
	public function callControllerMethod($method, $args = null) {
		$ConversionController = new ConversionController;
		if($args == null) {
			call_user_func(array($ConversionController, $method));
		} else {
			$args = explode(",", $args);
			call_user_func_array(array($ConversionController, $method), $args);
		}
	}
}

?>