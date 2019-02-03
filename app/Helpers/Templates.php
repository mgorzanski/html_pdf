<?php

namespace App\Helpers;
use App\Config;

class Templates {
	private static $instance;
	public $layout = "layout";
	public $items = array();

	public static function getInstance() {
		if(self::$instance === null) {
			self::$instance = new Templates();
		}
		return self::$instance;
	}

	public function setLayout($layout) {
		$this->layout = $layout;
	}

	public function loadView($view, $data = array()) {
		$layout = $this;
		require __DIR__.'/../../templates/views/'.$view.'.php';
		if(strstr($this->layout, '/')) {
			require __DIR__.'/../../templates/views/'.$this->layout.'.php';
		} else {
			require __DIR__.'/../../templates/'.$this->layout.'.php';
		}
	}

	public function seperate($item) {
		echo $this->items[$item];
	}

	public function fill($item, $content) {
		$this->items[$item] = $content;
	}

	public function baseDir() {
		$config = new Config;
		if($config->app('is_in_root')) {
			return "/".$config->app('root')."/public";
		} else {
			return "/".$config->app('root');
		}
		
	}
}

?>