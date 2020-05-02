<?php
require_once("PaymentsRestHandler.php");
require_once("Payments.php");		


/*{///////view
	$view = "";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}

   { $studentId = "";
if(isset($_GET["studentId"]) ){
	$studentId = $_GET["studentId"];
    }}*/
    $json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$view = $obj['view'];
    $studentId = $obj['studentId'];
    
    switch($view){

        case "all":
            // to handle REST Url /mobile/list/
            $paymentsRestHandler = new PaymentsRestHandler();
            $paymentsRestHandler->getAllPayments($studentId);
            break;

        case "unpastudentId":
            // to handle REST Url /mobile/list/
            $paymentsRestHandler = new PaymentsRestHandler();
            $paymentsRestHandler->getUnpastudentIdPayments($studentId);
            break;
        case "pastudentId":
            $paymentsRestHandler = new PaymentsRestHandler();
            $paymentsRestHandler->getPastudentIdPayments($studentId);
        break;

        }
        ?>