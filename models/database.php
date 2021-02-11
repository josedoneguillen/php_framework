<?php  namespace models; if (!defined("ROOT")) exit('Direct execution is not allowed');

class database {

	//Attributes
	private $host = "localhost";
	private $user = "root";
	private $password = "Abcd1234.";
	private $db = "db_framework";
	private $con;

	//Methods
	public function __construct() {

		$this->con = new \mysqli(
			$this->host, 
			$this->user, 
			$this->password, 
			$this->db
		);
        
        /* Testing conection errors */
        if (mysqli_connect_errno()) {
            printf("Falló la conexión: %s\n", mysqli_connect_error());
            exit();
        }

       /* Change characters to utf8 */
        if (!$this->con->set_charset("utf8")) {

            printf("Error loading characters utf8: %s\n", $this->con->error);
            exit();

        }

	}
    
    /* Simple query */
	public function consult($sql) {

		$this->con->query($sql);

	}
    
    /* Query Return */
	public function get($sql) {

		$data = $this->con->query($sql);
		return $data;

	}

	public function __destruct() {

        /* Close conection */
		$this->con->close();

	}
} 

?>