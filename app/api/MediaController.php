<?php
require_once("MediaAlbumsRestHandler.php");
require_once("MediaAlbums.php");
require_once("MediaItemsRestHandler.php");
require_once("MediaItems.php");	

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
    $view = $obj['view'];

switch($view){

    case "allalbums":
        // to handle REST Url /mobile/list/
        $mediaalbumsRestHandler = new MediaAlbumsRestHandler();
        $mediaalbumsRestHandler->getMediaAlbums();
        break;

    case "allitems":
        // to handle REST Url /mobile/list/
        $mediaitemsRestHandler = new MediaItemsRestHandler();
        $mediaitemsRestHandler->getMediaItems();
        break;


    }
    ?>