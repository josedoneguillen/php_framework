<?php namespace config; use controllers;  if (!defined("ROOT")) exit('Direct execution is not allowed');

class routes {

	//Methods
	public static function run(request $request) {
        
        $controller = $request->getController();
        $url = ROOT . "controllers" . DS . $controller . ".php";
        $method = $request->getMethod();

        if($method == "index.php") {

        	$method = "index";

        }

        $argument = $request->getArgument();

        if(is_readable($url)) {

        	require_once $url;
        	$name = "controllers\\" . $controller;
        	$controller = new $name;

        	if(!isset($argument)) {

        		$data = call_user_func(array($controller, $method));

        	} else {

        		$data = call_user_func_array(array($controller, $method), $argument);

        	}

        } else {

        	@controllers\controller::loadView('frontend/view/404');

        }

	}

}

?>