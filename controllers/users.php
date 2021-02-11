<?php  namespace controllers; if (!defined("ROOT")) exit('Direct execution is not allowed');

use models\users as usersModel;

class users extends controller {

	//Attributes
	private $usersModel;

	//Methods
	public function __construct() {
      $this->usersModel = new usersModel();
	}

	public function index() {
        
        $data = ['nombre' => 'John Doe', 'email'=>'jdoe@email.com'];
		$this->loadView('frontend/view/login', $data);

	}

	public function list() {

		if ($_POST) {

	    $data = $this->usersModel->list();
		$result = mysqli_fetch_all($data,MYSQLI_ASSOC);
		print_r(json_encode($result));

		} else {

			echo "Send a post request first";
		}

	}

}

?>