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

   { $title = "";
if(isset($_GET["title"]) ){
	$title = $_GET["title"];
    }}
    
    { $author = "";
        if(isset($_GET["author"]) ){
            $author = $_GET["author"];
            }}

            { $status = "";
                if(isset($_GET["status"]) ){
                    $status = $_GET["status"];
                    }}

            { $t_status = "";
                if(isset($_GET["t_status"]) ){
                    $t_status = $_GET["t_status"];
                    }}

                    { $e_status = "";
                        if(isset($_GET["e_status"]) ){
                            $e_status = $_GET["e_status"];
                            }}

                    { $price = "";
                        if(isset($_GET["price"]) ){
                            $price = $_GET["price"];
                            }}
    
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
            break;
        case "electronic":
            $booksRestHandler = new BooksRestHandler();
            $booksRestHandler->getEBooks();
        break;

        case "searchbytitle":
            $booksRestHandler = new BooksRestHandler();
            $booksRestHandler->getBooksByTitle($title);
        break;

        case "searchbyauthor":
            $booksRestHandler = new BooksRestHandler();
            $booksRestHandler->getBooksByAuthor($author);
        break;

        case "searchbystatus":
            $booksRestHandler = new BooksRestHandler();
            $booksRestHandler->getBooksByStatus($status);
        break;

        case "searchbytstatus":
            $booksRestHandler = new BooksRestHandler();
            $booksRestHandler->getBooksByTStatus($t_status);
        break;

        case "searchbyestatus":
            $booksRestHandler = new BooksRestHandler();
            $booksRestHandler->getBooksByEStatus($e_status);
        break;

        case "searchbyprice":
            $booksRestHandler = new BooksRestHandler();
            $booksRestHandler->getBooksByPrice($price);
        break;

        }
        ?>