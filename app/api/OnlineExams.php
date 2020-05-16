<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class OnlineExams {
	private $onlineExams = array();
	//private $req="";
	/*
		you should hookup the DAO here
	*/
	public function getOnlineExams($classId,$studentId,$date){
        $dbcontroller = new DBController();
		$query = "SELECT id FROM onlineexams where id not in (select examId from onlineexamsgrades where studentId=".$studentId.")";
        $ids=$dbcontroller->executeSelectQuery($query);
        $query = "SELECT examClass FROM onlineexams where id not in (select examId from onlineexamsgrades where studentId=".$studentId.")";
        $classes=$dbcontroller->executeSelectQuery($query);
        $fids=array();
        for($i=0;$i<sizeof($ids);$i++){
            $str=substr($classes[$i]["examClass"],1,-1);
            $cida=explode(",",$str);
            for($j=0;$j<sizeof($cida);$j++){
            if(substr($cida[$j],1,-1)==$classId){
                array_push($fids,$ids[$i]["id"]);
            }
            }
            $query = "SELECT oe.id,oe.examTitle,oe.examDescription,oe.examQuestion,oe.examDate,oe.ExamEndDate,
            s.id subjectId,s.subjectTitle
            FROM onlineexams oe,subject s where oe.examSubject=s.id and (oe.id=";
            for($k=0;$k<sizeof($fids);$k++){
            if($k==(sizeof($fids)-1)){
                $query=$query.$fids[$k].")";
            }else{
                $query=$query.$fids[$k]." or oe.id=";
            }
            }
            }
        $exams=$dbcontroller->executeSelectQuery($query);
        for($i=0;$i<sizeof($exams);$i++){
            if(intval($exams[$i]['ExamEndDate']) < intval($date)){
                $exams[$i]['status']=0;
                $startDate=date('m/d/Y',intval($exams[$i]['examDate']));
                $exams[$i]['examDate']=$startDate;
                $endDate=date('m/d/Y',intval($exams[$i]['ExamEndDate']));
                $exams[$i]['ExamEndDate']=$endDate;
                array_push($this->onlineExams,$exams[$i]);
            }else{
                $exams[$i]['status']=1;
                $startDate=date('m/d/Y',intval($exams[$i]['examDate']));
                $exams[$i]['examDate']=$startDate;
                $endDate=date('m/d/Y',intval($exams[$i]['ExamEndDate']));
                $exams[$i]['ExamEndDate']=$endDate;
                array_push($this->onlineExams,$exams[$i]);
            }
        }
        $query = "SELECT oe.id,oe.examTitle,oe.examDescription,oe.examQuestion,oe.examDate,oe.ExamEndDate,
        s.id subjectId,s.subjectTitle
        FROM onlineexams oe,subject s where oe.examSubject=s.id and oe.id in (select examId from onlineexamsgrades where studentId=".$studentId.")";
        $exams=$dbcontroller->executeSelectQuery($query);
        for($i=0;$i<sizeof($exams);$i++){
        $exams[$i]['status']=2;
        $startDate=date('m/d/Y',intval($exams[$i]['examDate']));
        $exams[$i]['examDate']=$startDate;
        $endDate=date('m/d/Y',intval($exams[$i]['ExamEndDate']));
        $exams[$i]['ExamEndDate']=$endDate;
        array_push($this->onlineExams,$exams[$i]);
        }
		return $this->onlineExams;
    }	
    

    public function getSubjectOnlineExams($classId,$studentId,$subjectId,$date){
        $dbcontroller = new DBController();
		$query = "SELECT id FROM onlineexams where examSubject= ".$subjectId." and id not in (select examId from onlineexamsgrades where studentId=".$studentId.")";
        $ids=$dbcontroller->executeSelectQuery($query);
        $query = "SELECT examClass FROM onlineexams where examSubject= ".$subjectId." and id not in (select examId from onlineexamsgrades where studentId=".$studentId.")";
        $classes=$dbcontroller->executeSelectQuery($query);
        $fids=array();
        for($i=0;$i<sizeof($ids);$i++){
            $str=substr($classes[$i]["examClass"],1,-1);
            $cida=explode(",",$str);
            for($j=0;$j<sizeof($cida);$j++){
            if(substr($cida[$j],1,-1)==$classId){
                array_push($fids,$ids[$i]["id"]);
            }
            }
            $query = "SELECT oe.id,oe.examTitle,oe.examDescription,oe.examQuestion,oe.examDate,oe.ExamEndDate,
            s.id subjectId,s.subjectTitle
            FROM onlineexams oe,subject s where oe.examSubject=s.id and (oe.id=";
            for($k=0;$k<sizeof($fids);$k++){
            if($k==(sizeof($fids)-1)){
                $query=$query.$fids[$k].")";
            }else{
                $query=$query.$fids[$k]." or oe.id=";
            }
            }
            }
        $exams=$dbcontroller->executeSelectQuery($query);
        for($i=0;$i<sizeof($exams);$i++){
            if(intval($exams[$i]['ExamEndDate']) < intval($date)){
                $exams[$i]['status']=0;
                $startDate=date('m/d/Y',intval($exams[$i]['examDate']));
                $exams[$i]['examDate']=$startDate;
                $endDate=date('m/d/Y',intval($exams[$i]['ExamEndDate']));
                $exams[$i]['ExamEndDate']=$endDate;
                array_push($this->onlineExams,$exams[$i]);
            }else{
                $exams[$i]['status']=1;
                $startDate=date('m/d/Y',intval($exams[$i]['examDate']));
                $exams[$i]['examDate']=$startDate;
                $endDate=date('m/d/Y',intval($exams[$i]['ExamEndDate']));
                $exams[$i]['ExamEndDate']=$endDate;
                array_push($this->onlineExams,$exams[$i]);
            }
        }
        $query = "SELECT oe.id,oe.examTitle,oe.examDescription,oe.examQuestion,oe.examDate,oe.ExamEndDate,
        s.id subjectId,s.subjectTitle
        FROM onlineexams oe,subject s where oe.examSubject= ".$subjectId." and oe.examSubject=s.id and oe.id in (select examId from onlineexamsgrades where studentId=".$studentId.")";
        $exams=$dbcontroller->executeSelectQuery($query);
        for($i=0;$i<sizeof($exams);$i++){
        $exams[$i]['status']=2;
        $startDate=date('m/d/Y',intval($exams[$i]['examDate']));
        $exams[$i]['examDate']=$startDate;
        $endDate=date('m/d/Y',intval($exams[$i]['ExamEndDate']));
        $exams[$i]['ExamEndDate']=$endDate;
        array_push($this->onlineExams,$exams[$i]);
        }
		return $this->onlineExams;
	}	
    
    
    public function getTeacherOnlineExams($classId,$date){
        $dbcontroller = new DBController();
		$query = "SELECT id FROM onlineexams";
        $ids=$dbcontroller->executeSelectQuery($query);
        $query = "SELECT examClass FROM onlineexams";
        $classes=$dbcontroller->executeSelectQuery($query);
        $fids=array();
        for($i=0;$i<sizeof($ids);$i++){
            $str=substr($classes[$i]["examClass"],1,-1);
            $cida=explode(",",$str);
            for($j=0;$j<sizeof($cida);$j++){
            if(substr($cida[$j],1,-1)==$classId){
                array_push($fids,$ids[$i]["id"]);
            }
            }
            $query = "SELECT oe.id,oe.examTitle,oe.examDescription,oe.examQuestion,oe.examDate,oe.ExamEndDate,
            s.id subjectId,s.subjectTitle
            FROM onlineexams oe,subject s where oe.examSubject=s.id and (oe.id=";
            for($k=0;$k<sizeof($fids);$k++){
            if($k==(sizeof($fids)-1)){
                $query=$query.$fids[$k].")";
            }else{
                $query=$query.$fids[$k]." or oe.id=";
            }
            }
            }
        $exams=$dbcontroller->executeSelectQuery($query);
        for($i=0;$i<sizeof($exams);$i++){
            if(intval($exams[$i]['ExamEndDate']) < intval($date)){
                $exams[$i]['status']=0;
                $startDate=date('m/d/Y',intval($exams[$i]['examDate']));
                $exams[$i]['examDate']=$startDate;
                $endDate=date('m/d/Y',intval($exams[$i]['ExamEndDate']));
                $exams[$i]['ExamEndDate']=$endDate;
                array_push($this->onlineExams,$exams[$i]);
            }else{
                $exams[$i]['status']=1;
                $startDate=date('m/d/Y',intval($exams[$i]['examDate']));
                $exams[$i]['examDate']=$startDate;
                $endDate=date('m/d/Y',intval($exams[$i]['ExamEndDate']));
                $exams[$i]['ExamEndDate']=$endDate;
                array_push($this->onlineExams,$exams[$i]);
            }
        }
		return $this->onlineExams;
    }	
    

    public function getTeacherSubjectOnlineExams($classId,$subjectId,$date){
        $dbcontroller = new DBController();
		$query = "SELECT id FROM onlineexams where examSubject= ".$subjectId;
        $ids=$dbcontroller->executeSelectQuery($query);
        $query = "SELECT examClass FROM onlineexams where examSubject= ".$subjectId;
        $classes=$dbcontroller->executeSelectQuery($query);
        $fids=array();
        for($i=0;$i<sizeof($ids);$i++){
            $str=substr($classes[$i]["examClass"],1,-1);
            $cida=explode(",",$str);
            for($j=0;$j<sizeof($cida);$j++){
            if(substr($cida[$j],1,-1)==$classId){
                array_push($fids,$ids[$i]["id"]);
            }
            }
            $query = "SELECT oe.id,oe.examTitle,oe.examDescription,oe.examQuestion,oe.examDate,oe.ExamEndDate,
            s.id subjectId,s.subjectTitle
            FROM onlineexams oe,subject s where oe.examSubject=s.id and (oe.id=";
            for($k=0;$k<sizeof($fids);$k++){
            if($k==(sizeof($fids)-1)){
                $query=$query.$fids[$k].")";
            }else{
                $query=$query.$fids[$k]." or oe.id=";
            }
            }
            }
        $exams=$dbcontroller->executeSelectQuery($query);
        for($i=0;$i<sizeof($exams);$i++){
            if(intval($exams[$i]['ExamEndDate']) < intval($date)){
                $exams[$i]['status']=0;
                $startDate=date('m/d/Y',intval($exams[$i]['examDate']));
                $exams[$i]['examDate']=$startDate;
                $endDate=date('m/d/Y',intval($exams[$i]['ExamEndDate']));
                $exams[$i]['ExamEndDate']=$endDate;
                array_push($this->onlineExams,$exams[$i]);
            }else{
                $exams[$i]['status']=1;
                $startDate=date('m/d/Y',intval($exams[$i]['examDate']));
                $exams[$i]['examDate']=$startDate;
                $endDate=date('m/d/Y',intval($exams[$i]['ExamEndDate']));
                $exams[$i]['ExamEndDate']=$endDate;
                array_push($this->onlineExams,$exams[$i]);
            }
        }
		return $this->onlineExams;
	}	
	
    public function takeOnlineExams($examId,$studentId,$examQuestionsAnswers,$examGrade,$examDate){
        
		$query = "INSERT INTO `onlineexamsgrades`( `examId`, `studentId`, `examQuestionsAnswers`, `examGrade`, `examDate`) 
        VALUES (".$examId.",".$studentId.",'".$examQuestionsAnswers."',".$examGrade.",'".$examDate."')";
        $dbcontroller = new DBController();
        $this->examMark=$dbcontroller->executeInsertQuery($query);
		return $this->examMark;
    }	
    
    public function insertOnlineExam($examTitle,$examDescription,$examClass,$examTeacher,$examSubject,$examDate,$ExamEndDate,$examQuestion){
        
		$query = "INSERT INTO `onlineexams`(`examTitle`, `examDescription`, `examClass`, `examTeacher`, `examSubject`, `examDate`, `ExamEndDate`, `ExamShowGrade`, `examQuestion`) 
        VALUES ('".$examTitle."','".$examDescription."','".$examClass."',".$examTeacher.",".$examSubject.",'".$examDate."','".$ExamEndDate."',0,'".$examQuestion."')";
        $dbcontroller = new DBController();
        $this->examMark=$dbcontroller->executeInsertQuery($query);
		return $this->examMark;
    }

    public function deleteOnlineExam($examId){
        
        $query = "DELETE FROM `onlineexams` WHERE id=".$examId;
        $dbcontroller = new DBController();
        $this->examMark=$dbcontroller->executeDeleteQuery($query);
		return $this->examMark;
    }
}
?>
