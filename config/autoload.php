<?php namespace config; use controllers; if (!defined("ROOT")) exit('Direct execution is not allowed');

class autoload {

	//Methods
	public static function run() {

		spl_autoload_register(function($class){

			$ruta = str_replace("\\", "/", $class) . ".php";

			if (is_readable($ruta)) {

				include_once $ruta;

			} else {

				@controllers\controller::loadView('frontend/view/404');
			}

		});
	}
}

?>