<?php
require_once("MediaAlbumsRestHandler.php");
require_once("MediaAlbums.php");		


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
            $mediaalbumsRestHandler = new MediaAlbumsRestHandler();
            $mediaalbumsRestHandler->getMediaAlbums();
            break;

            case "children":
                $mediaalbumsRestHandler = new MediaAlbumsRestHandler();
                $mediaalbumsRestHandler->getMediaAlbumsChildren($id);
            break;


        }
        ?>