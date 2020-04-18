<?php
require_once("TransportationRestHandler.php");
require_once("Transportation.php");		

/*
{///////view
	$view = "";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}*/

    $json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
     $obj = json_decode($json,true);
    
	 // name store into $name.
    $view = $obj['view'];
    $id=$obj['id'];
    
    switch($view){

        case "get":
            // to handle REST Url /mobile/list/
            $transportaionRestHandler = new TransportationRestHandler();
            $transportaionRestHandler->getTransportation($id);
            break;


        }
        ?>