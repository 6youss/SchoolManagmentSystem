<?php
require_once("SimpleRest.php");
require_once("Leaderboard.php");
		
class LeaderboardRestHandler extends SimpleRest {

	function getLeaderboard() {	

		$leaderboard = new Leaderboard();
		$rawData = $leaderboard->getLeaderboard();
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No leaderboard found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["leaderboard"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }

    public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
    }
    
}
?>