<?php
require_once("dbcontroller.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class UserInfo {
	private $user = array();
	//private $req="";
	/*
		you should hookup the DAO here
	*/
	public function getAllUsers(){
		$query = "SELECT * FROM users";
		$dbcontroller = new DBController();
		$this->user = $dbcontroller->executeSelectQuery($query);
		return $this->user;
	}	
	
	public function getUserbyid($id){
		$query = "SELECT * FROM users where id =".$id;
		$dbcontroller = new DBController();
		$this->user = $dbcontroller->executeSelectQuery($query);
		return $this->user;
	}

	public function getUserbyinfo($userName){
		$query = "SELECT * FROM users where username ='".$userName."'";
		$dbcontroller = new DBController();
		$this->user = $dbcontroller->executeSelectQuery($query);
		return $this->user;
	}
	
	public function getStudentClass($studentId){
		$query = "SELECT studentClass FROM users where id=".$studentId;
		$dbcontroller = new DBController();
		$this->user = $dbcontroller->executeSelectQuery($query);
		return $this->user;
	}

	public function getStudentParents($studentId){
		$query="SELECT id,parentOf FROM users";
		$parents=array();
		$dbcontroller = new DBController();
		$parents=$dbcontroller->executeSelectQuery($query);
		$parentIds=array();
		for($i=0;$i<sizeof($parents);$i++){
			$a="";$b=array();$bool=0;
			$a=$parents[$i]['parentOf'];
			$a=substr($a,1,-1);
			$b=explode('},{',$a);
			for($j=0;$j<sizeof($b);$j++){
				if($j==0){$b[$j]=substr($b[$j],1);}else{if($j==sizeof($b)-1){$b[$j]=substr($b[$j],0,-1);}else{$b[$j]=substr($b[$j],1,-1);}}
			}
			for($j=0;$j<sizeof($b);$j++){
				$c=array();
				$c=explode(',',$b[$j]);
				$d=substr($c[2],5);
				$e=substr($c[1],11);
                $e=substr($e,1,-1);
				if($d==$studentId){$bool=1;}
			}
			if($bool==1){
				array_push($parentIds,array("id"=>$parents[$i]['id'],"relation"=>$e));
			}
		}
		$query = "SELECT username,fullName,email,parentProfession,phoneNo,mobileNo FROM users where ";
		for($i=0;$i<sizeof($parentIds);$i++){
        if($i==0){
			$query=$query."id=".$parentIds[$i]["id"];
		}else{
			$query=$query." or id=".$parentIds[$i]["id"];
		}
		}
		
		$this->user = $dbcontroller->executeSelectQuery($query);
		$finalParents=array();
		for($i=0;$i<sizeof($parentIds);$i++){
			array_push($finalParents,array("parent"=>$this->user[$i],$parentIds[$i]["relation"]));
		}
		return $finalParents;
	}

	public function getUserrole($id){
		$query = "SELECT role FROM users where username = '".$id."'";
		$dbcontroller = new DBController();
		$this->user = $dbcontroller->executeSelectQuery($query);
		return $this->user;
	}
	
}
/*
$studentId="5";
$query="SELECT id,parentOf FROM users";
		
        $parents=array(array("id"=>1,"parentOf"=>"[{\"student\":\"student4\",\"relation\":\"Father\",\"id\":4},{\"student\":\"student5\",\"relation\":\"Father\",\"id\":5}]"),array("id"=>2,"parentOf"=>"[{\"student\":\"student5\",\"relation\":\"Father\",\"id\":5},{\"student\":\"student6\",\"relation\":\"Father\",\"id\":6}]"));
		$parentIds=array();
		for($i=0;$i<sizeof($parents);$i++){
			$a="";$b=array();$bool=0;
			$a=$parents[$i]['parentOf'];
			$a=substr($a,1,-1);
			$b=explode('},{',$a);//print_r($b);
			for($j=0;$j<sizeof($b);$j++){
				if($j==0){$b[$j]=substr($b[$j],1);}else{if($j==sizeof($b)-1){$b[$j]=substr($b[$j],0,-1);}else{$b[$j]=substr($b[$j],1,-1);}}
			}
            //print_r($b);
			for($j=0;$j<sizeof($b);$j++){
				$c=array();
				$c=explode(',',$b[$j]);
				$d=substr($c[2],5);echo $d;
				$e=substr($c[1],10);
                $e=substr($e,1,-1);
				if($d==$studentId){$bool=1;}//echo $bool;
			}
			if($bool==1){echo $parents[$i]['id'];
				array_push($parentIds,array("id"=>$parents[$i]['id'],"relation"=>$e));
			}
		}
		$query = "SELECT username,fullName,email,parentProfession,phoneNo,mobileNo FROM users where ";
		for($i=0;$i<sizeof($parentIds);$i++){
        if($i==0){
			$query=$query."id=".$parentIds[$i]["id"];
		}else{
			$query=$query." or id=".$parentIds[$i]["id"];
		}
		}
        echo $query;
*/
?>
