<?php
require_once("BooksRestHandler.php");
require_once("Books.php");		

/*$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
    $searchCriteria = $obj['searchCriteria'];
    $searchValue= $obj['value'];*/
    
    { $title = "";
        if(isset($_GET["searchCriteria"]) && isset($_GET["searchValue"])){
            $searchCriteria = $_GET["searchCriteria"];
            $searchValue = $_GET["searchValue"];
            }}
            
            
            
            switch($searchCriteria){
        
        
                case "searchbytitle":
                    $booksRestHandler = new BooksRestHandler();
                    $booksRestHandler->getBooksByTitle($searchValue);
                break;
        
                case "searchbyauthor":
                    $booksRestHandler = new BooksRestHandler();
                    $booksRestHandler->getBooksByAuthor($searchValue);
                break;
        
                case "searchbystatus":
                    $booksRestHandler = new BooksRestHandler();
                    $booksRestHandler->getBooksByStatus($searchValue);
                break;
        
                case "searchbytstatus":
                    $booksRestHandler = new BooksRestHandler();
                    $booksRestHandler->getBooksByTStatus($searchValue);
                break;
        
                case "searchbyestatus":
                    $booksRestHandler = new BooksRestHandler();
                    $booksRestHandler->getBooksByEStatus($searchValue);
                break;
        
                case "searchbyprice":
                    $booksRestHandler = new BooksRestHandler();
                    $booksRestHandler->getBooksByPrice($searchValue);
                break;
        
                }
                ?>