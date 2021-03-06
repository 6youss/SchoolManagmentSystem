<?php
require_once("SimpleRest.php");
require_once("Assignments.php");
		
class AssignmentsRestHandler extends SimpleRest {

	function getAllAssignments() {	

		$assignments = new Assignments();
		$rawData = $assignments->getAllAssignments();
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No assignments found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["assignments"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
	function clearTable($tableName) {	

		$assignments = new Assignments();
		$rawData = $assignments->clearTable($tableName);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No assignments deleted!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["delete status"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }

    function getClassAssignments($id) {	

		$assignments = new Assignments();
		$rawData = $assignments->getClassAssignments($id);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No class assignments found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["class assignments"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }

    function getClassSubjectAssignments($id,$subjectId) {	

		$assignments = new Assignments();
		$rawData = $assignments->getClassSubjectAssignments($id,$subjectId);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No subject assignments found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["class subject assignments"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
	}
	
	function getTeacherClassAssignments($uid,$id) {	

		$assignments = new Assignments();
		$rawData = $assignments->getTeacherClassAssignments($uid,$id);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No teacher class assignments found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["teacher class assignments"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }

    function getTeacherSubjectAssignments($uid,$id) {	

		$assignments = new Assignments();
		$rawData = $assignments->getTeacherSubjectAssignments($uid,$id);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No teacher subject assignments found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["teacher subject assignments"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }


    function getTeacherAssignments($id) {	

		$assignments = new Assignments();
		$rawData = $assignments->getTeacherAssignments($id);
        
		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No teacher assignments found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
		
		$result["teacher assignments"] = $rawData;
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($result);
			echo $response;
		}
    }

    


    
    function InsertAssignment($classId,$subjectId,$teacherId,$assignmentTitle,$assignmentDescription,$assignmentFile,$assignmentDeadLine){
        $assignment = new Assignments();
        $rawData = $assignment->InsertAssignment($classId,$subjectId,$teacherId,$assignmentTitle,$assignmentDescription,$assignmentFile,$assignmentDeadLine);
        
        
        if(empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'ERROR !');		
        } else {
            $statusCode = 200;
            
        }

        $requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
        $this ->setHttpHeaders($requestContentType, $statusCode);
        
        $result["insert status"] = $rawData;
                
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