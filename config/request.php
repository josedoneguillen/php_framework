<?php  namespace config; if (!defined("ROOT")) exit('Direct execution is not allowed');

class request {

	//Attributes
	private $controller;
	private $method;
	private $argument;

    //Methods
	public function __construct(){

        if (isset($_GET['url'])) {

	        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
	        $url = explode('/', $url);
	        $url = array_filter($url);

	        if ($url[0] == "index.php") {

	        	$this->controller = "welcome";

	        } else {

	        	$this->controller = strtolower(array_shift($url));

	        }

	        $this->method = strtolower(array_shift($url));

	        if(!$this->method) {

	        	$this->method = "index";
	        	
	        } 

	        $this->argument = $url;

        } else {
             
            $this->controller = "welcome";
            $this->method = "index";

        }

    }

    public function getController() {
    	return $this->controller;
    }

    public function getMethod() {
    	return $this->method;
    }    

    public function getArgument() {
    	return $this->argument;
    }
    
}

?>