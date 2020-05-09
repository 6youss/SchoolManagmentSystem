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
            $query = "SELECT oe.id,oe.examTitle,oe.examDescription,oe.examQuestion,oe.examDate,oe.examEndDate,
            t.id,t.userName,t.email.t.photo,
            s.id,s.subjectTitle
            FROM onlineexams oe,users t,subject s where oe.examTeacher=t.id and oe.examSubject=s.id and (oe.id=";
            for($k=0;$k<sizeof($fids);$k++){
            if($k==(sizeof($fids)-1)){
                $query=$query.$fids[$k].")";
            }else{
                $query=$query.$fids[$k]." or oe.id=";
            }
            }
            }
        $exams=array();
        
        for($i=0;$i<sizeof($exams);$i++){
            if(intval($exams[$i]['ExamEndDate']) <= intval($date) == 1){
                $exams[$i]['ExamEndDate']=date('m/d/Y',$exams[$i]['ExamEndDate']);
                $exams[$i]['examDate']=date('m/d/Y',$exams[$i]['examDate']);
                $exams[$i]['available']=0;
                array_push($this->onlineExams,$exams[$i]);
            }else{
                $exams[$i]['ExamEndDate']=date('m/d/Y',$exams[$i]['ExamEndDate']);
                $exams[$i]['examDate']=date('m/d/Y',$exams[$i]['examDate']);
                $exams[$i]['available']=1;
                array_push($this->onlineExams,$exams[$i]);  
            }
        }
		//$this->onlineExams = $dbcontroller->executeSelectQuery($query);
		return $this->onlineExams;
	}	
	
	
    
}
?>
