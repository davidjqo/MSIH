<?php 

class db
{
	private $host = "localhost";
	private $dbname = "municipalidad";
	private $username = "root";
	private $password = "";
	protected $con;

	public function __construct()
	{
		try {
			// new PDO("mysql:host=localhost;dbname=messenger","root","");
			$this->con = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);

		} catch (Exception $e) {
			echo "Error, no se puede conectar a la base de datos." . $e->getMessage();
		}
	}
}

?>