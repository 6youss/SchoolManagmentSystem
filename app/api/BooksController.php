<?php
require_once("BooksRestHandler.php");
require_once("Books.php");		

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$view = $obj['view'];

/*
{///////view
	$view = "";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}*/
    
    switch($view){

        case "all":
            // to handle REST Url /mobile/list/
            $booksRestHandler = new BooksRestHandler();
            $booksRestHandler->getAllBooks();
            break;

        case "traditional":
            // to handle REST Url /mobile/list/
            $booksRestHandler = new BooksRestHandler();
            $booksRestHandler->getTraditionalBooks();
            //$booksRestHandler->getTypeBooks("traditional");
            break;
        case "electronic":
            $booksRestHandler = new BooksRestHandler();
            //$booksRestHandler->getEBooks();
            $booksRestHandler->getTypeBooks("electronic");
        break;

      

        }
        ?>