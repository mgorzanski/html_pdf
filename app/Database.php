<?php

namespace App;
use App\Config;
use PDO;

$config = new Config;

define('DB_HOST', $config->app('mysql_host'));
define('DB_USER', $config->app('mysql_username'));
define('DB_PASS', $config->app('mysql_password'));
define('DB_BASE', $config->app('mysql_db'));
define('DB_CONN', 'mysql:host='.DB_HOST.';dbname='.DB_BASE);

class Database {
	private static $_instance;
	public function __construct() {}
	public function __clone() {}
	public static function getInstance() {
		$pdo_opts[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
		$pdo_opts[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		if(!isset(self::$_instance)) {
			self::$_instance = new PDO(DB_CONN, DB_USER, DB_PASS, $pdo_opts);
		}
		return self::$_instance;
	}
}

?>