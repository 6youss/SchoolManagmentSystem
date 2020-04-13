<?php
require_once("MediaItemsRestHandler.php");
require_once("MediaItems.php");		


{///////view
	$view = "";
if(isset($_GET["view"]) ){
	$view = $_GET["view"];
    }}
    
{///////album id
	$id = "";
if(isset($_GET["id"]) ){
	$id = $_GET["id"];
    }}

    switch($view){

        case "all":
            // to handle REST Url /mobile/list/
            $mediaitemsRestHandler = new MediaItemsRestHandler();
            $mediaitemsRestHandler->getMediaItems();
            break;

            case "children":
                $mediaitemsRestHandler = new MediaItemsRestHandler();
                $mediaitemsRestHandler->getMediaItemsChildren($id);
            break;


        }
        ?>