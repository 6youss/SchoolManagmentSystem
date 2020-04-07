
<?php
class DBController {
	private $conn;
	private $host;
	private $user;
	private $password;
	private $database;

	function __construct() {
		$url = parse_url(getenv("JAWSDB_URL"));
		$this->host = $url["host"];
		$this->user = $url["user"];
		$this->password = $url["pass"];
		$this->database = substr($url["path"], 1);
		
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->conn = $conn;			
		}
	}

	function connectDB() {		
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}

	function executeSelectQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;//print_r($resultset);print_r($row);
		}
		if(!empty($resultset))
			return $resultset;
	}
	
	function executeInsertQuery($query) {
	$result="";
	if (mysqli_query($this->conn, $query)) {
               $result= "New record created successfully";
            } else {
               $result= "Error: " . mysqli_error($this->conn);
            }
			
			return $result;
		}
		
	
}
?>
