<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class ExamMarks {
	private $exammarks = array();
	//private $req="";
	/*
		you should hookup the DAO here
	*/
	public function getExamMarks($id){
		$query = "SELECT * FROM exammarks where id=".$id;
		$dbcontroller = new DBController();
		$this->exammarks = $dbcontroller->executeSelectQuery($query);
		return $this->exammarks;
	}	
	
	public function getSubjectsExamMarks($classId,$studentId){
		$query = "SELECT em.examMark,em.attendanceMark,em.markComments,
		e.examTitle,e.examDescription,e.examDate,
		cl.className,
		su.subjectTitle,
		st.fullName,st.studentRollId,st.photo
		 FROM exammarks em,examslist e,classes cl,subject su,users st 
		 where em.examId=e.id and em.classId=".$classId." and su.id=em.subjectId"
		 ." and cl.id=".$classId
		 ." and em.studentId=".$studentId." and st.id=".$studentId;
		$dbcontroller = new DBController();
		$this->exammarks = $dbcontroller->executeSelectQuery($query);
		return $this->exammarks;
	}	

	public function getStudentsExamMarks($classId,$subjectId){
		$query = "SELECT em.id,em.examId examId,em.examMark,em.attendanceMark,em.markComments,
		e.examTitle,e.examDescription,e.examDate,
		cl.className,
		su.subjectTitle,
		st.id studentId,st.fullName,st.studentRollId,st.photo
		 FROM exammarks em,examslist e,classes cl,subject su,users st 
		 where em.examId=e.id and em.classId=".$classId." and cl.id=".$classId." and em.subjectId=".$subjectId
		 ." and su.id=".$subjectId." and em.studentId=st.id";
		$dbcontroller = new DBController();
		$this->exammarks = $dbcontroller->executeSelectQuery($query);
		return $this->exammarks;
	}	
	
	public function getClassSubjectStudentExamMarks($classId,$subjectId,$studentId){
		$query = "SELECT em.examMark,em.attendanceMark,em.markComments,
		e.examTitle,e.examDescription,e.examDate,
		cl.className,
		su.subjectTitle,
		st.fullName,st.studentRollId,st.photo
		 FROM exammarks em,examslist e,classes cl,subject su,users st 
		 where em.examId=e.id and em.classId=".$classId." and cl.id=".$classId." and em.subjectId=".$subjectId." and su.id=".$subjectId
		 ." and em.studentId=".$studentId." and st.id=".$studentId;
		$dbcontroller = new DBController();
		$this->exammarks = $dbcontroller->executeSelectQuery($query);
		return $this->exammarks;
	}	

	public function getClassSubjectExamExamMarks($classId,$subjectId,$examId){
		$query = "SELECT em.examMark,em.attendanceMark,em.markComments,
		e.examTitle,e.examDescription,e.examDate,
		cl.className,
		su.subjectTitle,
		st.fullName,st.studentRollId,st.photo
		 FROM exammarks em,examslist e,classes cl,subject su,users st 
		 where em.examId=e.id and em.classId=".$classId." and cl.id=".$classId." and em.subjectId=".$subjectId." and su.id=".$subjectId
		 ." and em.examId=".$examId." and e.id=".$examId;
		$dbcontroller = new DBController();
		$this->exammarks = $dbcontroller->executeSelectQuery($query);
		return $this->exammarks;
	}	

	public function insertExamMarks($examId,$classId,$subjectId,$studentId,$examMark,$attendanceMark,$markComments){
		$query = "INSERT INTO `exammarks`(`examId`, `classId`, `subjectId`, `studentId`, `examMark`, `attendanceMark`, `markComments`) 
		VALUES (".$examId.",".$classId.",".$subjectId.",".$studentId.",'".$examMark."','".$attendanceMark."','".$markComments."')";
		$dbcontroller = new DBController();
		$this->exammarks = $dbcontroller->executeInsertQuery($query);
		return $this->exammarks;
	}	


	public function updateExamMarks($id,$examMark,$attendanceMark,$markComments){
		$query = "UPDATE `exammarks` 
		SET `examMark`='".$examMark."',`attendanceMark`='".$attendanceMark."',`markComments`='".$markComments."' where id=".$id;
		$dbcontroller = new DBController();
		$this->exammarks = $dbcontroller->executeUpdateQuery($query);
		return $this->exammarks;
	}

    
}
?>