<?php
require_once("SimpleRest.php");
require_once("News.php");
		
class NewsRestHandler extends SimpleRest {

	function getNews($role) {	

		$news = new News();
		$rawData = $news->getNews($role);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No news found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["all news"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }

	function getAllNews() {	

		$news = new News();
		$rawData = $news->getAllNews();
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No news found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["all news"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }


    function getStudentsNews() {	

		$news = new News();
		$rawData = $news->getStudentsNews();
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No students news found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["student news"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }

    function getTeachersNews() {	

		$news = new News();
		$rawData = $news->getTeachersNews();
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No teachers news found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["teacher news"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }

    function getParentsNews() {	

		$news = new News();
		$rawData = $news->getParentsNews();
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No parents news found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["parent news"] = $rawData;
				
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