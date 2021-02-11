<?php  namespace controllers; if (!defined("ROOT")) exit('Direct execution is not allowed');

class controller {

	//Methods
	public function set($index, $value) {
      $this->$index = $value;
	}

	public function get($index) {
      return $this->$index;
	}

	 public function loadView($view, $data = FALSE) {

		$header = ROOT . "views" . DS . "frontend" . DS . "template" . DS . "header.php";
    	$view = ROOT . "views" . DS . $view . ".php";
		$footer = ROOT . "views" . DS . "frontend" . DS . "template" . DS . "footer.php";

		if (is_readable($header)) {
            require_once $header;
        }

        if (is_readable($view)) {
            require_once $view;
        }

		if (is_readable($footer)) {
            require_once $footer;
        }
    }

}

?>