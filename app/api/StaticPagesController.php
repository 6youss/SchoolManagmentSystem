<?php
require_once("StaticPagesRestHandler.php");
require_once("StaticPages.php");		


$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$view = $obj['view'];
    
    switch($view){

        case "all":
            // to handle REST Url /mobile/list/
            $staticpagesRestHandler = new StaticPagesRestHandler();
            $staticpagesRestHandler->getAllStaticPages();
            break;


        }
        ?>