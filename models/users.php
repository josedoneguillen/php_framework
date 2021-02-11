<?php  namespace models;  if (!defined("ROOT")) exit('Direct execution is not allowed');

class users {

	//Attributes
    private $id;
    private $name;
    private $pass;
    private $email;
    private $img;
    private $db;

    public function __construct() {
    	$this->db = new database();
    }

	//Methods
	public function list() {

		$sql = "SELECT * FROM tbl_users";
		$data = $this->db->get($sql);
		return $data;

	}
}

?>