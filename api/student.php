<?php

class Student{
    public function student_info(){
        $objValidation= new Validation();

        $studentid=$this->userid;
    
        $objDatabase=new Database();
        $objDatabase->getConnection();
        $objDatabase->sql="SELECT userid,username,roll FROM students WHERE userid='$studentid';";
        $data=array();
        $data["code"]="2043";
        $data["message"]="Student list is retrieved";
        $data["profile"]=$objDatabase->runSql();
    
        $studentid=$data["profile"][0]["userid"];
        $objDatabase->sql="SELECT workdate,checkin,checkout,presenttype FROM checks WHERE userid='$studentid' ORDER BY DATE(workdate) DESC";
        $data["checks"]=$objDatabase->runSql();
        $objDatabase->sql="SELECT workdate,timetext,reason FROM breaks WHERE userid='$studentid' ORDER BY DATE(workdate) DESC";
        $data["breaks"]=$objDatabase->runSql();
        echo json_encode($data);     
    }

    public function request_break(){
        require_once("./api/config.php");
        $objValidation=new Validation();
        
       
        if(
           (isset($this->data["date"])==false) ||
           (empty($this->data["date"])==true) ||
           (isset($this->data["time"])==false) ||
           (empty($this->data["time"])==true) ||
           (isset($this->data["reason"])==false) ||
           (empty($this->data["reason"])==true) 
          ){
          $data=array();
          $data["code"]="3002";
          $data["message"]="Required fields are not found";
          echo json_encode($data);
          return 0;
        }  
        
        $date=$this->data["date"];
        $reason=$this->data["reason"];
        $time=$this->data["time"];
        $studentid=$this->userid;

        if($objValidation->validDate($date)==false){
            $data=array();
            $data["code"]="3031";
            $data["message"]="Request break date is not valid";
            echo json_encode($data);
            return 0;
           }
      
      
          if($objValidation->validTime($time)==false){
            $data=array();
            $data["code"]="3034";
            $data["message"]="Request break time is not valid";
            echo json_encode($data);
            return 0;
          }

        $objDatabase=new Database();
        $objDatabase->getConnection();
        $objDatabase->sql=" INSERT breaks(userid,workdate,timetext,reason) VALUES('$studentid','$date','$time','$reason');";
        $objDatabase->runSql();
        $data=array();
        $data["code"]="2047";
        $data["message"]="Student request is placed";
        echo json_encode($data);

    }

    public function delete_break(){

        $objValidation=new Validation();
        
       
        if(
           (isset($this->data["date"])==false) ||
           (empty($this->data["date"])==true) ||
           (isset($this->data["time"])==false) ||
           (empty($this->data["time"])==true)
          ){
          $data=array();
          $data["code"]="3002";
          $data["message"]="Required fields are not found";
          echo json_encode($data);
          return 0;
        }  
        
        $date=$this->data["date"];
        $time=$this->data["time"];
        $studentid=$this->userid;

        if($objValidation->validDate($date)==false){
            $data=array();
            $data["code"]="3031";
            $data["message"]="Request break date is not valid";
            echo json_encode($data);
            return 0;
           }
      
      
          if($objValidation->validTime($time)==false){
            $data=array();
            $data["code"]="3034";
            $data["message"]="Request break time is not valid";
            echo json_encode($data);
            return 0;
          }

        $objDatabase=new Database();
        $objDatabase->getConnection();
        $objDatabase->sql=" DELETE FROM breaks WHERE workdate='$date' AND timetext='$time' AND userid='$studentid' ;";
        $objDatabase->runSql();
        $data=array();
        $data["code"]="2097";
        $data["message"]="Student request is deleted";
        echo json_encode($data);

    }
}

?>