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
    $albumId = $obj['albumId'];

switch($view){

    case "albumchildren":
        $mediaalbumsRestHandler = new MediaAlbumsRestHandler();
        $mediaalbumsRestHandler->getMediaAlbumsChildren($albumId);
    break;

    case "itemchildren":
        $mediaitemsRestHandler = new MediaItemsRestHandler();
        $mediaitemsRestHandler->getMediaItemsChildren($albumId);
    break;

    }
    ?>