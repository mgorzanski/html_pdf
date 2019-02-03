<?php

namespace App;

class Config {
	function app($option) {
		require __DIR__.'/../config/app.php';
		return $app[$option];
	}
}

?>