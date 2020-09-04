<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class Books {
	private $books = array();
	//private $req="";
	/*
		you should hookup the DAO here
    */
    
    public function getAllBooks(){
		$query = "SELECT * FROM booklibrary";
		$dbcontroller = new DBController();
		$this->books = $dbcontroller->executeSelectQuery($query);
		return $this->books;
    }
     
    /*public function getTraditionalBooks(){
		$query = "SELECT * FROM booklibrary where bookType='traditional'";
		$dbcontroller = new DBController();
		$this->books = $dbcontroller->executeSelectQuery($query);
		return $this->books;
    }

    public function getEBooks(){
		$query = "SELECT * FROM booklibrary where bookType='electronic'";
		$dbcontroller = new DBController();
		$this->books = $dbcontroller->executeSelectQuery($query);
		return $this->books;
	}*/
	
	public function getTypeBooks($type){
		$query = "SELECT * FROM booklibrary where bookType='".$type."'";
		$dbcontroller = new DBController();
		$this->books = $dbcontroller->executeSelectQuery($query);
		return $this->books;
    }

    public function getBooksByTitle($title){
		$query = "SELECT * FROM booklibrary where bookName='".$title."'";
		$dbcontroller = new DBController();
		$this->books = $dbcontroller->executeSelectQuery($query);
		return $this->books;
    }

    public function getBooksByAuthor($author){
		$query = "SELECT * FROM booklibrary where bookAuthor='".$author."'";
		$dbcontroller = new DBController();
		$this->books = $dbcontroller->executeSelectQuery($query);
		return $this->books;
    }

    public function getBooksByStatus($status){
		$query = "SELECT * FROM booklibrary where bookState=".$status;
		$dbcontroller = new DBController();
		$this->books = $dbcontroller->executeSelectQuery($query);
		return $this->books;
    }

    public function getBooksByTStatus($t_status){
		$query = "SELECT * FROM booklibrary where bookType='traditional' and bookState=".$t_status;
		$dbcontroller = new DBController();
		$this->books = $dbcontroller->executeSelectQuery($query);
		return $this->books;
    }

    public function getBooksByEStatus($e_status){
		$query = "SELECT * FROM booklibrary where bookType='electronic' and bookState=".$e_status;
		$dbcontroller = new DBController();
		$this->books = $dbcontroller->executeSelectQuery($query);
		return $this->books;
    }


	public function getBooksByPrice($price){
		$query = "SELECT * FROM booklibrary where bookType='traditional' and bookPrice <=".$price;
		$dbcontroller = new DBController();
		$this->books = $dbcontroller->executeSelectQuery($query);
		return $this->books;
	}
	
	public function getBooksNames(){
		$query = "SELECT bookName FROM booklibrary";
		$dbcontroller = new DBController();
		$this->books = $dbcontroller->executeSelectQuery($query);
		return $this->books;
	}
	
	public function getAuthorsNames(){
		$query = "SELECT bookAuthor FROM booklibrary";
		$dbcontroller = new DBController();
		$this->books = $dbcontroller->executeSelectQuery($query);
		return $this->books;
    }
	
	
    
}
?>